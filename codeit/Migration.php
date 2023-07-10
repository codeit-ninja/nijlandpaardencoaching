<?php
namespace CodeIT;

use function Deployer\{cd, run, info, set, get, test, upload, writeLn};

class Migration
{
    public static function run()
    {
        if( ! get('is_full_migration') ) {
            return;
        }

        set('become', $_ENV['DEV_REMOTE_USER']);
        /**
         * First run a composer install to make sure 
         * we have all the packages installed
         */
        cd('{{current_path}}');
        run('composer install');

        /**
         * .env file is not populated, run wp env script
         */
        if( ! test( '[ -s .env ]' ) ) {
            run('wp dotenv init --template=.env.example --with-salts --force');
            run('wp dotenv set DB_NAME \'"{{db_name}}"\'');
            run('wp dotenv set DB_USER \'"{{db_user}}"\'');
            run('wp dotenv set DB_PASSWORD \'"{{db_password}}"\'');
            run('wp dotenv set WP_ENV \'"production"\'');
            run('wp dotenv set WP_HOME \'"https://{{domain}}"\'');
        }

        /**
         * Import local database into remote database
         */
        try {
            /**
             * Need to be root in order to use the mysql command later on
             */
            set('become', 'root');
            /**
             * Dump to database to a file on host
             */
            exec('mysqldump --user=\''. DB_USER .'\' --password=\''. DB_PASSWORD .'\' '. DB_NAME .' > mysql.dump.sql > /dev/null 2>&1');
            /**
             * Upload and import the database on remote
             */
            upload('mysql.dump.sql', '{{deploy_path}}');

            cd('{{deploy_path}}');
            run('mysql --user=\'{{db_user}}\' --password=\'{{db_password}}\' {{db_name}} < mysql.dump.sql > /dev/null 2>&1');
            
            /**
             * Delete dump file from host and remote
             */
            unlink('mysql.dump.sql');
            run('rm -f mysql.dump.sql');

            writeln('─────────────────────────────────────────────────────');
            writeln('<fg=green;options=bold>MYSQL:</> Succesfully imported {{db_name}}');
            writeln('─────────────────────────────────────────────────────');

            /**
             * Switch back to remote user to prevent conflicting permissions
             */
            set('become', $_ENV['DEV_REMOTE_USER']);
        } 
        catch( \Exception $e ) {
            writeln('<fg=red;options=bold>MYSQL:</> Failed to import database ('. $e->getMessage() .')');
            
            return;
        }

        /**
         * Migrate host upload folder to remote
         */
        $zip = new \ZipArchive();
        $zip->open('uploads.zip', \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        /** @var \SplFileInfo[] $files */
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator( WP_CONTENT_DIR . '/uploads' ),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            // Skip directories (they would be added automatically)
            if (!$file->isDir())
            {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen(WP_CONTENT_DIR . '/uploads') + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }
        
        $zip->close();

        upload('uploads.zip', '{{deploy_path}}/uploads.zip');

        writeln('─────────────────────────────────────────────────────');
        writeln('<fg=green;options=bold>UPLOADS:</> uploads succesfully transfered');
        writeln('─────────────────────────────────────────────────────');

        run('rm -rf {{current_path}}/web/app/uploads');
        run('unzip -o {{deploy_path}}/uploads.zip -d {{current_path}}/web/app/uploads');
        run('rm -f {{deploy_path}}/uploads.zip');
        unlink('uploads.zip');

        writeLn("");
        writeln('─────────────────────────────────────────────────────');
        writeln('<fg=green;options=bold>SITE DEPLOYED:</> <fg=white;options=bold>finished without errors</>');
        writeln('─────────────────────────────────────────────────────');
        writeLn("");
    }
}
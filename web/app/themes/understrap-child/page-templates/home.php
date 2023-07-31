<?php
/**
 * Template Name: Home page
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
$featured_image = get_the_post_thumbnail();
?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-lg-8 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post();

						get_template_part( 'loop-templates/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>

				</main>

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->
    
    <?php
    /**
     * Render home page blocks logic
     */
    get_template_part('global-templates/home/block', 'featured');
    get_template_part('global-templates/home/block', 'footer');
    ?>

</div><!-- #page-wrapper -->

<?php
get_footer();

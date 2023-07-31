<?php
/**
 * Template Name: References page
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

	<div class="<?php echo esc_attr( $container ); ?> mb-5" id="content">

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
        </div>

        <?php if( have_rows('referenties') ) : ?>
            <?php while( have_rows('referenties') ) : the_row(); ?>

                <div class="reference">
                    <strong class="d-block mb-3"><?= get_sub_field('name'); ?></strong>
                    <div class="reference-body">
                        <?= get_sub_field('text'); ?>
                    </div>

                    <!-- <div class="reference-more">
                        <a class="read-more" href="javascript:void(0)"><strong>Meer lezen</strong></a>
                    </div> -->
                </div>

            <?php endwhile; ?>
        <?php endif; ?>

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();

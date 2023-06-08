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

			<div class="col-md-8 content-area" id="primary">

				<main class="site-main test" id="main" role="main">

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

    <!-- <div class="container-full bg-medium">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="py-5">
                        <?php the_field('coaching_points'); ?>

                        <div class="contact-options mt-5 mb-3">
                            <a href="">
                                <i class="fa-duotone fa-phone"></i>
                                <span>Bel ons</span>
                            </a>
                            <a href="">
                                <i class="fa-regular fa-at"></i>
                                <span>Mail ons</span>
                            </a>
                            <a href="">
                                <i class="fa-brands fa-whatsapp"></i>
                                <span>Simone Mijering</span>
                            </a>
                            <a href="">
                                <i class="fa-brands fa-whatsapp"></i>
                                <span>Diana van Eldik</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</div><!-- #page-wrapper -->

<?php
get_footer();

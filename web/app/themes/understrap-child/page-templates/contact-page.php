<?php
/**
 * Template Name: Contact page
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

		<div class="row g-5">

            <div class="col-md-6">
                <h2>Bericht schrijven</h2>
                <?php echo do_shortcode('[contact-form-7 id="154" title="Contact form 1"]'); ?>
            </div>

			<div class="col-md-6 content-area" id="primary">

				<main class="site-main test" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post();

						get_template_part( 'loop-templates/content', 'page' );
					}
					?>

				</main>

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();

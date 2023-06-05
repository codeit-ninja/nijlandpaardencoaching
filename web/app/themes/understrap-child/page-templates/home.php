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

    <div class="container-image-full mt-5">
        <div class="container">
            <div class="row gap-0">
                <div class="col-6 shape-seperator">
                    <header class="shape-seperator-header">
                        <h4>Paardencoachen maakt je bewust van</h4>
                    </header>
                    <section class="shape-seperator-content">
                        <ul class="npc-list">
                            <li>Bewustwording van je innerlijke houding</li>
                            <li>Inzicht krijgen in communicatieve vaardigheden</li>
                            <li>Leiderschapsstijlen en wijze van aansturing</li>
                            <li>Het stellen van grenzen en doelen</li>
                            <li>Keuzes maken</li>
                            <li>Ben ik van nature een leider of juist een volger?</li>
                            <li>Ben ik een teamplayer of een solist?</li>
                            <li>Zit ik binnen mijn team op de juiste plaats?</li>
                        </ul>
                    </section>
                </div>
                <div class="col-6" style="background-image: url(https://www.nijlandpaardencoaching.nl/wp-content/themes/NijlandManage/images/IMG_1775.JPG);" id="container-image"></div>
            </div>
        </div>
    </div>

    <div class="container container-shape bg-light">
        <div class="row">
            <div class="col-md-12">
                <div class="p-5">
                    <?php the_field('coaching_points'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-12 p-0">
                <div class="d-flex contact-options">
                    <a href="" class="col">
                        <i class="fa-duotone fa-phone-rotary"></i>
                        <span>Bel ons</span>
                    </a>
                    <a href="" class="col">
                        <i class="fa-duotone fa-envelope"></i>
                        <span>Mail ons</span>
                    </a>
                    <a href="" class="col">
                        <i class="fa-brands fa-whatsapp"></i>
                        <span>Simone Mijering</span>
                    </a>
                    <a href="" class="col">
                        <i class="fa-brands fa-whatsapp"></i>
                        <span>Diana van Eldik</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div><!-- #page-wrapper -->

<?php
get_footer();

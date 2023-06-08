<?php
/**
 * Template Name: Coaches page Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

$choaches = get_field('coaches');
?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row gap-4">

			<?php get_template_part( 'sidebar-templates/sidebar', 'left' ); ?>

			<div class="<?php echo is_active_sidebar( 'right-sidebar' ) ? 'col-md-8' : 'col-md-12'; ?> content-area" id="primary">

				<main class="site-main" id="main" role="main">

                <?php if( $choaches ) : ?>

                    <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                        <?php foreach( $choaches as $key => $coach ) : ?>
                            <li class="nav-item">
                                <button class="nav-link <?php echo $key === 0 ? 'active' : '' ?>" href="#" data-bs-toggle="pill" data-bs-target="#coach-<?php echo $key; ?>" type="button" role="tab"><?php echo $coach['name']; ?></button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content">
                        <?php foreach( $choaches as $key => $coach ) : ?>
                            <div class="tab-pane <?php echo $key === 0 ? 'show active' : '' ?>" id="coach-<?php echo $key; ?>" tabindex="0">
                                   
                                <?php 
                                get_template_part('global-templates/inline', 'image', array('post_ID' => $coach['photo']['ID']));
                                ?>

                                <h3 class="mb-4"><?php echo $coach['name']; ?></h3>
                                <p>
                                    <?php echo $coach['about_me']; ?>
                                    <blockquote class="my-4"><?php echo $coach['quote']; ?></blockquote>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                <?php endif; ?>

				</main>

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

    <?php if( get_field('content_block') ) : ?>

        <?php get_template_part( 'global-templates/extra', 'content' ); ?>

    <?php endif; ?>

</div><!-- #page-wrapper -->

<?php
get_footer();

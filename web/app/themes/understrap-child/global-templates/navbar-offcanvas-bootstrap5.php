<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-xl navbar-light aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<div class="<?php echo esc_attr( $container ); ?>">

        <div class="row align-items-center">
            <div class="col-1">
                <!-- Your site branding in the menu -->
                <?php get_template_part( 'global-templates/navbar-branding' ); ?>
            </div>

            <div class="col-11">
                <!-- <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#navbarNavOffcanvas"
                    aria-controls="navbarNavOffcanvas"
                    aria-expanded="false"
                    aria-label="<?php esc_attr_e( 'Open menu', 'understrap' ); ?>"
                >
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <button 
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#navbarNavOffcanvas"
                    aria-controls="navbarNavOffcanvas"
                    aria-expanded="false"
                    aria-label="<?php esc_attr_e( 'Open menu', 'understrap' ); ?>"
                ></button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarNavOffcanvas">

                    <!-- The WordPress Menu goes here -->
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary',
                            'container_class' => 'offcanvas-body d-none d-xl-flex',
                            'container_id'    => '',
                            'menu_class'      => 'navbar-nav ms-auto gap-0 gap-xxl-4',
                            'fallback_cb'     => '',
                            'menu_id'         => 'main-menu',
                            'depth'           => 2,
                            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                        )
                    );
                    wp_nav_menu(
                        array(
                            'menu'            => 'Primary Mobile',
                            'theme_location'  => 'primary',
                            'container_class' => 'offcanvas-body d-xl-none py-5',
                            'container_id'    => '',
                            'menu_class'      => 'navbar-nav gap-3 gap-xxl-4',
                            'fallback_cb'     => '',
                            'menu_id'         => 'mobile-menu',
                            'depth'           => 2,
                        )
                    );
                    ?>
                    <!-- <button
                        class="btn-close text-reset"
                        type="button"
                        data-bs-dismiss="offcanvas"
                        aria-label="<?php esc_attr_e( 'Close menu', 'understrap' ); ?>"
                    ></button> -->
                </div><!-- .offcanvas -->
            </div>
        </div>    

	</div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->

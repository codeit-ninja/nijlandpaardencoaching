<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper p-3" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

    © <?php echo date('Y'); ?> | Website made with <i class="fa-solid fa-heart mx-1 text-danger"></i> by <a target="_blank" href="https://codeit.ninja">codeit.ninja</a>

	</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>


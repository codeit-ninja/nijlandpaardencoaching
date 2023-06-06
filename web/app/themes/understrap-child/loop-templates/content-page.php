<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$outline_disabled = get_field('disable_image_outline');
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content">

		<?php
        if( has_post_thumbnail() ) {
            echo '<picture style="float: left;" class="'. ($outline_disabled ? 'no-outline' : '') .'">';
            the_post_thumbnail([370]);
            echo '</picture>';
        }
        
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->

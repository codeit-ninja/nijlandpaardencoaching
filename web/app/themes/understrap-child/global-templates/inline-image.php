<?php
/**
 * Show a inline image on the left the content
 * 
 * @package Understrap
 */

$no_overlay = get_field('disable_image_overlay');
$no_outline = get_field('disable_image_outline');

$post_image = null;
$classes = [];

if( has_post_thumbnail() ) {
    $post_image = get_the_post_thumbnail($args['post_ID'], [370]);
}
else {
    $post_image = wp_get_attachment_image( $args['post_ID'], 'medium' );
}

if( $no_overlay ) {
    array_push($classes, 'no-overlay');
}

if( $no_outline ) {
    array_push($classes, 'no-outline');
}

if( ! $post_image ) return;
?>
<picture style="float: left;" class="rounded <?php echo join(' ', $classes);?>">
    <?php echo $post_image; ?>
</picture>
<?php
/**
 * A featured full width container with list items and an image
 * 
 * @package Understrap
 */

if( ! get_field('enable_featured_block') ) return;

$container = get_theme_mod( 'understrap_container_type' );
$featured_block = get_field('featured_block');
$list_items = $featured_block['list_items'];
?>

<div class="container-fluid container-featured">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-7">
                <h3><?php echo $featured_block['title']; ?></h3>

                <ul class="npc-list">
                    <?php foreach( $list_items as $list_item ) : ?>
                        <li><?php echo $list_item['item']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <?php echo wp_get_attachment_image( $featured_block['image'], 'large' ) ?>
            </div>
        </div>
    </div>
</div>
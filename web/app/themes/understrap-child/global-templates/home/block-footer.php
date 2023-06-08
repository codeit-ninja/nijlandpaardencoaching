<?php
/**
 * A full width block with HTML content and a group of call to action buttons
 * 
 * @package Understrap
 */

if( ! get_field('enable_footer_block') ) return;

$container = get_theme_mod( 'understrap_container_type' );
$footer_block = get_field('footer_block');
$cta_buttons = $footer_block['buttons'];
?>

<div class="container-fluid container-footer">
    <div class="<?php echo esc_attr( $container ); ?>">
        <?php echo $footer_block['content']; ?>

        <?php if( $cta_buttons && ! empty( $cta_buttons ) ) : ?>
            <div class="btn-group-cta">
                <?php foreach( $cta_buttons as $cta_button ) : ?>
                    <a href="<?php echo $cta_button['link']; ?>" role="button" class="btn btn-cta">
                        <?php if( $cta_button['icon'] ) : ?>
                            <i class="<?php echo $cta_button['icon']; ?>"></i>
                        <?php endif ?>
                        <?php echo $cta_button['text']; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php if( get_field('content_block') ) : ?>

    <div class="content-block bg-primary text-white p-5 mt-3">
        <div class="<?php echo esc_attr( get_theme_mod( 'understrap_container_type' ) ); ?>">
            <?php the_field('content_block'); ?>
        </div>
    </div>

<?php endif; ?>
<?php
/**
 * Display a big header image
 * 
 * @param string $args['image']
 * @package Understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="header-image d-flex flex-column justify-content-center text-white text-end" style="min-height: 600px;background-image: url(<?php echo $args['image']; ?>);">
    <div class="<?php echo esc_attr( $container ); ?> d-flex flex-column align-items-end">
        <h2 class="mt-5 text-center">
            "In de draaiende tol vinden we de harmonie van balans en beweging. Laat jouw leven een prachtig spel zijn, waarin elke draai een nieuwe mogelijkheid biedt om te schitteren en te groeien."
        </h2>
    </div>
</div>
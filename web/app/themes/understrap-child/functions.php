<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Add fontawesome to head
 */
function init_fontawesome() 
{
    echo '<script src="'.  get_stylesheet_directory_uri() .'/src/js/fontawesome.js"></script>';
}
add_action('wp_head', 'init_fontawesome');

/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts()
{
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');

    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles()
{

    // Get the theme data.
    $the_theme = wp_get_theme();

    $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    // Grab asset urls.
    $theme_styles = "/css/child-theme{$suffix}.css";
    $theme_scripts = "/js/child-theme{$suffix}.js";

    wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get('Version'));
    wp_enqueue_script('jquery');
    wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get('Version'), true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain()
{
    load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version()
{
    return 'bootstrap5';
}
add_filter('theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20);



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js()
{
    wp_enqueue_script(
        'understrap_child_customizer',
        get_stylesheet_directory_uri() . '/js/customizer-controls.js',
        array('customize-preview'),
        '20130508',
        true
    );
}
add_action('customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js');

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(
        array(
            'page_title' => 'Quotes',
            'menu_title' => 'Quotes',
            'menu_slug' => 'theme-quotes',
            'capability' => 'edit_posts',
            'redirect' => false,
            'icon_url' => 'dashicons-editor-quote'
        )
    );

}

function add_secondary_logo_field(WP_Customize_Manager $wp_customize)
{
    $wp_customize->add_setting(
        'secondary_logo',
        array(
            'default' => '',
            'type' => 'theme_mod',
            // you can also use 'theme_mod'
            'capability' => 'edit_theme_options'
        ),
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'secondary_logo',
            array(
                'label' => __('Logo groot', 'textdomain'),
                'description' => __('Voeg hier het originele logo toe', 'textdomain'),
                'setting' => 'secondary_logo',
                'priority' => 10,
                'section' => 'title_tagline',
            )
        ));
}
add_action('customize_register', 'add_secondary_logo_field');

function the_quote() 
{
    $quotes = get_field('quotes', 'option');
    
    // Find quote that belongs to current page object
    foreach( $quotes as $quote ) {
        if( $quote['show_only_on_selected_page'] 
              && ! empty( $quote['post_id'] ) 
              && in_array( get_the_ID(), $quote['post_id'] ) 
        ) {
            echo '<blockquote>'. $quote['text'] .'</blockquote>'; return;
        }
    }

    echo '<blockquote>'. $quotes[rand(0, (count($quotes) - 1))]['text'] .'</blockquote>';
}
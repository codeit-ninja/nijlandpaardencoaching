<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="col-md-3 widget-area" id="left-sidebar">
    <nav class="nav" id="sidebar-nav">
        <?php wp_list_pages( array( 'child_of' => wp_get_post_parent_id(), 'title_li' => '' ) ) ?>
    </nav>
</div>
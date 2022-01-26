<?php

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

/**
 * Theme support additions
 */
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('responsive-embeds');
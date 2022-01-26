<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Custom fields
function wpb_fields () {
  /*Container::make('post_meta', 'Custom Fields Example')
		->where('post_type', '=', 'post')
		->add_fields([
			Field::make('text', 'text_example', 'Text Example')
		]); */
}
add_action( 'carbon_fields_register_fields', 'wpb_fields' );

// Carbon Fields bootstrap
function wpb_load() {
    require_once(get_template_directory() . '/vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}
add_action( 'after_setup_theme', 'wpb_load' );
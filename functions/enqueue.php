<?php
function wpb_enqueue_style() {
	wp_enqueue_style('app', get_bloginfo('template_url') . '/dist/css/app.min.css', false);
}
add_action('wp_enqueue_scripts', 'wpb_enqueue_style');

function wpb_enqueue_script() {
	wp_enqueue_script('app', get_bloginfo('template_url') . '/dist/js/app.min.js', false, false, true);
  wp_enqueue_script('app.vendor', get_bloginfo('template_url') . '/dist/js/vendor.min.js', false, false, true);

	// WordPress URLS in JS
	wp_localize_script('app', 'WPURL', [
		'template_url' => get_bloginfo('template_url'),
		'base_url' => get_bloginfo('url'),
		'nonce' => wp_create_nonce('wp_rest'),
		'authorization_encoded' => base64_encode('codepro:c0desite')
	]);
}
add_action('wp_enqueue_scripts', 'wpb_enqueue_script');
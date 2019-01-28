<?php

namespace nebula\countdown;

add_shortcode('count_flipclock', __NAMESPACE__.'\shortcode_flipclock' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__.'\flipclock_styles' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__.'\flipclock_scripts' );

function shortcode_flipclock( $atts ) {

}

function flipclock_styles() {
	wp_register_style(
		'flipclock',
		COUNTDOWN_URL . 'flipclock/flipclock.css',
		array()
	);
}

function flipclock_scripts() {
	wp_register_script(
		'flipclock', COUNTDOWN_URL . 'flipclock/flipclock.js',
      array('jquery', 'jquery-ui-core'), '1.0', 'all'
  );
}

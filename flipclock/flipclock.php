<?php

namespace nebula\countdown;

class Flipclock{
	
	public function __construct(){
		add_shortcode('count_flipclock', array($this, 'shortcode_flipclock') );
		add_action( 'wp_enqueue_scripts', array($this, 'flipclock_styles') );
		add_action( 'wp_enqueue_scripts', array($this, 'flipclock_scripts') );
	}

	public function shortcode_flipclock($atts) {

		// Defaults, followed by atts
		$atts = shortcode_atts( array(
			'year' => get_option('countdown_option_year'),
			'month' => get_option('countdown_option_month'), // Array notation
			'day' => get_option('countdown_option_day'),
			'hour' => get_option('countdown_option_hour'),
			'minute' => get_option('countdown_option_minute')
		), $atts );

		wp_enqueue_style('flipclock_style');
		wp_enqueue_script('flipclock_script');

		ob_start();?>
		<div>
			<a href="http://flipclockjs.com/">Documentation</a>
			<div class="clock" style="margin:2em;"></div>

			<script type="text/javascript">
				var clock;
				$(function(){

					// Grab the current date
					var currentDate = new Date();

					// Set some date in the past. In this case, it's always been since Jan 1
					var futureDate  = new Date(

					<?php
						$monthCalc = $atts['month'] - 1;

						echo  $atts['year'].','.$monthCalc.','.$atts['day'].','.
						$atts['hour'].','.$atts['minute']
					?> ,0,0);

					console.log(futureDate);

					// Calculate the difference in seconds between the future and current date
					var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

					// Instantiate a countdown FlipClock
					clock = jQuery('.clock').FlipClock(diff, {
						clockFace: 'DailyCounter',
						countdown:true
					});
				});
			</script>

		</div>
		<?php
		return ob_get_clean();
	}

	public function flipclock_styles() {
		wp_register_style(
			'flipclock_style',
			COUNTDOWN_URL . 'flipclock/flipclock.css',
			array()
		);
	}

	public function flipclock_scripts() {
		wp_register_script(
			'flipclock_script', COUNTDOWN_URL . 'flipclock/flipclock.js',
				array('jquery', 'jquery-ui-core'), '1.0', 'all'
		);
	}

}

$countdown = new Flipclock();
$countdown->shortcode_flipclock($atts);

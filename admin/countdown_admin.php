<?php

namespace nebula\countdown;

class countdownAdmin {

  public function __construct(){
  		add_action( 'admin_init', array($this, 'countdown_register_settings') );
  		add_action('admin_menu', array($this, 'countdown_register_options_page') );
  	}

  	public function countdown_register_settings() {
      add_option( 'countdown_option_year', '2020');
  		add_option( 'countdown_option_month', '01');
  		add_option( 'countdown_option_day', '01');
  		add_option( 'countdown_option_hour', '23');
  		add_option( 'countdown_option_minute', '59');
  		add_option( 'countdown_option_second', '59');

  		$settingsArray = array (
  			'countdown_option_year','countdown_option_month','countdown_option_day','countdown_option_hour','countdown_option_minute','countdown_option_second'
  		);

  		foreach ($settingsArray as $setting) {
  			register_setting( 'countdown_options_group', $setting, 'countdown_callback');
  		}
  	}

  	public function countdown_register_options_page() {
  		global $page_hook_suffix;
  		$page_hook_suffix = add_options_page('Nebula Countdown', 'Countdown', 'manage_options', 'countdown', array($this,'countdown_options_page'));
  	}

    public function countdown_options_page(){
		?>
		<div class="wrap">
			<?php screen_icon(); ?>
			<h2>Countdown</h2>
			<form method="post" action="options.php">
				<?php settings_fields( 'countdown_options_group' ); ?>
				<p>Insert the countdown into a post or page by using the <code>[count_flipclock]</code> shortcode.</p>
				<br /><hr><br />
				<h3>
					Customization (multiple countdowns):
				</h3>
				<p>
					You can customize the date and time of each countdown by adding a the date/time info to the shortcode.
				</p>
				<p>
					For example: <code>[count_flipclock year=2020 month=2 day=10]</code>
				</p>
				<p>
					Supported attributes are: <code>year</code>, <code>month</code>, <code>day</code>, <code>minute</code> and <code>second</code>!
				</p>
				<br /><hr><br />
				<p>Set the default date and time you wish to count down to (you can change this by altering the shortcode):</p>
				<p>
					<label for="countdown_option_year">Year:</label><br />
					<input type="number" id="countdown_option_year" name="countdown_option_year" value="<?php echo get_option('countdown_option_year'); ?>" />
				</p>
				<p>
					<label for="countdown_option_month">Month:</label><br />
					<input type="number" id="countdown_option_month" name="countdown_option_month" value="<?php echo get_option('countdown_option_month'); ?>" />
				</p>
				<p>
					<label for="countdown_option_day">Day:</label><br />
					<input type="number" id="countdown_option_day" name="countdown_option_day" value="<?php echo get_option('countdown_option_day'); ?>" />
				</p>
				<p>
					<label for="countdown_option_hour">Hour:</label><br />
					<input type="number" id="countdown_option_hour" name="countdown_option_hour" value="<?php echo get_option('countdown_option_hour'); ?>" />
				</p>
				<p>
					<label for="countdown_option_minute">Minute:</label><br />
					<input type="number" id="countdown_option_minute" name="countdown_option_minute" value="<?php echo get_option('countdown_option_minute'); ?>" />
				</p>
				<p>
					<label for="countdown_option_second">Second:</label><br />
					<input type="text" id="countdown_option_second" name="countdown_option_second" value="<?php echo get_option('countdown_option_second'); ?>" />
				</p>
				<?php  submit_button(); ?>
			</form>
		</div>
		<?php
	}
}

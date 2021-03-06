<?php

namespace nebula\countdown;

class countdownAdmin {

  public function __construct(){
  		add_action( 'admin_init', array($this, 'countdown_register_settings') );
  		add_action('admin_menu', array($this, 'countdown_register_options_page') );
      add_action( 'admin_enqueue_scripts',  array($this, 'countdown_enqueue_admin_scripts') );
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

    public function countdown_enqueue_admin_scripts($hook) {
  		global $page_hook_suffix;
  		if( $hook != $page_hook_suffix )
  				return;
  		wp_register_style('countdown_admin_style', COUNTDOWN_URL . 'admin/admin-style.css');
  		wp_enqueue_style('countdown_admin_style');

  		wp_register_script(
  		'countdown_admin_script', COUNTDOWN_URL . 'admin/admin-script.js',
        array('jquery', 'jquery-ui-core'), '1.0', 'all'
    	);
  		wp_enqueue_script('countdown_admin_script');
  	}

    public function countdown_options_page(){
		?>
		<div class="wrap">
			<?php screen_icon(); ?>
			<h2>Countdown</h2>
      <h3>
				Create a new countdown:
			</h3>
			<p>
				In the form below, enter the date and time you wish to count down to:
			</p>
			<form method="post" action="" id="createShortcode">
				<p>
					<label for="countdown_year">Year:</label><br />
					<input type="number" min="<?php echo date("Y"); ?>" max="9999" id="countdown_year" name="countdown_year" required />
				</p>
				<p>
					<label for="countdown_month">Month:</label><br />
					<input type="number" min="1" max="12" id="countdown_month" name="countdown_month" required />
				</p>
				<p>
					<label for="countdown_day">Day:</label><br />
					<input type="number" min="1" max="31" id="countdown_day" name="countdown_day" required />
				</p>
				<p>
					<label for="countdown_hour">Hour:</label><br />
					<input type="number" min="0" max="23" id="countdown_hour" name="countdown_hour" required />
				</p>
				<p>
					<label for="countdown_minute">Minute:</label><br />
					<input type="number" min="0" max="59" id="countdown_minute" name="countdown_minute" required />
				</p>
				<p class="submit">
					<input type="submit" name="submit" id="shortcodeShow" class="button button-primary" value="Create Countdown" />
				</p>
			</form>
			<br /><hr><br />
			<h3>
				Set Defaults (OPTIONAL):
			</h3>
			<p>Set the default date and time (this is what will be counted down to, if no date/time is specified when you create a countdown):</p>
			<form method="post" action="options.php">
				<?php settings_fields( 'countdown_options_group' ); ?>
        <p>
					<label for="countdown_option_year">Year:</label><br />
					<input type="number" min="<?php echo date("Y"); ?>" max="9999" id="countdown_option_year" name="countdown_option_year" value="<?php echo get_option('countdown_option_year'); ?>" />
				</p>
				<p>
					<label for="countdown_option_month">Month:</label><br />
					<input type="number" min="1" max="12" id="countdown_option_month" name="countdown_option_month" value="<?php echo get_option('countdown_option_month'); ?>" />
				</p>
				<p>
					<label for="countdown_option_day">Day:</label><br />
					<input type="number" min="1" max="31" id="countdown_option_day" name="countdown_option_day" value="<?php echo get_option('countdown_option_day'); ?>" />
				</p>
				<p>
					<label for="countdown_option_hour">Hour:</label><br />
					<input type="number" min="0" max="23" id="countdown_option_hour" name="countdown_option_hour" value="<?php echo get_option('countdown_option_hour'); ?>" />
				</p>
				<p>
					<label for="countdown_option_minute">Minute:</label><br />
					<input type="number" min="0" max="59" id="countdown_option_minute" name="countdown_option_minute" value="<?php echo get_option('countdown_option_minute'); ?>" />
				</p>
				<!-- <p>
					<label for="countdown_option_second">Second:</label><br />
					<input type="text" id="countdown_option_second" name="countdown_option_second" value="<?php echo get_option('countdown_option_second'); ?>" />
				</p> -->
				<?php  submit_button(); ?>
			</form>
      <br /><hr><br />
			<h3>
				Manual shortcode creation:
			</h3>
			<p>
				Insert a countdown into a post or page by using the <code>[count_flipclock]</code> shortcode.<br />
				You can do this as many times as you want.
			</p>
			<p>
				You can customize the date and time of each countdown by adding a the date/time info to the shortcode.
			</p>
			<p>
				For example: <code>[count_flipclock year=2020 month=2 day=10]</code>
			</p>
			<p>
				Supported attributes are: <code>year</code>, <code>month</code>, <code>day</code>, <code>minute</code> and <code>second</code>!
			</p>
		</div>
		<?php
	}
}

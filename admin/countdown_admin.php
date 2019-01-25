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
}

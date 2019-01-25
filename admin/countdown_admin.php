<?php

namespace nebula\countdown;

class countdownAdmin {

  public function __construct(){
  		add_action( 'admin_init', array($this, 'countdown_register_settings') );
  		add_action('admin_menu', array($this, 'countdown_register_options_page') );
  	}

  	public function countdown_register_settings() {
  		
  	}

  	public function countdown_register_options_page() {
  		global $page_hook_suffix;
  		$page_hook_suffix = add_options_page('Nebula Countdown', 'Countdown', 'manage_options', 'countdown', array($this,'countdown_options_page'));
  	}
}

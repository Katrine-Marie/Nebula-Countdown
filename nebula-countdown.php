<?php
/**********
* Plugin Name: Nebula Countdown
* Description: Add countdowns to your posts/pages via shortcode
* Version: 1.0.0
* Author: Katrine-Marie Burmeister
* Author URI: https://fjordstudio.dk
* License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

namespace nebula\countdown;

if(!defined('ABSPATH')){
	exit('Go away!');
}

$myplugin_url = plugin_dir_url(__FILE__);
if(is_ssl()){
	$my_plugin_url = str_replace('http://', 'https://', $myplugin_url);
}

define('COUNTDOWN_URL', $myplugin_url);
define('COUNTDOWN_DIR', plugin_dir_path(__FILE__));
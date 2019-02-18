<?php
/**********
* Plugin Name: Nebula Countdown
* Description: Add countdowns to your posts/pages via shortcode
* Version: 3.0.0
* Author: Katrine-Marie Burmeister
* Author URI: https://fjordstudio.dk
* License:     GNU General Public License v3.0
* License URI: https://www.gnu.org/licenses/gpl-3.0.html
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

include_once COUNTDOWN_DIR . 'admin/countdown_admin.php';
$admin_page = new countdownAdmin();

include('flipclock/flipclock.php');

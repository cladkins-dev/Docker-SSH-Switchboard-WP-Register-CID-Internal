<?php
/*
Plugin Name: SSH Core
Plugin URI: https://source.awsh.net
Description: SSH Core
Version: 0.0.1
Author: Cody Adkins
Author URI: https://source.awsh.net
Text Domain: SSH Core
*/

// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if

// Let's Initialize Everything
if ( file_exists( plugin_dir_path( __FILE__ ) . 'core-init.php' ) ) {
  require_once( plugin_dir_path( __FILE__ ) . 'core-init.php' );
}

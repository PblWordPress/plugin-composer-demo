<?php
/*
Plugin Name: Plugin composer demo
Plugin URI: http://es.linkedin.com/in/corsino
Description: Just a demo plugin using Composer and Grunt
Version: 0.1
Author: Pablo Corsino
Author URI: http://es.linkedin.com/in/corsino
Text Domain: pbl
Domain Path: /languages/
*/

define('PBL_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('PBL_PLUGIN_DIR', dirname(plugin_basename( __FILE__ )));

require_once(__DIR__ . '/vendor/autoload.php');

Company\RegisterPlugin::init();
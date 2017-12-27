<?php
/**
 * Plugin Name: jb_debug
 * Description: Helps you write not bad code.
 * Version: 0.1.0
 * Author: James Boynton
 */

require_once plugin_dir_path(__FILE__) . 'src/classes/Activation.php';
require_once plugin_dir_path(__FILE__) . 'src/classes/Constants.php';
require_once plugin_dir_path(__FILE__) . 'src/classes/Debug.php';
require_once plugin_dir_path(__FILE__) . 'src/classes/Helpers.php';

use JB\DBG;
use JB\DBG\Activation;
use JB\DBG\Debug;
use JB\DBG\Constants;
use JB\DBG\Helpers;

add_action('init', function() {
  new Debug();
  new Debugger();
});

register_activation_hook(__FILE__, function() {
	Activation::activate();
  flush_rewrite_rules();
});

register_deactivation_hook(__FILE__, function() {
	Activation::deactivate();
  flush_rewrite_rules();
});


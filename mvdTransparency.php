<?php
/**
 * Plugin Name: mvdTransparency
 * Plugin URI: http://www.e-cerebrum.com
 * Description: Add transparency to your charity campaigns. Display sales, money gathered, days until finish and more!
 * Version: 0.1.0
 * Author: Santiago Respane
 * Author URI: http://codepen.io/srespane/
 * License: GPL2
 **/
require_once('includes/adminMenu.php');
//require_once('includes/db.php');
require_once('includes/clases/transparency.php');

//Init plugin class
MvdTransparency::init();

/*register_activation_hook( __FILE__, 'my_plugin_create_db' );
function my_plugin_create_db() {
    MvdTransparency::init();
}*/

?>
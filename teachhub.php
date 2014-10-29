<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.teachhub.com
 * @since             1.0.0
 * @package           Teachhub
 *
 * @wordpress-plugin
 * Plugin Name:       Teachhub
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress dashboard.
 * Version:           1.0.0
 * Author:            Renu Srinivasan
 * Author URI:        http://www.teachhub.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       teachhub
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define current version constant
define( 'TH_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/teachhub-activator.php';

/**
 * The code that runs during plugin deactivation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/teachhub-deactivator.php';

/** This action is documented in includes/teachhub-activator.php */
register_activation_hook( __FILE__, array( 'Teachhub_Activator', 'activate' ) );

/** This action is documented in includes/teachhub-deactivator.php */
register_deactivation_hook( __FILE__, array( 'Teachhub_Deactivator', 'deactivate' ) );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/teachhub.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_teachhub() {

	$plugin = new Teachhub();
	$plugin->run();

}
run_teachhub();


// create custom plugin settings menu
add_action( 'admin_menu', 'teachhub_plugin_menu' );

function teachhub_plugin_menu() {
  //create side menu
  add_menu_page( __( 'Teachhub', 'teachhub-plugin' ), __( 'Teachhub', 'teachhub-plugin' ), 'manage_options', 'teachhub_main_menu', 'teachhub_settings' );

}

?>

<div class="wrap">
  <h2><?php _e( 'Teachhub', 'teachhub-plugin' ); ?> <?php _e( 'version', 'teachhub-plugin' ); ?>: <?php echo TH_VERSION; ?></h2>

</div>



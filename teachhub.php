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

//initialize custom post types and taxonomies
require_once plugin_dir_path( __FILE__ ) . '/custom_posts_tags.php';

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
  add_menu_page( 'Teachhub Settings', 'Teachhub', 'manage_options', 'teachhub_main_menu', 'teachhub_menu' );
  
  //sub menu with all custom post type edit pages
  add_submenu_page( 'teachhub_main_menu', 'Content', 'Content', 'manage_options', 'teachhub_submenu_content', 'teachhub_submenu_content' );
  add_submenu_page( 'teachhub_submenu_content', 'Articles', 'Articles', 'manage_options', 'edit.php?post_type=article', null );
  add_submenu_page( 'teachhub_submenu_content', 'Authors', 'Authors', 'manage_options', 'edit.php?post_type=author', null );
  add_submenu_page( 'teachhub_submenu_content', 'Blogs', 'Blogs', 'manage_options', 'edit.php?post_type=blog', null );
  add_submenu_page( 'teachhub_submenu_content', 'Forums', 'Forums', 'manage_options', 'edit.php?post_type=forum', null );
  add_submenu_page( 'teachhub_submenu_content', 'Humor', 'Humor', 'manage_options', 'edit.php?post_type=humor', null );
  add_submenu_page( 'teachhub_submenu_content', 'Infographics', 'Infographics', 'manage_options', 'edit.php?post_type=infographic', null );
  add_submenu_page( 'teachhub_submenu_content', 'Newsletters', 'Newsletters', 'manage_options', 'edit.php?post_type=newsletter', null );
  add_submenu_page( 'teachhub_submenu_content', 'Press Releases', 'Press Releases', 'manage_options', 'edit.php?post_type=press_release', null );
  add_submenu_page( 'teachhub_submenu_content', 'Printables', 'Printables', 'manage_options', 'edit.php?post_type=printable', null );
  add_submenu_page( 'teachhub_submenu_content', 'Recommendations', 'Recommendations', 'manage_options', 'edit.php?post_type=recommendation', null );
  add_submenu_page( 'teachhub_submenu_content', 'Reviews', 'Reviews', 'manage_options', 'edit.php?post_type=review', null );

  //sub menu with all custom taxonomy edit pages
  add_submenu_page( 'teachhub_main_menu', 'Taxonomy', 'Taxonomy', 'manage_options', 'teachhub_submenu_taxonomy', 'teachhub_submenu_taxonomy' );
  add_submenu_page( 'teachhub_submenu_taxonomy', 'Forums', 'Forums', 'manage_options', 'edit-tags.php?taxonomy=forums', null );
  add_submenu_page( 'teachhub_submenu_taxonomy', 'Humor', 'Humor', 'manage_options', 'edit-tags.php?taxonomy=humor', null );
  add_submenu_page( 'teachhub_submenu_taxonomy', 'Lists', 'Lists', 'manage_options', 'edit-tags.php?taxonomy=lists', null );
  add_submenu_page( 'teachhub_submenu_taxonomy', 'Reviews', 'Reviews', 'manage_options', 'edit-tags.php?taxonomy=reviews', null );
  add_submenu_page( 'teachhub_submenu_taxonomy', 'Seasonal', 'Seasonal', 'manage_options', 'edit-tags.php?taxonomy=seasonal', null );
  add_submenu_page( 'teachhub_submenu_taxonomy', 'Tags', 'Tags', 'manage_options', 'edit-tags.php?taxonomy=tags', null );
  add_submenu_page( 'teachhub_submenu_taxonomy', 'Topics', 'Topics', 'manage_options', 'edit-tags.php?taxonomy=topics', null );
}

function teachhub_menu() {
?>

  <div class="wrap">
    <h2>Plugin for Teachhub</h2>
    <p>Version: <?php echo TH_VERSION; ?></p>

  </div>

<?php 
}

function teachhub_submenu_content() {
?>

  <div class="wrap">
    <h2>Custom Post Types</h2>
  </div>

<?php 
}

function teachhub_submenu_taxonomy() {
?>

  <div class="wrap">
    <h2>Custom Taxonomy</h2>
  </div>

<?php 
}



?>

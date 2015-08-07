<?php
/*
Plugin Name: Captain Favicon
Plugin URI: http://github.com/bryceadams/captain-favicon
Description: The easiest way to add a Favicon to your site.
Author: Bryce Adams
Author URI: http://bryceadams.com
Version: 1.2.2
Text Domain: captain-favicon
License: GNU GPL V3
*/


/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/

// Plugin Folder Path
if( !defined( 'CTFAVICON_PLUGIN_DIR' ) ) {
	define( 'CTFAVICON_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}


/*
|--------------------------------------------------------------------------
| INCLUDES
|--------------------------------------------------------------------------
*/

// Register Some Settings
include_once( CTFAVICON_PLUGIN_DIR . 'includes/settings.php' );

// Use Uploaded Favicon
include_once( CTFAVICON_PLUGIN_DIR . 'includes/usage.php' );


/*
|--------------------------------------------------------------------------
| I18N - LOCALIZATION
|--------------------------------------------------------------------------
*/

function ctfavicon_load_locations() {

	load_plugin_textdomain( 'captain-favicon', false, basename( dirname( __FILE__ ) ) . '/languages/' );

}
add_action( 'init', 'ctfavicon_load_locations' );

/*
|--------------------------------------------------------------------------
| OTHER-FUNCTIONS
|--------------------------------------------------------------------------
*/

/*****
 * Add 'Settings' Link to Plugins Page
**/

function ctfavicon_settings_link( $links, $file ) {
	static $this_plugin;
	
	if ( !$this_plugin ) $this_plugin = plugin_basename(__FILE__);
 
	if ( $file == $this_plugin ) {
		$settings_link = '<a href="options-general.php?page=ctfavicon-settings">' . __( "Settings", 'captain-favicon' ) . '</a>';
		array_unshift( $links, $settings_link );
	}
	
	return $links;
}
add_filter( 'plugin_action_links', 'ctfavicon_settings_link', 10, 2 );
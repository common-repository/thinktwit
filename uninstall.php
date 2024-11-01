<?php
	// Check for ABSPATH and WP_UNINSTALL_PLUGIN to ensure we are authorised to uninstall the plugin
	if(!defined('WP_UNINSTALL_PLUGIN')) {
		exit();
	}
	
	// Get our widget settings
	$settings = get_option("widget_thinktwit_settings");
	
	// Get the cache names
	$cache_names = $settings["cache_names"];
	
	// Iterate through the cache names and delete the options
	foreach ($cache_names as $key => $option) {
		// Delete the option
		delete_option($option);
	}
	
	// Finally delete the settings and widget
	delete_option("widget_thinktwit_settings");
	delete_option("widget_thinktwit");
?>
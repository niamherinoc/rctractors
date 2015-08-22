<?php 

if ( is_admin() ) { // check to make sure we aren't on the front end
add_filter('wpseo_pre_analysis_post_content', 'add_custom_to_yoast');

function add_custom_to_yoast( $content ) {
	global $post;
	$pid = $post->ID;

	$custom = get_post_custom($pid);
		unset($custom['_yoast_wpseo_focuskw']); // Don't count the keyword in the Yoast field!

		foreach( $custom as $key => $value ) {
			if( substr( $key, 0, 1 ) != '_' && substr( $value[0], -1) != '}' && !is_array($value[0]) && !empty($value[0])) {
				$custom_content .= $value[0] . ' ';
			}

		}

		$content = $content . ' ' . $custom_content;
		return $content;

		remove_filter('wpseo_pre_analysis_post_content', 'add_custom_to_yoast'); // don't let WP execute this twice
	}
}


$required_capability = 'edit_others_posts';
$redirect_to = '';
function no_admin_init() {      
    // We need the config vars inside the function
    global $required_capability, $redirect_to;      
    // Is this the admin interface?
    if (
        // Look for the presence of /wp-admin/ in the url
        stripos($_SERVER['REQUEST_URI'],'/wp-admin/') !== false
        &&
        // Allow calls to async-upload.php
        stripos($_SERVER['REQUEST_URI'],'async-upload.php') == false
        &&
        // Allow calls to admin-ajax.php
        stripos($_SERVER['REQUEST_URI'],'admin-ajax.php') == false
    ) {         
        // Does the current user fail the required capability level?
        if (!current_user_can($required_capability)) {              
            if ($redirect_to == '') { $redirect_to = get_option('home'); }              
            // Send a temporary redirect
            wp_redirect($redirect_to,302);              
        }           
    }       
}
// Add the action with maximum priority
add_action('init','no_admin_init',0);

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

?>
<?php

// Exit if uninstall not called from WordPress
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Remove all options used by the plugin
delete_option('lyyti_api_public_key');
delete_option('lyyti_api_private_key');
delete_option('lyyti_default_eid');
delete_option('lyyti_default_status');
delete_option('lyyti_cache_lifetime');

// Remove any cached transients
global $wpdb;
$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_lyyti_participant_count_%'");
$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout_lyyti_participant_count_%'");

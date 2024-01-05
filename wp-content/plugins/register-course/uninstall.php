<?php
    if(!defined("WP_UNISTALL_PLUGIN")){
        die;
    }
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS `$wpdb->prefix.course_registrations`");
?>
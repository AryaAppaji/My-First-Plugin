<?php
    /**
     * Plugin Name: Add Business Type
     * Author: Arya Appaji
     * Description: This plugin is used to work with the API
     * Version: 1.0 
     */
    
     if(!defined("ABSPATH")){
        die;
    }
    require_once __DIR__."/functions.php";

    add_shortcode("data_form", 'displayForm');
?>
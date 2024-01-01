<?php
    /**
     * Plugin Name: Test List of objects API
     * Description: This is used to test the GET API
     * Author: Arya Appaji
     * Version: 1.0
     */
    
    function get_response(){
        ob_start();
        $data = wp_remote_retrieve_body(wp_remote_get('https://api.restful-api.dev/objects/?id=3&id=5&id=10'));
        echo $data;
        ob_end_flush();
    }

    add_shortcode("list-objects", "get_response");
?>
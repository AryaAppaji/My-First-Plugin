<?php
    /**
     * Plugin Name: Test GET SPECIFIC API
     * Description: This is used to test the GET Specific API
     * Author: Arya Appaji
     * Version: 1.0
     */
    
    function get_response(){
        ob_start();
        $data = wp_remote_retrieve_body(wp_remote_get('https://api.restful-api.dev/objects/7'));
        echo $data;
        ob_end_flush();
    }

    add_shortcode("get-specific", "get_response");
?>
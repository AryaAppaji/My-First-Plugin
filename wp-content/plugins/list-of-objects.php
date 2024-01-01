<?php
    /**
     * Plugin Name: Test List of objects API
     * Description: This is used to test the GET List of Objects API
     * Author: Arya Appaji
     * Version: 1.0
     */
    
    function list_object_response(){
        ob_start();
        $data = wp_remote_retrieve_body(wp_remote_get('https://api.restful-api.dev/objects/?id=3&id=5&id=10'));
        echo $data;
        ob_end_flush();
    }

    add_shortcode("list-objects", "list_object_response");
?>
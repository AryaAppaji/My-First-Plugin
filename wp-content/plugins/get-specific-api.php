<?php
    /**
     * Plugin Name: Test GET SPECIFIC API
     * Description: This is used to test the GET API
     * Author: Arya Appaji
     * Version: 1.0
     */
    
    function get_response(){
        ob_start();
        $data = wp_remote_retrieve_body(wp_remote_get('https://jsonplaceholder.typicode.com/todos/1'));
        echo $data;
        ob_end_flush();
    }

    add_shortcode("get-specific", "get_response");
?>
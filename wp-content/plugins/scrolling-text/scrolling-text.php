<?php
    /**
     * Plugin Name: ScrollingText
     * Version: 1.0
     * Description: This plugin displays a scrolling text.
     * Author: Arya Appaji
     */
    function activate(){
        flush_rewrite_rules();
    }


    function deactivate(){
        flush_rewrite_rules();
    }


    function uninstall(){
        
    }


    register_activation_hook(__FILE__, "activate");

    
    function scrollingText(){
        echo "<marquee  style='background-color:blue;color:white'>This text is generated from scrolling text plugin</marquee>";
    }


    add_action("wp_footer", "scrollingText");
    register_activation_hook(__FILE__, "deactivate");
    register_activation_hook(__FILE__, "uninstall");
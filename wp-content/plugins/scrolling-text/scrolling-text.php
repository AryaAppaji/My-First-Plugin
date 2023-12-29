<?php
    /**
     * Plugin Name: ScrollingText
     * Version: 1.0
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
        echo "<marquee style='background-color:blue;color:white'>This text is generated from scrolling text plugin</marquee>";
    }


    add_action("wp_footer", "scrollingText");
    register_deactivation_hook(__FILE__, "deactivate");
    register_uninstall_hook(__FILE__, "uninstall");
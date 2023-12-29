<?php
    /**
     * Plugin Name: Registration Form Plugin
     * Description: This is a regisration form.
     * Version: 1.0
     * Author: Arya Appaji
     */
    if(!defined("ABSPATH")){
        die;
    }
    require_once __DIR__."/functions.php";

    add_shortcode("basic_form", 'displayForm');


    
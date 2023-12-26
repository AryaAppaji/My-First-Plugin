<?php
    function my_shortcode_function($atts = array(), $content = null) {
        
        $modified_content = strtoupper($content);

        return $modified_content;
    }

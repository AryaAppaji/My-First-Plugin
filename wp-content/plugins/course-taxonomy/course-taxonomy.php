<?php
    /**
     * Plugin Name: Course Taxonomy
     * Description: A short example showing how to add taxanomy called Course
     * Version: 1.0
     */

    if(!defined('ABSPATH')){
        die;
    }

    function course_taxonomy(){
        $labels = array(
         'name'              => 'Courses',
		 'singular_name'     => 'Course',
		 'search_items'      => 'Search Courses',
		 'all_items'         => 'All Courses',
		 'parent_item'       => 'Parent Course',
		 'parent_item_colon' => 'Parent Course:',
		 'edit_item'         => 'Edit Course',
		 'update_item'       => 'Update Course',
		 'add_new_item'      => 'Add New Course',
		 'new_item_name'     => 'New Course Name',
		 'menu_name'         => 'Course',
        );
        $args = array(
            "hierarchical" => true,
            "labels" => $labels,
            "show_ui" => true,
            "show_admin_column" => false,
            "query_var" => true,
            "rewrite" => ["slug" => "course"],
        );
        register_taxonomy("course", ["post"], $args);
    }

    add_action("init", "course_taxonomy");

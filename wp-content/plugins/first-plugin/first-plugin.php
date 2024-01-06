<?php

/**

* Plugin Name: First Plugin

* Description: This is my first plugin

* License:     GPL v2 or later

* License URI: https://www.gnu.org/licences/gpl-2.0.html

*/



/**

{Plugin Name} is free software: you can redistribute it and/or modify

it under the terms of the GNU General Public License as published by

the Free Software Foundation, either version 2 of the License, or

any later version.



{Plugin Name} is distributed in the hope that it will be useful,

but WITHOUT ANY WARRANTY; without even the implied warranty of

MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the

GNU General Public License for more details.



You should have received a copy of the GNU General Public License

along with {Plugin Name}. If not, see {License URI}.

*/



require_once "functions.php";

/**

 * Register the "book" custom post type.

 */

function first_plugin_setup_post_type()

{

    $labels = array(
      "name" => _x("BOOKS","post type general name","text domain"),
);
    $args = array(
	"labels" => $labels,
	"public" => true,
);
    register_post_type("book", $args);

}

add_action("init", "first_plugin_setup_post_type");





/**

 *Activate the plugin. 

 */

function first_plugin_activate()

{

    first_plugin_setup_post_type();

    flush_rewrite_rules();

}

register_activation_hook(__FILE__, "first_plugin_activate");





/**

 * Deactivation hook.

 */

function first_plugin_deactivate(){

    unregister_post_type("book");

    flush_rewrite_rules();

}

register_deactivation_hook(__FILE__, "first_plugin_deactivate");





/**

 * Uninstall hook.

 */

/*function first_plugin_uninstall(){



}

register_uninstall_hook(__FILE__, "first_plugin_uninstall");*/





function  checkUser_arya_role(){

    if(is_user_logged_in()){

        $user = wp_get_current_user();

        $roles = (array) $user->roles;

        echo "My user ID is: " . $user->ID;

    }

    else{

        echo "No User";

    }

}





add_action('wp_footer', 'checkUser_arya_role');



add_shortcode("my_shortcode", "my_shortcode_function");



function my_plugin_menu() {

    add_menu_page(

        'My Plugin',

        'My Plugin',

        'manage_options',

        'my-plugin',

        'my_plugin_page'

    );



    add_submenu_page(

        'my-plugin',

        'Submenu Page 1',

        'Submenu 1',

        'manage_options',

        'my-plugin-submenu-1',

        'my_plugin_submenu_1'

    );



    add_submenu_page(

        'my-plugin',

        'Submenu Page 2',

        'Submenu 2',

        'manage_options',

        'my-plugin-submenu-2',

        'my_plugin_submenu_2'

    );

}



function my_plugin_page() {

    echo '<div class="wrap"><h2>Main Plugin Page</h2></div>';

}



function my_plugin_submenu_1() {

    echo '<div class="wrap"><h2>Submenu 1 Page</h2></div>';

}



function my_plugin_submenu_2() {

    echo '<div class="wrap"><h2>Submenu 2 Page</h2></div>';

}



add_action('admin_menu', 'my_plugin_menu');


<?php
   /**
    * Plugin Name: CRUD Plugin
    * Description: This plugin is used to demonstrate CRUD operation on database
    * Version: 1.0 
    * Author: Arya Appaji
    */
    
    if(!defined("ABSPATH")){
        die;
    }

    class CrudPlugin{
        function displayOptions(){
            ob_start();
?>
            <div>
                <label for="Create">Create</label>
                <input type="radio" name="Operation" id="Create">

                <label for="Read">Read</label>
                <input type="radio" name="Operation" id="Read">

                <label for="Update">Update</label>
                <input type="radio" name="Operation" id="Update">

                <label for="Delete">Delete</label>
                <input type="radio" name="Operation" id="Delete">
            </div>
<?php
            ob_end_flush();
        }
    }

    $obj = new CrudPlugin();
    add_shortcode("crud-select", array($obj, "displayOptions"));
?>
<?php
    /**
     * Plugin Name: Add Business Type
     * Author: Arya Appaji
     * Description: This plugin is used to work with the API
     * Version: 1.0 
     */
    
     if(!defined("ABSPATH")){
        die;
     }  
    function displayForm(){
        ob_start();
?>
        <div>
            <form action="" method="post">
                <label for="name">Name</label>
                <input type="text" name="business_name" id="name" required><br><br>

                <label for="status">Status</label>
                <input type="checkbox" name="business_status" id="status" required><br><br>

                <input type="submit" value="Submit">
            </form>
        </div>
<?php
        return ob_get_clean();   
    }
    include_once "collect_data.php";
    
    add_shortcode("data_form", 'displayForm');
?>

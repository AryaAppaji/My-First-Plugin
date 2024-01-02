<?php
    /**
     * Plugin Name: POST API TEST
     * Description: This plugin is used to test the POST API
     * Version: 1.0
     * Author: Arya Appaji
     */


     function display_post_form(){
        ob_start();
?>
        <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" target="">
            <input type="text" name="name" placeholder="Enter Product Name"><br><br>
            <input type="number" name="year" placeholder="Enter Year"><br><br>
            <input type="number" name="price" placeholder="Enter Price"><br><br>
            <input type="text" name="cpu_model" placeholder="Enter CPU Model"><br><br>
            <input type="text" name="disk_size" placeholder="Enter Disk size"><br><br>
            <input type="submit" value="Submit">
        </form>
<?php
        ob_end_flush();
     }

     include_once "validate.php";
     add_shortcode("post_form", "display_post_form");
?>
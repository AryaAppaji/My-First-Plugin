<?php
    /**
     * Plugin Name: DB Crud
     * Description: This plugin is used for CRUD Operations
     * Version: 1.0
     * Author: Arya Appaji
     */


     class DbCrud{
        public function __construct(){
            global $wpdb;
            $table = $wpdb->prefix . "db_crud";
            $wpdb->query("CREATE TABLE $table(
                `name` VARCHAR(30),
                `email` VARCHAR(30),
            )");
        }
        public function selectOption(){
            ob_start();
            echo "<select name = 'option' id='opt'>
                <option value = 'create'>Create</option>
                <option value = 'read'>Read</option>
                <option value = 'update'>Update</option>
                <option value = 'delete'>Delete</option>
            </select>";
            ob_end_flush();
        }

        public function showDbCrudForm(){
            ob_start();
            echo "<form action='' method='post' id='crud-form' style='display:none' onchange='show_form()'>
            <input type = 'text' name='name'><br><br>
            <input type = 'email' name='email'><br><br>
            <input type = 'submit' value='Submit'>
            </form>";
            ob_end_flush();
        }
     }


     $obj = new DbCrud();
     
     add_shortcode("options", "selectOptions");
     add_shortcode("form", "showDbCrudForm");
?>
<script>
    function show_form(){
        var op = document.getElementById("opt");
        var cForm = document.getElementById("crud-form");
        
        if(op.value == "create"){
            cForm.style.display = "block";
            <?php
                include_once"validate.php";
                validateAndStore();
            ?>
        }
    }
</script>

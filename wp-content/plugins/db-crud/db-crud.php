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
        public function selectOptions(){
            ob_start();
            echo "<select name = 'option' id='opt'  onchange='show_form()'>
                <option value = 'none'>None</option>
                <option value = 'create'>Create</option>
                <option value = 'read'>Read</option>
                <option value = 'update'>Update</option>
                <option value = 'delete'>Delete</option>
            </select><br>";
            ob_end_flush();
        }

        public function showDbCrudForm(){
            ob_start();
            echo "<form action='' method='post' id='crud-form' style='display:none'>
            <input type = 'text' name='name' placeholder = 'Enter Name'><br><br>
            <input type = 'email' name='email' placeholder = 'Enter Email'><br><br>
            <input type = 'submit' value='Submit'>
            </form>";
            ob_end_flush();
        }
     }


     $obj = new DbCrud();
     
     add_shortcode("options", array($obj, "selectOptions"));
     add_shortcode("form", array($obj,"showDbCrudForm"));
?>
<script>
    function show_form(){
        var op = document.getElementById("opt");
        var cForm = document.getElementById("crud-form");
        
        if(op.value == "create"){
            cForm.style.display = "block";
            <?php
                include_once "validate.php";
                $result = validateAndStore();
                if($result){
                    echo "Data inserted successfully";
                }
            ?>
        }
    }
</script>

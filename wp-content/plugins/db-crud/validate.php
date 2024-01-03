<?php
function validateAndStore(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["name"],$_POST["email"])){
            $name = $_POST["name"];
            $email = $_POST["email"];
            global $wpdb;
            $wpdb->query("INSERT INTO $wpdb->prefix.db_crud VALUES($name, $email)");
        } 
    }
}
?>
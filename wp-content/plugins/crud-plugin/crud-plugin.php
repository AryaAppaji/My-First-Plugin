<?php
    /**
     * Plugin Name: CRUD Plugin
     * Description: This plugin is used to demonstrate CRUD operation on the database
     * Version: 1.0 
     * Author: Arya Appaji
     */

    if (!defined("ABSPATH")) {
        die;
    }

    class CrudPlugin
    {
        function displayOptions()
        {
            ob_start();
            ?>
            <div>
                <select name="Operation" id="oper" onchange="showHideForm()">
                    <option value="None">None</option>
                    <option value="Create">Create</option>
                    <option value="Read">Read</option>
                    <option value="Update">Update</option>
                    <option value="Delete">Delete</option>
                </select>
                <br>
            </div>
            <?php
            ob_end_flush();
        }

        function showCrudForm()
        {
            ob_start();
            ?>
            <form action="" method="post" id="crudForm" style="display:none;">
                <input type="text" name="name" placeholder="Enter Name"><br><br>
                <input type="email" name="mail" placeholder="Enter Email Address"><br><br>
                <input type="submit" value="Submit">
            </form>
            <?php
            ob_end_flush();
        }
    }

    $obj = new CrudPlugin();
    add_shortcode("crud-select", array($obj, "displayOptions"));
    add_shortcode("show-form", array($obj, "showCrudForm"));
?>

<script>
    function showHideForm() {
        var opt = document.getElementById("oper");
        var form = document.getElementById("crudForm");
        var h1 = document.getElementById("heading");

        if (opt.value === "Create") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }

    // Initial check on page load
    showHideForm();
</script>

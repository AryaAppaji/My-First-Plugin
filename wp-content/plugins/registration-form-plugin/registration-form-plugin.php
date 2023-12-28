<?php
    /**
     * Plugin Name: Registration Form Plugin
     * Description: This is a regisration form.
     * Version: 1.0
     * Author: Arya Appaji
     */
    if(!defined("ABSPATH")){
        die;
    }
    require_once __DIR__."/activate.php";
    require_once __DIR__."/deactivate.php";
    require_once __DIR__."/uninstall.php";
    /*$form = '<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="" method="POST">
                Name<input type="text" name = "Name" placeholder="Enter Name">
                Email<input type="email" name = "Email" placeholder = "Enter Email">
                <input type = "submit" value="Submit">
            </form>
        </body>
    </html>';
    echo $form;*/
    register_activation_hook(__FILE__, "activate");
    function displayForm(){
?>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="" method="POST">
                Name<input type="text" name = "Name" placeholder="Enter Name">
                Email<input type="email" name = "Email" placeholder = "Enter Email">
                <input type = "submit" value="Submit">
            </form>
        </body>
    </html>
<?php
    }
    add_action("admin_notices", "displayForm");
    register_deactivation_hook(__FILE__, "deactivate");
    register_uninstall_hook(__FILE__, "uninstall");
?>


    
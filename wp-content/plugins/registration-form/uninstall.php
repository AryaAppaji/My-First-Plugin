<?php
    if(! defined("WP_UNINSTALL_PLUGIN")){
        die;
    }
    $conn = mysqli_connect("localhost", "root", "", "my-first-plugin");
    mysqli_query($conn, "DROP TABLE IF EXISTS registration");

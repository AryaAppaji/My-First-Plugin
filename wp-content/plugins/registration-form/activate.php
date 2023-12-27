<?php
    function activate(){
        flush_rewrite_rules();
        $conn = mysqli_connect("localhost", "root", "", "my-first-plugin");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        mysqli_query($conn, "CREATE TABLE IF NOT EXISTS registration (
            `name` VARCHAR(30),
            `email` VARCHAR(50)
        )");
    }

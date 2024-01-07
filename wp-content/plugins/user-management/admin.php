<?php
    function greetAdmin(){
        echo "<p>Hello Admin</p>";
    }

    add_shortcode("greet-admin", "greetAdmin");
?>
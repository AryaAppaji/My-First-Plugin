<?php
    function greetStudent(){
        echo "<p>Hello Student</p>";
    }

    add_shortcode("greet-student", "greetStudent");
?>
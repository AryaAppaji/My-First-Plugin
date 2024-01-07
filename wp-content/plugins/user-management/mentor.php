<?php
    function greetMentor(){
        echo "<p>Hello Mentor</p>";
    }

    add_shortcode("greet-mentor", "greetMentor");
?>
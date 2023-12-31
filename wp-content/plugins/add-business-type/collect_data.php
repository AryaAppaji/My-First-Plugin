<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['business_name'];
        $status = $_POST['business_status'];
        
        echo $name;
        echo $status;
    }
?>

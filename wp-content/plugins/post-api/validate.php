<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["name"], $_POST["year"], $_POST["price"], $_POST["cpu_model"], $_POST["disk_size"])){
            $name = $_POST["name"];
            $year = $_POST["year"];
            $price = $_POST["price"];
            $cpu_model = $_POST["cpu_model"];
            $disk_size = $_POST["disk_size"];

            $data = array(
                "name" => $name,
                "data" => array(
                    "year" => $year,
                    "price" => $price,
                    "CPU Model" => $cpu_model,
                    "Hard disk size" => $disk_size,
                ),
            );

            $endpoint = "https://api.restful-api.dev/objects";
            $json_data = json_encode($data);

            $args = array(
                'body'    => $json_data,
                'headers' => array('Content-Type' => 'application/json'),
            );
            $output = wp_remote_post($endpoint, $args);
            if (is_wp_error($output)) {
                echo "API request failed. Error: " . $output->get_error_message();
            } else {
                $api_response = json_decode(wp_remote_retrieve_body($output), true);
                echo "API Response: " . $api_response;
            }
        }
    }
?>
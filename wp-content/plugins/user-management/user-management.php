<?php
    /**
     * Plugin Name: User Management
     * Description: This plugin is used to manage the users.
     * Version: 1.0
     * Author: Arya Appaji
     */

    if(!defined("ABSPATH")){
        die;
    }

    class UserManagement{
        public function activate(){
            global $wpdb;
            $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}user_management (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `name` VARCHAR(30),
                `email` VARCHAR(30),
                `mobile` VARCHAR(10),
                `password` VARCHAR(255),
                `role` VARCHAR(30)
            )");
        }
        
        public function deactivate(){
            flush_rewrite_rules();
        }

        function displayUserRegistrationForm(){
            ob_start();
?>
            <form action="<?php echo admin_url('admin-post.php');?>" method="post">
                <label for="nm">Name</label>
                <input type="text" name="Name" id="nm" required><br><br>

                <label for="em">Email</label>
                <input type="email" name="Email" id="em" required><br><br>
                
                <label for="mob">Mobile</label>
                <input type="text" name="Mobile" id="mob" required><br><br>
                
                <label for="pass">Password</label>
                <input type="password" name="Password" id="pass" required><br><br>
                
                <label for="rl">Role</label>
                <select name="Role" id="rl" required>
                    <option value="Admin">Admin</option>
                    <option value="Mentor">Mentor</option>
                    <option value="Student">Student</option>
                </select><br><br>
                
                <input type="hidden" name="action" value="createUser">
                
                <input type="submit" value="Submit" name="submit">
            </form>
<?php
            return ob_get_clean();
        }
        
        function createUser(){
           if(isset($_POST["submit"])){
                global $wpdb;
                
                if(isset($_POST["Name"], $_POST["Email"], $_POST["Mobile"], $_POST["Password"], $_POST["Role"])){
                    $name = sanitize_text_field($_POST["Name"]);
                    $email = sanitize_email($_POST["Email"]);
                    $mobile = sanitize_text_field($_POST["Mobile"]);
                    $password = wp_hash_password($_POST["Password"]);
                    $role = sanitize_text_field($_POST["Role"]);    
                }
                
                $wpdb->insert($wpdb->prefix."user_management", array(
                    "name" => $name,
                    "email" => $email,
                    "mobile" => $mobile,
                    "password" => $password,
                    "role" => $role 
                ));

                $current_url = $_SERVER["HTTP_REFERRER"];
                wp_redirect($current_url);
                exit;
           }     
        }
    }

    $user_mgmt = new UserManagement();

    register_activation_hook(__FILE__, array($user_mgmt, "activate"));
    register_deactivation_hook(__FILE__, array($user_mgmt, "deactivate"));
    add_shortcode("show-user-register-form", array($user_mgmt, "displayUserRegistrationForm"));
    add_action("init", array($user_mgmt, "createUser"));
?>
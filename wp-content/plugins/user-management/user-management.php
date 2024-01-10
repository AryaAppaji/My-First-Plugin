<?php

/**

* Plugin Name: User Management

* Version: 1.0

* Description: A plugin for user registration

* Author: Arya Appaji

*/



if(!defined("ABSPATH")){

	die;

}



function registerUserByUserManagement(){

	ob_start();

?>

	<form action="<?php echo admin_url('admin-post.php');?>" method="POST" name="user_register_form">

		<input type="text" name="userName" placeholder="Enter user name" required><br><br>

		<input type="email" name="userEmail" placeholder="Enter user E-mail" required><br><br>

		<input type="password" id="p1" name="userPassword" placeholder="Enter Password" required>

		<button id="b1" onclick="viewOrHidePassword()">View Password</button>

		<br><br>

		<p>Select Role</p>

		<select name="role"  required>

<?php

		$roles = wp_roles()->get_names();

		foreach($roles as $role => $name){

			echo "<option value=\"{$role}\">{$name}</option>";

		}

?>

		</select><br><br>

		<input type="submit" name="userRegistration" value="Register">

		<input type="hidden" name="action" value="createUserByUserManagement">

	</form>

	<script>

		function viewOrHidePassword(){

			var field = document.getElementById("p1");

			var bn = document.getElementById("b1");

		        var t = field.getAttribute("type");

		

		        if(t == "password"){

			   field.setAttribute("type", "text");

			   bn.innerHTML = "Hide Password";

		        }

		        else if(t == "text"){

			   field.setAttribute("type", "password");

			   bn.innerHTML = "View Password";

		        }

		} 

	</script>

<?php

	return ob_get_clean();

}

add_shortcode("show_user_register_form", "registerUserByUserManagement");





function createUserByUserManagement(){

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		if($_POST["userRegistration"]){

			if(isset($_POST["userName"], $_POST["userEmail"], $_POST["userPassword"], $_POST["role"])){

				$userName = sanitize_text_field($_POST["userName"]);

				$userEmail = sanitize_text_field($_POST["userEmail"]);

				$userPassword = wp_hash_password($_POST["userPassword"]);

				$role = sanitize_text_field($_POST["role"]);

				

				$user = wp_create_user($userName, $userPassword, $userEmail);

				$user = new WP_User($user);
         			$user->set_role($role);

				

				wp_set_current_user($user->ID, $userName);

				wp_set_auth_cookie($user->ID);

				wp_redirect(home_url("/greet-admin"));

				

				exit;

			}

		}

	}

}



add_action("init", "createUserByUserManagement");

?>
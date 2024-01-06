<?php

    /**

     * Plugin Name: Register for course

     * Description: This plugin is used to register for a course

     * Version: 1.0

     * Author: Arya Appaji

     */





     if(!defined("ABSPATH")){

        die;

     }

     class RegisterForCourse{

        

        public function activate(){

           global $wpdb;

		
           $wpdb->query("CREATE TABLE IF NOT EXISTS $wpdb->prefix.course_registrations(

                `name` VARCHAR(30),

                `mobile` VARCHAR(30),

                `email` VARCHAR(30),

                `course` VARCHAR(30)

            )");

            flush_rewrite_rules();

        }



        public function deactivate(){

            flush_rewrite_rules();

        }



        function displayCourseRegistrationForm(){

            ob_start();

?>

            <form action="<?php echo admin_url('admin-post.php'); ?>" method="post">

                <label for="name">Name</label>

                <input type="text" name="name" id="name"><br><br>

                

                <label for="mobile">Mobile</label>

                <input type="text" name="mobile" id="mobile"><br><br>

                

                <label for="email">Email</label>

                <input type="email" name="email" id="email"><br><br>

                

                <label for="course">Course</label>

                <select name="course" id="course">

                    <option value="Java">Java</option>

                    <option value="Python">Python</option>

                    <option value="Web Development">Web Development</option>

                    <option value="Salesforce">Salesforce</option>

                    <option value="Linux">Linux</option>

                </select><br><br>

                <input type="submit" value="Submit" name="submit">

                <input type="hidden" name="action" value="process_registration_form">

            </form>

<?php

            return ob_get_clean();

        }



        function process_registration_form(){

            if(isset($_POST["submit"])){

                global $wpdb;

                

                $name = sanitize_text_field($_POST['name']);

                $mobile = sanitize_text_field($_POST['mobile']);

                $email = sanitize_email($_POST['email']);

                $course = sanitize_text_field($_POST['course']);



                $wpdb->insert($wpdb->prefix . "course_registrations", array(

                    "name" => $name,

                    "mobile" => $mobile,

                    "email" => $email,

                    "course" => $course

                ));



                $current_url = $_SERVER['HTTP_REFERER'];

                wp_redirect($current_url);

                exit;

            }

        }

     }





     $rfc = new RegisterForCourse();



     register_activation_hook(__FILE__, array($rfc, "activate"));

     register_deactivation_hook(__FILE__, array($rfc, "deactivate"));

     add_shortcode('course_register_form', array($rfc,'displayCourseRegistrationForm'));

     add_action("init", array($rfc,'process_registration_form'));

?>
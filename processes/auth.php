<?php
class auth {

    public function bind_to_template($replacements, $template) {
        return preg_replace_callback('/{{(.+?)}}/', function($matches) use ($replacements) {
            return $replacements[$matches[1]];
        }, $template);
    }

    public function signup($conn, $ObjGlob, $ObjSendMail, $lang, $conf) {
        if (isset($_POST["signup"])) {
            $errors = array();

            $fullname = $_SESSION["fullname"] = $conn->escape_values(ucwords(strtolower($_POST["fullname"])));
            $email_address = $_SESSION["email_address"] = $conn->escape_values(strtolower($_POST["email_address"]));
            $username = $_SESSION["username"] = $conn->escape_values(strtolower($_POST["username"]));
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];
            // Implement input validation and error handling
            // =============================================
            // Sanitize all inputs

            // Verify that the fullname has only letters, space, dash, quotation
            if (ctype_alpha(str_replace(" ", "", str_replace("\'", "", $fullname))) === FALSE) {
                $errors['nameLetters_err'] = "Invalid name format: Full name must contain letters and spaces only.";
            }
            // Verify that the email has got the correct format
            if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
                $errors['email_format_err'] = 'Wrong email format';
            }

            $arr_email_address = explode("@", $email_address);
            $spot_dom = end($arr_email_address);
            $spot_user = reset($arr_email_address);

            if (!in_array($spot_dom, $conf['valid_domains'])) {
                $errors['mailDomain_err'] = "Invalid email address domain. Use only: " . implode(", ", $conf['valid_domains']);
            }
            $exist_count = 0;

            // Verify Email Already Exists
            $spot_email_address_res = $conn->count_results(sprintf("SELECT email FROM users WHERE email = '%s' LIMIT 1", $email_address));
            if ($spot_email_address_res > $exist_count) {
                $errors['mailExists_err'] = "Email Already Exists";
            }
            // Verify Username Already Exists
            $spot_username_res = $conn->count_results(sprintf("SELECT username FROM users WHERE username = '%s' LIMIT 1", $username));
            if ($spot_username_res > $exist_count) {
                $errors['usernameExists_err'] = "Username Already Exists";
            }

            // Verify if username contain letters only
            if (!ctype_alpha($username)) {
                $errors['usernameLetters_err'] = "Invalid username format. Username must contain letters only without space";
            }
            // Verify password length
            if (strlen($password) < 4 || strlen($password) > 8) {
                $errors['password_err'] = "Password must be between 4 and 8 characters.";
            }

            // Verify that the password and confirm password match
            if ($password !== $confirm_password) {
                $errors['confirm_password_err'] = "Passwords do not match.";
            }
        }
    }
    public function login($conn, $ObjGlob) {
        if (isset($_POST["login"])) {
            $errors = array();

            $username = $conn->escape_values(strtolower($_POST["username"]));
            $password = $_POST["password"];
            if (count($errors)) {
                $ObjGlob->setMsg('msg', 'Error(s)', 'invalid');
                $ObjGlob->setMsg('errors', $errors, 'invalid');
            }
        }
    }
}

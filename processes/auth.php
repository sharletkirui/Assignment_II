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

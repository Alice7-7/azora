<?php

session_start();


function regenerateCSRFToken() {

    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $csrf_token = trim($_SESSION['csrf_token']);
    $postToken = trim($_POST['csrf_token']);

    $validToken = hash_equals($csrf_token, $postToken);

    if (!$validToken) {

        echo "Sorry. Invalid Request|";
        exit;

    } else {

        $f_name = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
        $s_name = filter_input(INPUT_POST, "sname", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $ph = filter_input(INPUT_POST, "ph", FILTER_SANITIZE_NUMBER_INT);
        $msg = filter_input(INPUT_POST, "msg", FILTER_SANITIZE_SPECIAL_CHARS);

        $ph = preg_replace('/[^+\-0-9]/', '', $ph);

        if (empty($f_name) || empty($s_name) || empty($email) || empty($ph) || empty($msg)) {

            echo "Please fill all the fields|";

        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            echo "Invalid email format|";

        } else if (!preg_match('/^[\+\-]?\d{1,15}$/', $ph)) {

            echo "Invalid phone number|";

        } else {

            $mail = require 'mail_config.php';

            if ($mail) {

                $mail->addReplyTo($email, $f_name . ' ' . $s_name . $ph);
                $mail->addAddress('zunzun06929@gmail.com'); 
                
                $mail->Body = $msg;

                try {

                    if ($mail->send()) {

                        regenerateCSRFToken();

                        echo "Message sent successfully|" . $_SESSION['csrf_token'];

                    }

                } catch (Exception $e) {

                    error_log("Error sending email: " . $e->getMessage());

                    echo "Something Wrong . Message couldn't be sent.";

                }
            }
        }
    }
}

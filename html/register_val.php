<?php

include 'db_conf.php';
session_start();

$fname = '';
$sname = '';
$username = '';
$email = '';
$password = '';
$check_pass = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
    $sname = filter_input(INPUT_POST, 'sname', FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $check_pass = filter_input(INPUT_POST, 'check_pass', FILTER_SANITIZE_SPECIAL_CHARS);

    $uname_pattern = '/^(?=.*[0-9])[a-zA-Z0-9]+$/';
    $pass_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/';

    if (empty($fname) || empty($sname) || empty($username) || empty($password) || empty($check_pass)) {

        $err = 'Please fill all the fields';

    } elseif (!$email) {

        $err = 'Invalid email format';

    } elseif (!preg_match($uname_pattern, $username)) {

        $err = 'Username must contain at least 1 number';

    } elseif (!preg_match($pass_pattern, $password)) {

        $err = 'Password must have at least 8 characters, 1 lowercase letter, 1 uppercase letter, and 1 special character';

    } elseif ($password !== $check_pass) {
        $err = 'Passwords must be the same';

    } else {
        
        // Checking username
        $u_stmt = $con->prepare("SELECT COUNT(*) FROM user WHERE username = ?");
        if (!$u_stmt) {
            die('Failed to prepare statement: ' . $con->error);
        }
        $u_stmt->bind_param("s", $username);
        $u_stmt->execute();
        $u_stmt->bind_result($count);
        $u_stmt->fetch();
        $u_stmt->close();

        if ($count > 0) {

            $err = 'Username is already taken.';

        } else {

            // Checking email
            $e_stmt = $con->prepare("SELECT COUNT(*) FROM user WHERE email = ?");

            if (!$e_stmt) {
                die('Failed to prepare statement: ' . $con->error);
            }

            $e_stmt->bind_param("s", $email);
            $e_stmt->execute();
            $e_stmt->bind_result($count2);
            $e_stmt->fetch();
            $e_stmt->close();

            if ($count2 > 0) {

                $err = 'Email is already registered.';

            } else {

                $sql = "INSERT INTO user (f_name, s_name, username, email, password) VALUES (?, ?, ?, ?, ?)";
                $stmt = $con->prepare($sql);

                if (!$stmt) {
                    die('Failed to prepare statement: ' . $con->error);
                }

                $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
                $stmt->bind_param('sssss', $fname, $sname, $username, $email, $hashed_pass);

                if (!$stmt->execute()) {
                    die('Failed to execute statement: ' . $stmt->error);
                }

                $stmt->close();

                $_SESSION['success_acc'] = 'success';

                header('Location: login.php');
                exit;
            }
        }
    }
}


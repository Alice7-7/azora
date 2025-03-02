<?php

session_start();

if (!isset($_SESSION['locked'])) {
    header('Location: login.php');
    exit;
}

$lock_duration = 600;

$time_remaining = $lock_duration - (time() - $_SESSION['locked']);


if ($time_remaining <= 0) {

    unset($_SESSION['login_attempts']);
    unset($_SESSION['locked']);

    header('Location: login.php');

    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Block</title>

    <link rel="stylesheet" href="../css/find.css">

    <script>
   
        let time_remain = <?php echo $time_remaining; ?> * 1000;


        setTimeout(function() {

            window.location.href = "login.php";

        }, time_remain);

    </script>

</head>
<body>

        <div class="acc_lock">
            <h1>Account Locked!</h1>
            <p>Your account is locked for <span>10</span> minutes.</p>
            <img src="../img/pf_pics/minion.gif" alt="minion">
        </div>
 
</body>
</html>

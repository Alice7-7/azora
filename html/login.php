<?php

    session_start();


    include 'db_conf.php';


    if(isset($_SESSION['success_acc'])){

        echo '

            <span class="success">Account created successfully .</span>

        ';
    }



    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        // Google reCaptcha v3 integration


        $login_url = 'https://www.google.com/recaptcha/api/siteverify';

        $login_secret = '';

        $login_response = $_POST['token_gen'];

        $remote_ip = $_SERVER['REMOTE_ADDR'];

        $req = file_get_contents($login_url.'?secret='.$login_secret.'&response='.$login_response);

        $result_l = json_decode($req);
     
        try {
        
            if (!isset($_SESSION['login_attempts'])) {

                $_SESSION['login_attempts'] = 0;
            }



            $uname_email = filter_input(INPUT_POST, 'uname_email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

            if (empty($uname_email) || empty($password)) {

                $err_att = 'Please fill all the fields';

            } else {

                
                if (isset($_SESSION['locked']) && (time() - $_SESSION['locked']) < 600) { 

                    header('Location: account_block.php');
                    exit;

                }

                $l_stmt = $conn->prepare("SELECT * FROM user WHERE username = ? OR email = ?");
                $l_stmt->bind_param('ss', $uname_email, $uname_email);
                $l_stmt->execute();

                $login_result = $l_stmt->get_result();
                $log_in = $login_result->fetch_assoc();
                $l_stmt->close();

                if (!$log_in) {

                    $err_att = 'User does not exist';

                } else if ($log_in && password_verify($password, $log_in['password'])) {

                    $_SESSION['user_id'] = $log_in['uid'];
                    $_SESSION['username'] = $log_in['username'];

                    unset($_SESSION['login_attempts']);
                    unset($_SESSION['locked']);

                    header('Location: index.php');
                    exit;

                } else {

                    $_SESSION['login_attempts'] += 1;

                    $err_att = 'Invalid login';

                }
            }

            if ( $_SESSION['login_attempts'] > 3 ) {

                $_SESSION['locked'] = time();

                header('Location: account_block.php');
                exit;

            }

        } catch (Exception $e) {

            error_log("Error: " . $e->getMessage(), 3, "error.txt");
            echo 'Please check your connection';

        } finally {

            $conn->close();
        }
    }

  
    
?>

<?php

if(isset($err_att)){

    echo '<span class="error">'.$err_att.'</span>';
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Social Media Campaign</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/ico" href="../img/favicon.ico">

        <!-- Flaticon icons -->
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" >

        <!-- link to css -->
        <link rel="stylesheet" href="../css/style.css">

        <link rel="stylesheet" href="../css/find.css">

        <!-- Google ReCaptcha v3 integration -->

        <script src="https://www.google.com/recaptcha/api.js?render=6Lfw6dopAAAAABNI8nD1_f5i5w6vtBeGN5NygL0O"></script>


        <!-- Google Fonts link -->
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&family=Poppins:wght@200&display=swap" rel="stylesheet"> 
        
        <script defer src="../javascript/suggest.js"></script>

    </head>
    <body>

   
    

        <!-- Login page -->

        <div class="login-b">

            <div class="login-side">
                <img src="../img/log+Register/login_pic.png" alt="Login-pic">
            </div>

            <div class="login-main">
                <div class="login-container">

                    <p class="login-t">Welcome Back</p>
                    <div class="login-separate"></div>

                    <p class="W-message">Please, provide login credential to proceed 
                        and have access to all our services
                    </p>

                    <form action="" class="login-form" method="post">
                        <div class="l-form-con">
                            <input type="text" placeholder="Username or Email" name="uname_email" >

                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <div class="l-form-con">

                            <input type="password" placeholder="Password" name="password" >
                            <i class="fas fa-lock"></i>    

                        </div>

                        <input type="hidden" name="token_gen" id="token_gen">

                        <button class="log-submit">Login</button>

                        <div class="signup-link">
                            Not a member ? <a href="reg.php">Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


       <?php

        include 'footer.php';

       ?>

       <!-- google recaptcha -->

        <script>
            
                grecaptcha.ready(function() {
                grecaptcha.execute('', {action: 'submit'}).then
                
                (function(token_gen) {
                    
                    let token_res =document.getElementById('token_gen');

                    token_res.value = token_gen;
                  
                });
                });
            
        </script>

     

    
    </body>
</html>
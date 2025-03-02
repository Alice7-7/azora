<?php

    include 'register_val.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Register</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/ico" href="../img/favicon.ico">

        <!-- Flaticon icons -->
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" >

        <!-- link to css -->
        <link rel="stylesheet" href="../css/style.css">

        <link rel="stylesheet" href="../css/find.css">


        <!-- Google Fonts link -->
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&family=Poppins:wght@200&display=swap" rel="stylesheet"> 
        
        <script defer src="../javascript/suggest.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body>


        <?php

        if(isset($err)){

            echo '
            
            <div class="error"> '. $err .' </div>
            
            ';
        }


        ?>


        <!-- Registration page -->

        <div class="login-b">

            <div class="login-side">
                <img src="../img/log+Register/register.png" alt="register-pic">
            </div>

            <div class="login-main">
                <div class="login-container">

                    <span class="reg_t">Registration</span>
                    <div class="login-separate"></div>
                    <p class="W-message">Please, provide credentials to proceed 
                        Registration process.
                    </p>

                    <form action="" class="login-form" method="post" name="reg_form" id="reg_form">

                        

                        <div class="l-form-con">
                            <input type="text" placeholder="Firstname" name="fname">
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="l-form-con">
                            <input type="text" placeholder="Surname" name="sname">
                            <i class="fas fa-user-plus"></i>
                        </div>

                        <div class="l-form-con">
                            <input type="text" placeholder="Username" name="username">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <span id="uname_error" ></span>
                        <span id="uname_success" ></span>


                        <div class="l-form-con">
                            <input type="text" placeholder="Email" name="email">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <span id="email_error" class=".error"></span>
                        <span id="email_success" class=".success"></span>


                        <div class="l-form-con">
                            <input type="password" placeholder="+6 characters" name="password" id="password-field">
                            <i class="fas fa-lock"></i>
                            <span class="pass_eye">
                                <i class="fa-regular fa-eye" id="password-eye"></i>
                                <i class="fa-regular fa-eye-slash" id="password-eye-slash" style="display: none;"></i>
                            </span>
                        </div>
                       

                        <!-- =========> Password strength indicator -->

                        <div class="pass_str_box">

                                <!-- Info ====> -->
                                <div class="tool_tip_box">
                                    <i class="fa-solid fa-circle-info"></i>
                                    <div class="tool_tip">
                                        <b><p>Password must be:</p></b>
                                        <p>Less than or equal to 16 characters</p>
                                        <p>At least 8 characters long </p>
                                        <p>At least 1 uppercase letter</p>
                                        <p>At least 1 lowercase letter</p>
                                        <p>At least 1 sepcial characters from !@#$%^&*</p>
                                    </div>
                                </div>
                        </div>
                        
                        <div class="l-form-con">
                            <input type="password" placeholder="Re-enter password" name="check_pass">
                            <i class="fas fa-lock"></i> 
                        </div>


                        <div class="log-2col">

                            <div class="one">
                              
                                   By creating an account you agree to our <a href="privacy_pol.php">Privacy policy </a>Terms & Conditions.
                              
                            </div>
                            
                        </div>

                        <button class="log-submit" type="submit" name="signup">Sign Up</button>

                        <div class="signup-link">
                            Already a member ? <a href="login.php">Log In</a>
                        </div>
                        <div class="signup-link">
                            Need Help ? <a href="contact.php">Contact Us</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

            <?php

                include 'footer.php';

            ?>

   
            <script>

                const pass_Field = document.getElementById('password-field');
                const pass_Eye = document.getElementById('password-eye');
                const pass_EyeSlash = document.getElementById('password-eye-slash');


                pass_Eye.addEventListener('click', () => {

                    pass_Field.type = 'text';
                    pass_Eye.style.display = 'none';
                    pass_EyeSlash.style.display = 'inline-block';

                });

                pass_EyeSlash.addEventListener('click', () => {

                    pass_Field.type = 'password';
                    pass_Eye.style.display = 'inline-block';
                    pass_EyeSlash.style.display = 'none';
                    
                });
            </script>
    
    </body>
</html>
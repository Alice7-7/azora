
<?php

    include 'usr_page_head.php';

    require 'db_conf.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_pass'])) {
    
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $check_pass = $_POST['check_pass'];

        $pass_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/';


        if(empty($old_pass) || empty($new_pass) || empty($check_pass)  ){

            $err = 'Please fill the inputs';
        }

        else 

        if (!preg_match($pass_pattern, $new_pass)) {

            $err = 'Password must have at least 8 characters, 1 lowercase letter, 1 uppercase letter, and 1 special character';

        }

        else

        if ($new_pass === $check_pass) {

            $pass_sql = "SELECT password FROM user WHERE uid = ?";

            $pass_stmt = $conn->prepare($pass_sql);

            $pass_stmt->bind_param("i", $_SESSION['user_id']);

            $pass_stmt->execute();
            $pass_stmt->bind_result($database_password);
            $pass_stmt->fetch();
            $pass_stmt->close();

    
          
            if (password_verify($old_pass, $database_password)) {
             
                $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);
    
                $new_sql = "UPDATE user SET password = ? WHERE uid = ?";

                $new_stmt = $conn->prepare($new_sql);

                $new_stmt->bind_param("si", $hashed_password, $_SESSION['user_id']);
    
                $new_stmt->execute();

                if ($new_stmt){

                    $Su = 'Password has been updated';
                }
    
    
                $new_stmt->close();

                mysqli_close($conn);

            } else {

                $err = "Incorrect old password.";

            }
        } else {

            $err = "Password does not match !";

        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>

          
        <?php   if(isset($err)){

            echo '

            <span class="error"> '. $err .'</span>

            ' ; 
            }

            ?>

            <?php   if(isset($Su)){

            echo '

            <span class="success"> '. $Su .'</span>

            ' ; 
            }

            ?>
    
         <!-- Changing Password -->

         <h1 class="usr_set_title" id="usr_set">Change your password</h1>
                

                <div class="usr_form account_del" >    
                    
                    <form action="" method="post" id="contact_form" class="del_form">

                    
                        <div>
                            <input type="password" class="form-con"  name="old_pass" placeholder="Old password">
                        </div>

                        
                        <div>
                            <input type="password" class="form-con"  name="new_pass" placeholder="New password">
                        </div>

                        
                        <div>
                            <input type="password" class="form-con"  name="check_pass" placeholder="Confirm your password">
                        </div>
                   

                        <button type="submit" class="btn usr_btn" name="post_pass">
                            <span>Change Password</span>
                            <i class="fa-solid fa-pen"></i>
                        </button>

                    </form>

                </div>


        <?php

            include 'footer.php';

        ?>
</body>
</html>
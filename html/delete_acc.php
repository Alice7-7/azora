<?php

ob_start();


    include 'usr_page_head.php';

    require 'db_conf.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['del_account'])) {
 
        if (isset($_SESSION['user_id'])) {

            $uid = $_SESSION['user_id'];

            $password = $_POST['password'];
    
            $sql = "SELECT password FROM user WHERE uid = ?";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param("i", $uid);
            $stmt->execute();
            $stmt->bind_result($database_password);

            $stmt->fetch();
            $stmt->close();

            if (empty($password)) {

                $err = 'please fill the password';
            }

            else
    
            if (password_verify($password, $database_password)) {

                $sql = "DELETE FROM user WHERE uid = ?";
    
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $uid);
    
                $stmt->execute();
    
                $stmt->close();

                mysqli_close($conn);
    
                session_destroy();
                
                header("Location: index.php");
                exit();

            } else {

                $err = "Incorrect password.";

            }
        }
    }

    ob_end_flush();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Delete</title>
</head>
<body>

        <?php   if(isset($err)){

            echo '
            
            <span class="error"> '. $err .'</span>
            
            ' ; 
        }

        ?>
            
        <!-- Account Delete -->

        <h1 class="usr_set_title" id="usr_set">Delete Your Account</h1>
                
                <h3 class="usr_set_t2">This action cannot be undone.</h3>



                <div class="usr_form account_del" >    
                    
                    <form action="" method="post" id="contact_form" class="del_form">

                    
                        <div>
                            <input type="password" class="form-con"  name="password" >
                        </div>
                   

                        <button type="submit" class="btn usr_btn" name="del_account">
                            <span>Delete</span>
                            <i class="fa-solid fa-trash"></i>
                        </button>

                    </form>

                </div>


        <?php

        include 'footer.php';

        ?>

</body>
</html>
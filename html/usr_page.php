<?php

    ob_start();
    
    include 'usr_page_head.php';

    require 'db_conf.php';
    
    $uid = $_SESSION['user_id'];
    
    if (isset($_SESSION['s_msg'])) {
        echo '
            <span id="success-message" class="success">Successfully Updated!</span>
            <script>
                function hideSuccessMessage() {
                    var message = document.getElementById("success-message");
                    if (message) {
                        setTimeout(function() {
                            message.style.display = "none";
                        }, 5000); 
                    }
                }
                window.onload = hideSuccessMessage;
            </script>
        ';
        unset($_SESSION['s_msg']);
    }
    
    $usr_stmt = $conn->prepare('SELECT * FROM user WHERE uid = ?');

    $usr_stmt->bind_param('i', $uid);
    $usr_stmt->execute();
    $u_result = $usr_stmt->get_result();
    
    if ($u_result && $u_result->num_rows > 0) {

        $u_row = $u_result->fetch_assoc();

    } else {

        $Err = 'Profile not found';

    }

    $usr_stmt->close();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
        $sname = filter_input(INPUT_POST, 'sname', FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_SPECIAL_CHARS);
    
        $up_success = true;

        $uname_pattern = '/^(?=.*[0-9])[a-zA-Z0-9]+$/';

        // Checking username
        if (!empty($username)) {

            if (!preg_match($uname_pattern, $username)) {

                $Err = 'Username must contain at least 1 number';
                $up_success = false;

            } else {

                $usr_stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE username = ? AND uid != ?");
        
                if (!$usr_stmt) {

                    echo "Error preparing username check statement: " . $conn->error;
                    $up_success = false;

                } else {

                    $usr_stmt->bind_param("si", $username, $uid);
                    $usr_stmt->execute();
                    $usr_stmt->bind_result($usr_count);
                    $usr_stmt->fetch();
                    $usr_stmt->close();
        
                    if ($usr_count > 0) {

                        $Err = "Username is already taken";
                        $up_success = false;

                    } else {

                        $stmt = $conn->prepare("UPDATE user SET username = ? WHERE uid = ?");
        
                        if (!$stmt) {

                            echo "Error preparing username update statement: " . $conn->error;
                            $up_success = false;

                        } else {

                            $stmt->bind_param('si', $username, $uid);
        
                            if (!$stmt->execute()) {

                                echo "Error updating username: " . $stmt->error;
                                $up_success = false;

                            } else {

                                $up_success = true;
                            }

                            $stmt->close();
                        }
                    }
                }
            }
        }
        
        
    
        // Validate email
        if (!empty($email)) {

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $Err = "Invalid email format.";
                $up_success = false;

            } else {

                $email_stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE email = ? AND uid != ?");

                $email_stmt->bind_param("si", $email, $uid);
                $email_stmt->execute();
                $email_stmt->bind_result($email_count);
                $email_stmt->fetch();
                $email_stmt->close();
    
                if ($email_count > 0) {

                    $Err = 'Email is already registered.';
                    $up_success = false;

                } else {

                    $em_stmt = $conn->prepare("UPDATE user SET email = ? WHERE uid = ?");

                    if ($em_stmt) {

                        $em_stmt->bind_param('si', $email, $uid);

                        if (!$em_stmt->execute()) {

                            echo "Error updating email: " . $em_stmt->error;
                            $up_success = false;

                        }
                        $em_stmt->close();

                    } else {

                        echo "Error preparing email statement: " . $conn->error;
                        $up_success = false;

                    }
                }
            }
        }
    
  
        if ($up_success) {

            $stmt = $conn->prepare("UPDATE user SET f_name = ?, s_name = ?, bio = ? WHERE uid = ?");

            if ($stmt) {

                $stmt->bind_param('sssi', $fname, $sname, $bio, $uid);

                if ($stmt->execute()) {

                    $_SESSION['s_msg'] = 'Successfully Updated!';

                    $stmt->close();
                    $conn->close();

                    header("Location: usr_page.php");
                    exit();

                } else {

                    echo "Error updating user details: " . $stmt->error;
                }

                $stmt->close();

            } else {
                echo "Error preparing user details statement: " . $conn->error;
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

    <title>User Profile Page</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../css/pf_page.css">

    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/history.css">


</head>
<body>

            <?php if (isset($Err)): ?>

                <div class="error"><?php echo $Err; ?></div>

            <?php endif; ?>

        
        <!-- User Page -->
        <main class="main-p">
            <section class="home section-lg">
                <div class="home-container usr_img_container container grid">
                    <div class="home-content">



                        <div class="pf_img">
                            <img src="../img/pf_pics/pf.jpg" alt="Home-Pic" class="home-img ">
                            <span class="home-sub"></span>
                    
                            <h1 class="home-t">

                            <br>

                            <span> 
                                <?php   echo $u_row['f_name']. ' ' . $u_row['s_name'] ;        ?>
                            </span>

                            <br>

                            @<?php  echo $u_row['username'] ;      ?>

                            </h1>
                            <p class="home-desc">
                                <?php  echo $u_row['bio']; ?>
                            </p>
                        </div>

                        <div>

                            <h1 class="usr_set_title" id="usr_set">User Profile Setting</h1>

                            <!-- User setting form -->

                            <div class="usr_form" >    
                                
                                <form action="" method="post" id="contact_form">

                                
                                    <div>
                                        <input type="text" class="form-con" placeholder="First Name" name="fname" value="<?php echo $u_row['f_name'] ?>">
                                        <input type="text" class="form-con" placeholder="Surname" name="sname" value="<?php echo $u_row['s_name'] ?>">
                                    </div>
                                    <div>
                                        <input type="text" class="form-con" placeholder="Username" name="username" value="<?php echo $u_row['username'] ?>">
                                        <input type="email" class="form-con" placeholder="E-mail" name="email" value="<?php echo $u_row['email'] ?>">
                                    </div>

                                    <div>
                                        <textarea class="form-con" placeholder="Bio" name="bio" ><?php echo $u_row['bio'] ?></textarea>
                                    </div>


                                    <button type="submit" class="btn usr_btn" name="msg_send">
                                        <span>Update</span>
                                        <i class="fa-solid fa-wrench"></i>
                                    </button>

                                </form>

                            </div>

                        </div>
                      
                    </div>
                    
                </div>

              
            </section>

                 
          
        </main>



        
    <?php


        include 'footer.php';

    ?>
</body>
</html>
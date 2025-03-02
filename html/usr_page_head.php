<?php

    session_start();

    if (!isset($_SESSION['user_id'])){

        header('Location: index.php');
    }

    require 'db_conf.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Favicon -->
     <link rel="shortcut icon" type="image/ico" href="../img/home/favicon.ico">

        <!-- link to css -->
        <link rel="stylesheet" href="../css/style.css">

        <link rel="stylesheet" href="../css/find.css">

        <link rel="stylesheet" href="../css/pf_page.css">


        <link rel="stylesheet" href="../css/history.css">

        <link rel="stylesheet" href="../css/pf_drop.css">


        <!-- Google Fonts link -->
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&family=Poppins:wght@200&display=swap" rel="stylesheet"> 
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" >


        <script defer src="../Javascript/main.js"></script>

        <script defer src="../Javascript/pf.js"></script>

</head>
<body>
      <!-- ===> Search Function Sector ... -->


            <!-- Header -->
            <header class="header">

                <nav class="nav container">
                    <a href="index.php" class="nav-logo">
                        <img src="../img/home/z_logo.png" alt="Logo" class="nav-logo-img">
                    </a>
                    <div class="nav-menu" id="nav-menu2">
                        <div class="navmenu-top">
                            <a href="index.php" class="navmenu-logo">
                                <img src="../img/home/z_logo.png" alt="Logo">
                            </a>

                            <div class="nav-close" id="nav-close">
                                <i class="fi fi-rr-cross-small"></i>
                            </div>
                        </div>

                        <ul class="nav-list">

                            <li class="nav-item">
                             
                            </li>
                            <li class="nav-item">
                                
                            </li>
                            <li class="nav-item">
                               <a href="usr_page.php" class="nav-link" >User Profile</a>
                            </li>

                            <li class="nav-item">
                               <a href="usr_history.php" class="nav-link" >User History</a>
                            </li>

                            <li class="nav-item">
                                <a href="convert_pass.php" class="nav-link">Change Password</a>
                            </li>
                            <li class="nav-item">
                                <a href="delete_acc.php" class="nav-link">Account Delete</a>
                            </li>

                        </ul> 

                       
                    </div>
                    
                      <!-- Profile pic -->

                      <?php

                            if (isset($_SESSION['user_id'])) {

                                $u_id = $_SESSION['user_id'];

                                $s_sql = "SELECT username,bio FROM user WHERE uid = ?";
                                
                                $s_stmt = mysqli_prepare($conn, $s_sql);

                                if ($s_stmt) {

                                    mysqli_stmt_bind_param($s_stmt, "i", $u_id);
                                    mysqli_stmt_execute($s_stmt);

                                    $res = mysqli_stmt_get_result($s_stmt);

                                    if ($res && mysqli_num_rows($res) > 0) {

                                        $zuzu = mysqli_fetch_assoc($res);

                                        $username = $zuzu['username']; 

                                    } else {
                                        echo "No user found with the given ID.";
                                    }

                                    mysqli_stmt_close($s_stmt);

                                } else {
                                    echo "Error preparing the statement: " . mysqli_error($conn);
                                }
                            } 

                            ?>
                        
                    <?php

                    if (isset($_SESSION['user_id'])) { ?>


                    <div class="profile_drop_down">

                        <div class="profile_img">
                            <img src="../img/pf_pics/pf.jpg" alt="pf1" class="pf_pic">
                        </div>

                        <div class="pf_action">
                        <div class="pf_info">
                            <h3><?php echo isset($zuzu['username']) ? $zuzu['username'] : 'Username not available'; ?></h3>
                            <span><?php echo isset($zuzu['bio']) ? $zuzu['bio'] : ' ... '; ?></span>
                        </div>

                            <ul>
                                <li>
                                    <a href="usr_page.php">
                                        <img src="../img/home/pf.png" alt="profile" class="h_i">
                                        <span>My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="convert_pass.php">
                                        <img src="../img/home/ed.png" alt="edit" class="h_i">
                                        <span>Edit Secret</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="usr_history.php">
                                        <img src="../img/home/h.png" alt="history" class="h_i">
                                        <span>History</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="sign_out.php">
                                        <img src="../img/home/lo.png" alt="logout" class="h_i">
                                        <span>Sign Out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>


                        </div>

                        <?php } else { ?>

                            <a href="login.php" class="h-act-btn">
                                Login
                            </a>

                        <?php } ?>


                        <div class="h-act-btn nav-toggle" id="nav-toggle">
                            <img src="../img/home/menu-icon.svg" alt="menu-icon">
                        </div>

                    </div>


                                </nav>

                            </header>

                    <script src="../Javascript/pf.js"></script>

                </nav>

            </header>
                 
</body>
</html>
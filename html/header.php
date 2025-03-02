<?php

    session_start();

    include 'db_conf.php';

    function activeLink($path) {
        $url = $_SERVER['REQUEST_URI'];
        $arr = explode('/', strval($url));
        $currentpath = end($arr);
        $act_link = $path == $currentpath ? " act-link" : "";
        return $act_link;
    }

    function legal() {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
    
    function s_insert($conn, $search_uname, $query) {

        $stmt = $conn->prepare("INSERT INTO find (username, query, date) VALUES (?, ?, NOW())");
    
        if (!$stmt) {
            die('Error preparing statement: ' . $conn->error);
        }
    
        $stmt->bind_param("ss", $search_uname, $query);
    
        if (!$stmt->execute()) {
            die('Error executing statement: ' . $conn->error);
        }
    
        $stmt->close();
    }

    if (isset($_POST['q'])) {

        $query = $_POST['q'];
        $search_uname = $_POST['search_uname'] ?? '';
    
        $a_q_one = [
            'How to stay safe online',
            'How can I secure my device',
            'How can I protect from phishing',
            'Phishing',
            'Two Factor',
            'Update',
            'How to update software',
            'Personal Information',
            'How to secure email',
            'Tracking',
            'Privacy setting',
            'What is phishing',
            'Complex password',
            'Security tips',
            'Whatsapp',
            'YouTube',
            'LinkedIn',
            'Pinterest'
        ];
    
        $a_q_two = [
            'aims & visions',
            'how to protect from cyberbullying',
            'Digital Guardians',
            'Think before You Post',
            'Goal to give teenagers',
            'Online kindness',
            'Our Goal',
            'How we fight online harassment',
            'what is digital realm'
        ];

        $a_q_3 = [
        
            'what is the most import of social media use',
            'Tell me about most secure social media app' ,
            'What is botnet attack ?',
            'Online database search',
            'Deep depth of social media apps'
        ];

        $a_q_4 = [
        
                
            'How parents can help their children about social media',
            'parental control tips',
            'Commnuication and Euducation',
            'Setting boundaries and monitoring',
            'seeking support',
            'What is parental control',
            'How parents can take care '

        ];

        $a_q_5 = [

            'live streaming',
            'Enusre to safe live streaming',
            'Comments & Reactions',
            'Our aim for live streaming safety',
            'Facebook live',
            'Broadcasting',
            'Live streaming tips',
            'How can I stay safe when live streaming',
            'How to resist toxic beheavior',
            'Live streaming privacy setting',
            'Secure atmosphere in live streaming',
        

        ];

        $a_q_6 = [

            'Legislation',
            'Legal',
            'How to comply laws of social media',
            'Laws: important to know about',
            'guidance for legislation',
            'GDPR, EU regulation',
            'Best Practise Guidance',
            'Critical thinking to prevnet false infos',
            'Digital well beings'
        ];

        $a_q_7 = [

            'Our Team Members',
            'Developers',
            'Team'

        ];

        $a_q_8 = [

            'Our Location',
            'About Us'

        ];


    
        if (in_array($query, $a_q_one)) {

            if (legal()) {
                s_insert($conn, $search_uname, $query);
            }
            header('Location: index.php#stay_safe');
            exit;
        }
    
        else if (in_array($query, $a_q_two)) {

            if (legal()) {

                s_insert($conn, $search_uname, $query);

            }

            header('Location: info.php');
            exit;
        }

        else if (in_array($query, $a_q_3)) {

            if (legal()) {

                s_insert($conn, $search_uname, $query);

            }

            header('Location: popular.php');
            exit;
        }

        else if (in_array($query, $a_q_4)) {

            if (legal()) {

                s_insert($conn, $search_uname, $query);

            }

            header('Location: parents.php');
            exit;
        }

        else if (in_array($query, $a_q_5)) {

            if (legal()) {

                s_insert($conn, $search_uname, $query);

            }

            header('Location: live_streaming.php');
            exit;
        }

        else if (in_array($query, $a_q_6)) {

            if (legal()) {

                s_insert($conn, $search_uname, $query);

            }

            header('Location: legislation.php');
            exit;
        }

        else if (in_array($query, $a_q_7)) {

            if (legal()) {

                s_insert($conn, $search_uname, $query);

            }

            header('Location: contact.php#our_team');
            exit;
        }

        else if (in_array($query, $a_q_8)) {

            if (legal()) {

                s_insert($conn, $search_uname, $query);

            }

            header('Location: contact.php#about_us');
            exit;
        }

        else {

            $err_ques = '

            <span class= "err_ques">
            
            Sorry . No result found !

            </span>
            
            ';

            
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Favicon -->
     <link rel="shortcut icon" type="image/ico" href="../img/home/favicon.ico">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Flaticon icons -->
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

        <!-- link to css -->
        <link rel="stylesheet" href="../css/style.css">

        <link rel="stylesheet" href="../css/find.css">

        <link rel="stylesheet" href="../css/pf_drop.css">


        <!-- Google Fonts link -->
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&family=Poppins:wght@200&display=swap" rel="stylesheet"> 
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" >
        <script defer src="../javascript/suggest.js"></script>

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
                        <a href="index.php" class="nav-link<?php echo activeLink('index.php'); ?>">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a href="info.php" class="nav-link<?php echo activeLink('info.php'); ?>">Info</a>
                    </li>
                    <li class="nav-item mega_menu">
                        <a href="#" class="nav-link">More
                            <span class="dropdown_icon">
                                <i class="fa-solid fa-caret-down"></i>
                            </span>
                        </a>
                        <ul class="mega_menu_content">
                            <li><a href="popular.php" class="<?php echo activeLink('popular.php'); ?>">Most Popular Apps</a></li>
                            <li><a href="parents.php" class="<?php echo activeLink('parents.php'); ?>">How Parents Can Help</a></li>
                            <li><a href="live_streaming.php" class="<?php echo activeLink('live_streaming.php'); ?>">Live Streaming</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link<?php echo activeLink('contact.php'); ?>">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="legislation.php" class="nav-link<?php echo activeLink('legislation.php'); ?>">Legislation</a>
                    </li>
                </ul>

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

                        <div class="headerfind">

                            <form action="" method="post" autocomplete="off" name="submit" id="tag_form">

                                <input type="hidden" name="search_uname" value="<?php echo isset($zuzu['username']) ? $zuzu['username'] : ''; ?>">

                                <input type="search" placeholder="Search...." class="f-input" id="sort_input" name="q" maxlength="25" autocomplete="off">

                                <div class="s_tags"></div>

                                <ul class="s_list">
                                        <li><?php echo isset($err_ques) ? $err_ques : ''; ?></li>
                                </ul>

                                <button class="find-btn">
                                    <img src="../img/home/s_icon.gif" alt="search icon">
                                </button>

                            </form>

                        </div>
                        
                    </div>
                    
                    <div class="h-user-act">

        <!-- Profile pic -->
                        
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

                 
</body>
</html>
<?php

ob_start();

    include 'usr_page_head.php';

    require 'db_conf.php';

    function deleted() {

        include 'db_conf.php';

        $username = $_SESSION['username'];

        $del_stmt = $conn->prepare("DELETE FROM find WHERE username = ?");

        $del_stmt ->bind_param("s", $username);

        $del_stmt ->execute();

        $del_stmt ->close();

        header("Location: usr_page.php");

        exit();

        }


    if (isset($_POST['deleted'])) {
                                            
        deleted();
    }

    ob_end_flush();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User History</title>
</head>
<body>
    


<!-- User activity -->

      <div class="user_history" id="usr_hi">
       
       <div class="usr_h_title">

           <h1>User History</h1>
           <p>Search Activity</p>

       </div>

   
        <form action="" method="post">
            <button class="history btn" type="submit" name="deleted">
                Delete
                <i class="fa-solid fa-trash"></i>
            </button>  
        </form>
                     



       <div class="history_timeline">

                <?php

                    $username = $_SESSION['username'];


                    $find_fetch = "SELECT * 
                                FROM find 
                                WHERE username = ? ";

                    $f_stmt = $conn->prepare($find_fetch);

                    $f_stmt->bind_param("s", $username);

                    $f_stmt->execute();

                    $f_result = $f_stmt->get_result();

                    if ($f_result->num_rows > 0) {

                        while ($f_row = $f_result->fetch_assoc()) {

                            echo '
                                <div class="history_checkpoint">
                                    <div>
                                        <h2>'.$f_row['username'].'</h2>
                                        <p>
                                            '.$f_row['query'].'
                                        </p>
                                    </div>
                                </div>                         
                            ';
                        }

                    } else {

                        echo '

                            <div>
                                <p>NO HISTORY FOUND !</p>
                            </div>

                        
                        ';
                    }

                    $f_stmt->close();
                    // $conn->close();

                    if (isset($_POST['deleted'])) {

                        $all_del_stmt = $conn->prepare("DELETE FROM find WHERE username = ?");
                            
                        $all_del_stmt ->bind_param("s", $username);
                        
                        $all_del_stmt ->execute();
                        
                        $all_del_stmt ->close();

                    }

                ?>
        </div>

        <?php

        include 'footer.php';

        ?>
</body>
</html>
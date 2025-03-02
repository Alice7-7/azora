<?php

    ob_start(); 

    include 'header.php';

    if (isset($_GET['q'])) {


        if(empty( $_GET['q'])) {

            echo '
            
            <span class="pop_err">
                please fill the input
            </span>
            
            ';

        } else 

        {

            $pop_query = $_GET['q'];

            $api_url = 'https://api.duckduckgo.com/?q=' . urlencode($pop_query) . '&format=json&no_html=1';
                    
            $pop_response = file_get_contents($api_url);   
         
            if ($pop_response !== false) {
                
            $pop_results = json_decode($pop_response, true);
            
                
            if (isset($pop_results['Abstract'])) {
                    
                    $search_url = 'https://duckduckgo.com/?q=' . urlencode($pop_query);
        
                        header('Location: ' . $search_url);
                        exit();
        
                    } else {
                        echo 'No results found.';
                    }
                } else {
                    
                    echo 'Error API.';
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
    <title>Most Popular</title>

    <link rel="stylesheet" href="../css/popular.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>



    <div class="pop_container">
        <h1 class="online_title">Online Database Search</h1>
        <form action="" class="search_box" method="get">

            <input type="text" placeholder="Search anything" name="q" autocomplete="off">
            
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>

    <?php

    include 'footer.php';


    ?>

</body>
</html>

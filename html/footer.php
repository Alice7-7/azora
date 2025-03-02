<?php

function underline($path) {

    $url = $_SERVER['REQUEST_URI'];

    $arr = explode('/', strval($url));
    $currentpath = end($arr);

    $act_link = $path == $currentpath ? " underline" : "";

    return $act_link;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <!-- Footer section -->
    <footer class="footer container">
        <div class="footer-container grid">
            <div class="footer-content">
                <a href="index.php">
                    <img src="../img/home/z_logo.png" alt="logo" class="footer-logo-img">
                </a>
                <h4 class="footer-sub">Contact</h4>
                <p class="footer-desc">
                    <span>Address:</span> 420 Pyay Road, Street 6, Yangon
                </p>
                <p class="footer-desc">
                    <span>Phone:</span> +95 97969 59798
                </p>
                <div class="footer-social">
                    <h4 class="footer-sub">Follow Us</h4>
                    <div class="footer-social-ls flex">
                        <a href="https://www.Facebook.com">
                            <img src="../img/home/i-fb.svg" alt="Facebook" class="footer-social-icon">
                        </a>
                        <a href="https://www.twitter.com">
                            <img src="../img/home/i-t.svg" alt="twitter" class="footer-social-icon">
                        </a>
                        <a href="https://www.instagram.com">
                            <img src="../img/home/i-i.svg" alt="Instagram" class="footer-social-icon">
                        </a>
                        <a href="https://www.YouTube.com">
                            <img src="../img/home/i-youtube.svg" alt="youtube" class="footer-social-icon">
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer-content">
                <h3 class="footer-t">Links</h3>
                <ul class="footer-ls">
                    <li><a href="index.php" class="footer-l<?php echo underline('index.php'); ?>">Home</a></li>
                    <li><a href="info.php" class="footer-l<?php echo underline('info.php'); ?>">Info</a></li>
                    <li><a href="popular.php" class="footer-l<?php echo underline('popular.php'); ?>">Most popular</a></li>
                    <li><a href="parents.php" class="footer-l<?php echo underline('parents.php'); ?>">How Parents can help</a></li>
                    <li><a href="live_streaming.php" class="footer-l<?php echo underline('live_streaming.php'); ?>">Live streaming</a></li>
                </ul>
            </div>

            <div class="footer-content">
                <h3 class="footer-t">Links</h3>
                <ul class="footer-ls">
                    <li><a href="legislation.php" class="footer-l<?php echo underline('legislation.php'); ?>">Legislation & Guidance</a></li>
                    <li><a href="contact.php" class="footer-l<?php echo underline('contact.php'); ?>">Contact Us</a></li>
                    <li><a href="privacy_pol.php" class="footer-l<?php echo underline('privacy_pol.php'); ?>">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="footer-content">
                <h3 class="footer-t">Account</h3>
                <ul class="footer-ls">
                    <li><a href="login.php" class="footer-l<?php echo underline('login.php'); ?>">Sign In</a></li>
                    <li><a href="#" class="footer-l">Help</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-b">
            <p class="copyright">&copy; 2024 Azora. Powered by SMC. All rights reserved</p>
        </div>
    </footer>

    <!-- link to js -->
    <script src="../Javascript/main.js"></script>
    
</body>
</html>

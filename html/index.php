<?php

    include 'header.php';

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Social Media Campaign</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/ico" href="../img/home/favicon.ico">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <!-- Flaticon icons -->
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

        <!-- link to css -->
        <link rel="stylesheet" href="../css/style.css">

        <link rel="stylesheet" href="../css/find.css">

        <!-- Google Fonts link -->
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&family=Poppins:wght@200&display=swap" rel="stylesheet"> 

        <script defer src="../javascript/suggest.js"></script>


    </head>
    <body>
                   
 

    
        <!-- Main -->
        <main class="main-p">
            <section class="home section-lg">
                <div class="home-container container grid">
                    <div class="home-content">
                        <span class="home-sub">Prefer Security</span>
                        <h1 class="home-t">
                            Social Media <span>Topic Matters !</span>
                        </h1>
                        <p class="home-desc">
                            Register for montly news letter.
                        </p>
                        <a href="reg.php" class="home-btn">Register Now</a>
                    </div>
                    <img src="../img/home/main_pic.png" alt="Home-Pic" class="home-img">
                </div>
            </section>
        </main>

        <!-- Introduction -->

        <div id="stay_safe"></div>

        <div class="home_intro">
            <div class="h_intro_head">
                <h1>How to stay safe online</h1>
                <p>Here are the tips</p>
            </div>

            <div class="h_box_container">

                <div class="h_box">
                    <div class="h_bar"></div>
                    <img src="../img/home/i1.png" alt="i1">
                    <h1>Use Strong and Unique Password</h1>
                    
                        <ul>
                            <li> Mix uppercase, lowercase, numbers, and symbols when creating passwords.</li>	
                            <li> Don't use information that can be guessed, such as your name, birthdate, or everyday words.</li>	
                            <li> Make sure your passwords are included at least 12 characters to boost their security and complexity.</li>	
                            <li> Think about using passphrases like "PurpleElephant$Jumping456!" that are simpler to remember and more difficult to figure out.</li>	
                        </ul>
                    

                </div>

                <div class="h_box">
                    <div class="h_bar"></div>
                    <img src="../img/home/2FA.png" alt="2fa">
                    <h1>Enable two factor authentication(2FA)</h1>
                    <ul>
                        <li> Choose app-based authentication techniques over SMS-based codes, such as Authy or Google Authenticator.</li>
                        <li> In the unlikely event that you are unable to access your primary authentication method, keep backup codes safely stored away.</li>
                        <li> When available, use biometric authentication (such as fingerprint or facial recognition) to increase security.</li>
                        <li> Examine and remove access for any devices or apps that are linked to your accounts on a regular basis.</li>
                    </ul>

                </div>

                <div class="h_box">
                    <div class="h_bar"></div>
                    <img src="../img/home/update.png" alt="update">
                    <h1>Keep your software Update</h1>
                   <ul>
                
                        <li> 
                            Whenever possible, turn on automatic updates for your software and operating system.     
                        </li>
                        <li>
                            If software updates are not available, make sure to manually check for updates on a regular basis.
                        </li>
                        <li>
                            To stay on top of updates for all of your devices, think about utilizing software update tools or services.

                        </li>
                        <li> 
                            To lessen the potential attack surface, remove any unnecessary or outdated software.
                                
                        </li>
                   </ul>

                </div>

                <!-- second line of tips -->


            </div>
            <div class="h_box_container">

                <div class="h_box">
                    <div class="h_bar"></div>
                    <img src="../img/home/Phish.gif" alt="phishing">
                    <h1>Be Cautious with Links and Attachment</h1>
                    
                        <ul>
                            <li>Make sure links point to reputable websites by hovering over them to see the URL before clicking.
                            </li>	
                            <li>Before opening any attachments, make sure you have the sender's email address verified, especially if the email seems fishy.
                            </li>	
                            <li>When in doubt, get in touch with the sender via an alternative, reliable communication channel to make sure the message is genuine.
                            </li>	
                            <li>Install email filters or browser extensions to help detect and stop malicious attachments or links.
                            </li>	
                        </ul>

                    

                </div>

                <div class="h_box">
                    <div class="h_bar"></div>
                    <img src="../img/home/secure.gif" alt="secure">
                    <h1>Secure Your Devices</h1>
                    <ul>
                        <li>Update your antivirus program frequently, and use scans to find and eliminate malware.
                        </li>
                        <li>To add an additional degree of security, use a firewall to monitor and manage all incoming and outgoing network traffic.
                        </li>
                        <li>Securely store confidential information on your devices, including passwords, bank account information, and private documents.
                        </li>
                        <li>For laptops and smartphones, turn on remote wiping and device tracking to safeguard your data in the event that the device is stolen or lost.
                        </li>
                    </ul>



                </div>

                <div class="h_box">
                    <div class="h_bar"></div>
                    <img src="../img/home/personal.gif" alt="personal">
                    <h1>Be Mindful of personal information</h1>
                   <ul>
                
                        <li> 
                        Examine and modify the privacy settings on your social media accounts to restrict who can view your posts, contact information, and personal information. 
                        </li>
                        <li>
                        Refrain from divulging any unnecessary personal information on the internet, such as your entire name, address, phone number, and bank account information.
                        </li>
                        <li>
                        Use caution when completing online surveys and forms, and only give reliable websites the information they require.
                        </li>
                        <li> 
                        Examine the privacy policies of the websites and applications.                          
                        </li>
                   </ul>


                </div>

                <!-- second line of tips -->


            </div>
        </div>


        <!-- Home Blog -->

        <section id="home_blog">

            <!-- heading -->

            <div class="blog_heading">
                <span>Our Recent Posts</span>
                <h3></h3>
            </div>

            <div class="blog_container">

                <!-- 1 -->

                <div class="blog_box">

                    <div class="blog_img">
                        <img src="../img/post/wap.jpg" alt="whatsapp">
                    </div>

                    <!-- text -->
                    <div class="blog_text">
                        <span>7 May 2024 / Web design</span>
                        <a href="#" class="blog_t">Privacy oriented Whatsapp.</a>
                        <p>
                        WhatsApp is a messaging app that lets users make voice and video calls in addition to sending text, voice, image, and video messages. It is renowned for providing end-to-end encryption, which protects user privacy and security during conversations. WhatsApp is a popular app for group and individual communication, both locally and globally.
                        </p>
                        <a href="#">Read More</a>
                    </div>

                </div>


                <div class="blog_box">

                    <div class="blog_img">
                        <img src="../img/post/yt.jpg" alt="YouTube">
                    </div>

                    <!-- text -->
                    <div class="blog_text">
                        <span>5 May 2024 / Web design</span>
                        <a href="#" class="blog_t">YouTube</a>
                        <p>
                        Users can upload, view, and share videos on a variety of topics on the YouTube platform. You can find and interact with a wide variety of content on YouTube, ranging from games and music to vlogs and tutorials. In addition, it serves as a platform for content producers to grow their fan bases and earn money from memberships and advertisements.
                        </p>
                        <a href="#">Read More</a>
                    </div>

                    
                </div>

                <div class="blog_box">

                    <div class="blog_img">
                        <img src="../img/post/Li.jpg" alt="LinkedIn">
                    </div>

                    <!-- text -->
                    <div class="blog_text">
                        <span>27 April 2024 / Web design</span>
                        <a href="#" class="blog_t">LinkedIn</a>
                        <p>
                        LinkedIn is an industry-specific networking site for interaction in business, job searching, and career development. Users are able to interact with coworkers, staffing agencies, and industry specialists by creating profiles that showcase their education, experience, and skills. LinkedIn offers job opportunities, industry news, and professional development educational resources.
                        </p>
                        <a href="#">Read More</a>
                    </div>

                </div>

                <div class="blog_box">

                    <div class="blog_img">
                        <img src="../img/post/pin.jpg" alt="pinterest">
                    </div>

                    <!-- text -->
                    <div class="blog_text">
                        <span>29 April 2024 / Web design</span>
                        <a href="#" class="blog_t">Pinterest</a>
                        <p>
                        Users of Pinterest can discover and save ideas for a variety of hobbies and projects on this visual discovery platform. To arrange their pins which can be pictures, videos, and articles from around the internet where users can make boards. Pinterest is a well-liked source of inspiration for things like fashion, recipes, travel, and interior design.
                        </p>
                        <a href="#">Read More</a>
                    </div>

                </div>

                <div class="blog_box">

                    <div class="blog_img">
                        <img src="../img/post/tt.jpg" alt="TikTok">
                    </div>

                    <!-- text -->
                    <div class="blog_text">
                        <span>3 May 2024 / Web design</span>
                        <a href="#" class="blog_t">TikTok</a>
                        <p>
                        With its focus on innovation and entertainment and its short-form video format, TikTok has been taking the social media world by storm. Videos of everything from lip-syncing and dancing to comedic sketches and tutorials can be made and shared by users. Users can easily find content that suits their interests due to the platform's algorithmic feed, which creates challenges and viral trends.
                        </p>
                        <a href="#">Read More</a>
                    </div>

                </div>

                <div class="blog_box">

                    <div class="blog_img">
                        <img src="../img/post/insta.jpg" alt="Instagram">
                    </div>

                    <!-- text -->
                    <div class="blog_text">
                        <span>4 May 2024 / Web design</span>
                        <a href="#" class="blog_t">Instagram</a>
                        <p>
                        Instagram is a visually attractive social networking site where users can post videos and images for their followers to see. Through the Explore page, users can also follow the celebrities they admire, connect with friends, and find new trends. Instagram is particularly well-liked by younger demographics and is renowned for its vibrant community.
                        </p>
                        <a href="#">Read More</a>
                    </div>

                </div>


            </div>

        </section>


        <?php

            include 'footer.php';

        ?>

        
        <!-- link to js -->
        <script src="../Javascript/main.js"></script>

    </body>
</html>
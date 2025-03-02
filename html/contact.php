

<?php

    include 'header.php';


    if(!isset($_SESSION['csrf_token'])){

    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

    }

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Social media campaign</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/ico" href="../img/favicon.ico">

        <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


        <!-- Flaticon & fontawesome icons -->
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" >

        <!-- link to css -->
        <link rel="stylesheet" href="../css/style.css">

        <link rel="stylesheet" href="../css/find.css">

        <link rel="stylesheet" href="../css/contact.css">

        <link rel="stylesheet" href="../css/team.css">


        <!-- Google Fonts link -->
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&family=Poppins:wght@200&display=swap" rel="stylesheet"> 

        <script defer src="../javascript/suggest.js"></script>


        
    </head>
    <body>

        <!-- Contact Us -->
        <div class="contact-sect">
            <div class="contact-bg">
                <h3>Get in Touch with Us</h3>
                <h2>Contact Us</h2>
                <div class="contact-line">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <p class="contact-text">
                    Have questions about our social media campaign or want to collaborate? We're here to listen! Reach out to us for inquiries,
                     feedback, or partnership opportunities. Together, let's make a positive impact in the digital world.
                     Contact us today and let's start the conversation!
                </p>
            </div>

            <div class="contact-b">
                <div class="contact-inf">
                    <div>
                        <span ><i class="fi fi-rr-mobile-notch"></i></span>
                        <span>Phone No.</span>
                        <span class="contact-text">+95 97969 59798</span>
                    </div>
                    <div>
                        <span ><i class="fi fi-rr-envelope-open"></i></span>
                        <span>Email</span>
                        <span class="contact-text">zunzun06929@gmail.com</span>
                    </div>
                    <div>
                        <span ><i class="fi fi-rr-map-marker"></i></span>
                        <span>Address</span>
                        <span class="contact-text">420 Pyay Road, Street 6, Yangon</span>
                    </div>
                    <div>
                        <span><i class="fi fi-rr-alarm-clock"></i></span>
                        <span>Opening Hours</span>
                        <span class="contact-text">Monday - Sat (9:00AM to 5:00 PM)</span>
                    </div>
                </div>

                <!-- ====> Contact Form <========= -->

                
                
                <div class="contact-form">    
                    
                                                 
                    <form action="" method="post" id="contact_form">

                    <div id="error_msg" class="err_msg">
                        
                    </div>

                    <div id="success_msg" class="success_msg">  
                    </div>

                    <div id="loading" >
                        <p>Please wait ...</p>
                        <img src="../img/contact/ho3.gif" alt="lol">
                    </div>

                        <!-- CSRF Token -->

                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" 
                        
                        id="csrf_token"> 
                        

                        <div>
                            <input type="text" class="form-con" placeholder="First Name" name="fname">
                            <input type="text" class="form-con" placeholder="Surname" name="sname">
                        </div>
                        <div>
                            <input type="email" class="form-con" placeholder="E-mail" name="email">
                            <input type="text" class="form-con" placeholder="Phone" name="ph" id="ph_no">
                        </div>

                        <textarea class="form-con" placeholder="Enter your message" name="msg"></textarea>

                        <p>By continuing , you are agree to our <span><a href="privacy_pol.php">privacy & policy</a></span></p>

                        <button type="submit" class="btn" name="msg_send">
                            <span>Send</span>
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>

                    </form>

                    <div>
                        <img src="../img/contact/contact_us.png" alt="Contact-1">
                    </div>
                </div>
            </div>

         
        
        

               <!-- About Us -->
               <div id="about_us"></div>

               <section class="a_about">
                <div class="a_main">
                    <img src="../img/contact/about_us.jpg" alt="about_us">
                    <div class="a_about_txt">
                        <h4>About Us</h4>
                        <h1>Social Media Awareness</h1>
                        <p>
                            Welcome to our social media campaign website, the central location for creative and effective online advertising. At Azora 2024 powered by SMC col.td, we're committed to using social media to amplify voices and promote significant change.
                            Our vibrant group of strategists, campaigners, and creators works together to develop captivating stories that inspire people to take up meaningful causes in their communities. Our dedication lies in achieving meaningful outcomes, be it increasing consciousness, promoting involvement, or initiating dialogues. Come along on this journey with us as we use social media's influence and reach to change the world.
                        </p>

                        <div class="about_btn">
                            <a href="contact.php#our_team"><button type="button">Our Team</button></a>
                            <button type="button" class="a_btn2">Learn More</button>
                        </div>
                    </div>
                </div>
            </section>

                <!-- Google map -->

            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d122212.2188655988!2d96.16424959999999!3d16.8198144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smm!4v1691527784016!5m2!1sen!2smm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </section>

        <!-- =======> Our Team <+++++++++++ -->
        <div id="our_team"></div>

        <div class="our_team" >

            <div class="team_section">
                <div class="team_container">

                    <div class="team_row">
                        <div class="team_title">
                            <h1>Our Team</h1>
                            <p></p>
                        </div>
                    </div>

                    <!-- member 1 -->
                    <div class="team_card">


                        <div class="t_card">
                            <div class="t_img_section">
                                <img src="../img/team/pf.jpg" alt="">
                            </div>
                            <div class="team_content">
                                <h3>Jenny Kai</h3>
                                <h4>Project Manager</h4>
                                <p>
                                dedicated Project Manager leading the charge within our dynamic developer team. With a keen eye for detail and a knack for effective coordination, Mark ensures that our projects are executed seamlessly from start to finish. 
                                Serving as the linchpin between our development team and stakeholders, Mark oversees task delegation, sets timelines,
                                 and ensures that our projects align with our clients' goals and objectives.
                                </p>
                            </div>
                        </div>

                        <div class="t_card">
                            <div class="t_img_section">
                                <img src="../img/team/s.jpg" alt="">
                            </div>
                            <div class="team_content">
                                <h3>Stephan Sitty</h3>
                                <h4>Backend Developer</h4>
                                <p>
                                    our gifted backend developer who is essential to the success of our online projects.
                                    Stephan is the architect that works behind the scenes to create the reliable server-side logic and database systems that run our websites. He has a strong interest in problem-solving and is proficient in programming languages such as Python and Node.js. Noah makes sure that our websites run smoothly and securely, optimizing performance and scalability at every turn, from data management to user authentication.
                                </p>
                            </div>
                        </div>

                        <div class="t_card">
                            <div class="t_img_section">
                                <img src="../img/team/z.jpg" alt="">
                            </div>
                            <div class="team_content">
                                <h3>Michelle</h3>
                                <h4>Team Leader</h4>
                                <p>
                                 the vibrant team leader of our outstanding development team.
                                  Luna leads our team to success in every project we take on with her strategic vision and unwavering dedication.
                                   As our team's leader, Luna encourages a climate of cooperation, creativity, and excellence, enabling each member to realize their greatest potential and offer their special skills. Luna directs our efforts with passion and accuracy, driven by a keen focus on meeting and surpassing goals and completing each project to the highest standard.
                                </p>
                            </div>
                        </div>

                        <!-- Second Team -->

                        <div class="t_card">
                            <div class="t_img_section">
                                <img src="../img/team/bb.jpg" alt="">
                            </div>
                            <div class="team_content">
                                <h3>Bang</h3>
                                <h4>Front_end developer</h4>
                                <p>
                                Yumi is our amazing front-end developer who adds precision and creativity to our web projects. Oliver translates design concepts into visually appealing and intuitive interfaces that captivate our audience. Oliver possesses expertise in HTML, CSS, and JavaScript. Oliver makes sure that not only are our websites aesthetically beautiful but also responsive and easy to use on all devices. He has a keen eye for detail. Oliver's commitment to frontend development takes our projects to new heights, from implementing interactive features to optimizing performance.
                                </p>
                            </div>
                        </div>

                        <div class="t_card">
                            <div class="t_img_section">
                                <img src="../img/team/jj.jpg" alt="">
                            </div>
                            <div class="team_content">
                                <h3>Jhon</h3>
                                <h4>Senior UI/UX developer</h4>
                                <p>
                                 who is a key player in determining the direction that our digital experiences take. Liam creates engaging interfaces and smooth interactions for our audience with a strong grasp of user behaviour and a love of design. Liam carefully designs every element of our websites, from wireframes to prototypes, making sure they are not only aesthetically pleasing but also accessible and user-friendly.
                                </p>
                            </div>
                        </div>

                        <div class="t_card">
                            <div class="t_img_section">
                                <img src="../img/team/k.jpg" alt="">
                            </div>
                            <div class="team_content">
                                <h3>Lia</h3>
                                <h4>Quality Assurance Engineer</h4>
                                <p>
                                 Our painstaking Quality Assurance (QA) Engineer who is committed to making sure that our web projects adhere to the strictest reliability and quality requirements in every way.
                                </p>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div>

     
        <?php

            include 'footer.php';

        ?>
    
    
    <script src="../Javascript/contact_val.js"></script>

       
    </body>
</html>

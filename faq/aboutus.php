<!doctype html>
<html lang="en" class="no-js">
<?php 
session_start(); 
require '../connection.php';
$conn = Connect();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/reset.css">
    <!-- CSS reset -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Resource style -->
    <script src="js/modernizr.js"></script>
    <!-- Modernizr -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"> -->
    <title>Abous us | Anytime Wheels</title>

    <style>
        .p{
            text-align: center;
            margin: 20px; /* Add some margin for spacing */
            font-size: 22px; 
            font-family: "Georgia", serif;
        }
        </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-custom" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                    </button>
                <a class="navbar-brand page-scroll" href="../index.php">
                   ANYTIME WHEELS </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <?php
                if(isset($_SESSION['login_client'])){
            ?>
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_client']; ?></a>
                        </li>
                        <li>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Control Panel <span class="caret"></span> </a>
                                    <ul class="dropdown-menu">
                                        <li> <a href="../entercar.php">Add Car</a></li>
                                        <li> <a href="../enterdriver.php"> Add Driver</a></li>
                                        <li> <a href="../clientview.php">View</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                        </li>
                    </ul>
                </div>

                <?php
                }
                else if (isset($_SESSION['login_customer'])){
            ?>
                    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="../index.php">Home</a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_customer']; ?></a>
                            </li>
                            <ul class="nav navbar-nav">
                                <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Garage <span class="caret"></span> </a>
                                    <ul class="dropdown-menu">
                                        <li> <a href="../prereturncar.php">Return Now</a></li>
                                        <li> <a href="../mybookings.php"> My Bookings</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <li><a href="aboutus.php"> About Us </a></li>
                            <li><a href="index.php"> FAQ </a></li>
                            <li>
                                <a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                            </li>
                        </ul>
                    </div>

                    <?php
            }
                else {
            ?>

                        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="../index.php">Home</a>
                                </li>
                                <li>
                                    <a href="../clientlogin.php">Employee</a>
                                </li>
                                <li>
                                    <a href="../customerlogin.php">Customer</a>
                                </li>
                                <li><a href="aboutus.php"> About Us </a></li>
                                <li><a href="index.php"> FAQ </a></li>
                            </ul>
                        </div>
                        <?php   }
                ?>
                        <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <p class="p">If you're looking for cars to rent near you, AnytimeWheels is your perfect solution! Rent cars in 3 easy steps: <br><strong>Pick your date </strong><br><strong> Select the vehicle of your choice from our wide range of cars </strong><br><strong>Book & zoom away</strong></p>

    <section class="cd-faq">
        <ul class="cd-faq-categories">
            <li><a class="selected" href="#basics">History</a></li>
            <li><a href="#membership">Reviews</a></li>
            <li><a href="#chauffeur">Contact</a></li>
        </ul>
        <!-- cd-faq-categories -->
        <div class="cd-faq-items">
            <ul id="basics" class="cd-faq-group">
                <li class="cd-faq-title">
                    <h2>History</h2>
                </li>
                <li>
                    <a class="cd-faq-trigger" href="#0">WHAT ARE WE?</a>
                    <div class="cd-faq-content">
                        <p>AnytimeWheels is the leading marketplace for car sharing in emerging markets, on its technology-driven platform across India. Guests in the Zoomcar community enjoy a diverse, affordable selection of cars to unlock memorable driving experiences with friends and family. It is founded in 2024 and headquartered in Mumbai, India. Uri Levine, the co-founder of mobility unicorns Waze and Moovit, currently serves as AnytimeWheels's Chairman of the Board.
                            Unleash the thrill of the financial capital of India at your fingertips with car rentals in Mumbai! No more waiting for cabs or relying on schedules. It's time to be in control.
                            Benefits Of Car Rentals In Mumbai
                            Discover the perks of having your own wheels in the city that never sleeps. Freedom, flexibility, and affordability – a chauffeur-driven car in Mumbai is your ticket to exploring on your terms. Say goodbye to restrictions and hello to the open road!</p>
                    </div>
                    <!-- cd-faq-content -->
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">Places to visit in Mumbai!</a>
                    <div class="cd-faq-content">
                        <p>Places to Go in Mumbai
                            Embark on a captivating journey through the heart of Mumbai in your self-drive, where every street corner narrates a unique tale. Begin your exploration with the iconic Gateway of India, standing tall as a symbol of the city's historical significance. Meander through the vibrant markets of Colaba Causeway, experiencing the energetic pulse of Mumbai's bustling life. Unwind at Marine Drive, also known as the Queen's Necklace, and witness a breathtaking sunset against the Arabian Sea.</div>
                    <!-- cd-faq-content -->
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">Places near Mumbai!</a>
                    <div class="cd-faq-content">
                        <p>Escape the bustling energy of Mumbai and explore its enchanting getaways with the convenience of Zoomcar's 'Rent a Car in Mumbai for Outstation' service. Take a short drive to Lonavala and witness the mesmerizing beauty of its lush hills and cascading waterfalls. Experience the historical charm of Karjat, where ancient forts and glistening rivers await your discovery. Dive into the coastal allure of Alibaug, with its pristine beaches and historic forts that paint a picture of tranquility.
                            The adventure doesn't stop there with your car rental – head to the scenic Matheran, a quaint hill station offering panoramic views and a refreshing escape from city life. Embrace the spiritual vibes of Shirdi, a sacred town renowned for the revered Sai Baba Temple. Or, explore the cultural richness of Nashik, known for its vineyards and ancient temples.</p>
                    </div>
                    <!-- cd-faq-content -->
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">Even at Airport!</a>
                    <div class="cd-faq-content">
                        <p>Car Rental At Mumbai Airport With US
                            Touch down in style at the airport and elevate your experience with our luxury car rentals near Mumbai Airport. Skip the taxi lines and step directly into the driver's seat of your Zoomcar waiting for you at the airport. It's not just convenient and efficient; it's the epitome of luxury, ready to kickstart your adventure right from the moment you land. Because when it comes to exploring Mumbai, why settle for anything less than a premium experience</p>
                    </div>
                    <!-- cd-faq-content -->
                </li>
            </ul>
            <!-- cd-faq-group -->

            <ul id="membership" class="cd-faq-group">
                <li class="cd-faq-title">
                    <h2>Reviews</h2>
                </li>
                <li>
                    <a class="cd-faq-trigger" href="#0">Flattered with service!</a>
                    <div class="cd-faq-content">
                        <p>Amazed with availability of well maintained cars</p>
                            <br>-Arvind, Mumbai</br>
                    </div>
                    <!-- cd-faq-content -->
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">Airport Luxury!</a>
                    <div class="cd-faq-content">
                        <p>rofessional and very helpful car rental. Fantastic airport car delivery and collection service. Well maintained car. Highly recommended!</p>
                        <br>-Michelle, Mumbai</br>
                    </div>
                    <!-- cd-faq-content -->
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">Fair prices!</a>
                    <div class="cd-faq-content">
                        <p>Reliable car rental with fair prices
                            We received on Churchgate the car rental we wanted on time at the hotel.</p>
                        <br>-Daniel, Mumbai</br>
                    </div>
                    <!-- cd-faq-content -->
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">Great Hospitality :-D</a>
                    <div class="cd-faq-content">
                        <p>Completely satisfied!
                        Friendly staff, good mediation, fair prices. When I forgot my expensive glasses in the glove compartment while island hopping Seychelles on the first island, they arranged for me to collect them at the airport before departure!
                        <br>-Ben, Mumbai</br>
                        </p></div>
                    <!-- cd-faq-content -->
                </li>
            </ul>

            <ul id="chauffeur" class="cd-faq-group">
                <li class="cd-faq-title">
                    <h2>Contact</h2>
                </li>
                <li>
                    <a class="cd-faq-trigger" href="#0">Located at - </a>
                    <div class="cd-faq-content">
                        <p><strong>Chruchgate Office: </strong>Express Building, Churchgate, Opp. Churchgate Railway Station, Mumbai</p>
                        <p>Gmap : <a href="https://www.google.com/maps/place/IDP+Education+-+Study+Abroad+Consultants+in+Churchgate,+Mumbai/@18.9338142,72.826988,15z/data=!4m6!3m5!1s0x3be7d1e7baaaaaab:0xe6378f60d3f8dc03!8m2!3d18.9338142!4d72.826988!16s%2Fg%2F1td8xlfb?entry=tts">https://maps.app.goo.gl/BNPwS46vXCaJRypZ8</a></p>
                        <p><strong>Vashi Office: </strong>Goodwill Excellency, Sector 17, Above Tanishq Showroom, Navi Mumbai</p>
                        <p>Gmap : <a href="https://www.google.com/maps/place/IDP+Education/@19.0702035,72.997956,15z/data=!4m6!3m5!1s0x3be7c1afcdec0867:0xbb6d28c643d8332e!8m2!3d19.0702035!4d72.997956!16s%2Fg%2F11h12s_jgt?entry=ttu">https://maps.app.goo.gl/psVwGf4CZsmTe6o66</a></p>
                        <p><strong>Dadar Office: </strong>Naman Midtown, off Senapati Bapat Marg, Elphinstone Road (W), Dadar (West), Mumbai</p>
                        <p>Gmap : <a href="https://www.google.com/maps/place/IDP+Education+-+Study+Abroad+Consultants+in+Dadar,+Mumbai/@19.0098721,72.836593,15z/data=!4m6!3m5!1s0x3be7cf72d3af1c6b:0xdf2ba03d318fb330!8m2!3d19.0098721!4d72.836593!16s%2Fg%2F11t4h2dq8t?hl=en&entry=tts">https://maps.app.goo.gl/ELnt9WjrX1DA61Zx6</a></p>
                    
                    </div>
                    <!-- cd-faq-content -->
                </li>

                <li>
                    <a class="cd-faq-trigger" href="#0">Contact form ~</a>
                    <div class="cd-faq-content">
                        <p><a href="../contact.html">Submit your queries here!</a></p>
                    </div>
                    <!-- cd-faq-content -->
                </li>
                <li>
                    <a class="cd-faq-trigger" href="#0">How do I login?</a>
                    <div class="cd-faq-content">
                        <p>Once you sign-up, we will re direct you to the log in screen. When you are logged in, you will see a small bar in the upper right corner of the screen welcoming to you our site. If you already have set up an account but have logged out, you can either click on the 'Log-In' button on our menu bar which takes you to our log-in page or, if you are on our home page, you can use the log-in area on it.</p>
                    </div>
                    <!-- cd-faq-content -->
                </li>
                <li>
                    <a class="cd-faq-trigger" href="#0">Lets keep in touch :)</a>
                    <div class="cd-faq-content">
                        <a href="https://www.instagram.com/accounts/login/" class="round-button">
                        <!-- Replace "your-image-source" with the actual path to your image file -->
                        <img src="../assets/img/insta_round.jpg" alt="Button Image" width="30" height="30">
                        Instagram
                        </a>
                        <a href="https://www.facebook.com/login/" class="round-button">
                        <!-- Replace "your-image-source" with the actual path to your image file -->
                        <img src="../assets/img/fb_round.png" alt="Button Image" width="30" height="30">
                        Facebook
                        </a>
                        <a href="https://twitter.com/i/flow/login" class="round-button">
                        <!-- Replace "your-image-source" with the actual path to your image file -->
                        <img src="../assets/img/t_round.jpg" alt="Button Image" width="30" height="30">
                        Twitter
                        </a><br><br>
                        Contact us: 8549625310
                    </div>
                    <!-- cd-faq-content -->
                </li>
                <li>
                    <a class="cd-faq-trigger" href="#0">Feedback!</a>
                    <div class="cd-faq-content">
                    
                        <p><a href="../feedback.html">Write your feedback here!</a></p>
                    
                    </div>
                    <!-- cd-faq-content -->
                </li>
            </ul>
            <!-- cd-faq-group -->
                    </div>
                    <!-- cd-faq-content -->
                </li>
            </ul>
            <!-- cd-faq-group -->
        </div>
        <!-- cd-faq-items -->
        <a href="#0" class="cd-close-panel">Close</a>
    </section>
    <!-- cd-faq -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCuoe93lQkgRaC7FB8fMOr_g1dmMRwKng&callback=myMap" type="text/javascript"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="assets/js/theme.js"></script>
</body>
</body>

</html>
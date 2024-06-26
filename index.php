<!DOCTYPE html>
<html>
<?php 
session_start(); 
require 'connection.php';
$conn = Connect();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anytime Wheels</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                    </button>
                <a class="navbar-brand page-scroll" href="index.php">
                   ANYTIME WHEELS </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <?php
                if(isset($_SESSION['login_client'])){
            ?> 
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_client']; ?></a>
                    </li>
                    <li>
                    <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Control Panel <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="entercar.php">Add Car</a></li>
              <li> <a href="enterdriver.php"> Add Driver</a></li>
              <li> <a href="clientview.php">View</a></li>

            </ul>
            </li>
          </ul>
                    </li>
                    <li>
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
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
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_customer']; ?></a>
                    </li>
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Garage <span class="caret"></span> </a>
                            <ul class="dropdown-menu">
                                <li> <a href="prereturncar.php">Return Now</a></li>
                                <li> <a href="mybookings.php"> My Bookings</a></li>
                            </ul>
                        </li>
                    </ul>
                    <li><a href="faq/aboutus.php"> About Us </a></li>
                    <li><a href="faq/index.php"> FAQ </a></li>
                    <li>
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
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
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="clientlogin.php">Employee</a>
                    </li>
                    <li>
                        <a href="customerlogin.php">Customer</a>
                    </li>
                    <li>
                        <a href="faq/aboutus.php"> About Us </a>
                    </li>
                    <li>
                        <a href="faq/index.php"> FAQ </a>
                    </li>
                </ul>
            </div>
                <?php   }
                ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="bgimg-1">
        <header class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="brand-heading" style="color: white">Anytime Wheels</h1>
                            <p class="intro-text" style="color: white">
                                Online Car Rental Service
                            </p>
                            <a href="#sec2" class="btn btn-circle page-scroll blink">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div id="sec2" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
        <h3 style="text-align:center;">Available Cars</h3>
<br>
        <section class="menu-content">
            <?php   
            $sql1 = "SELECT * FROM cars WHERE car_availability='yes'";
            $result1 = mysqli_query($conn,$sql1);

            if(mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)){
                    $car_id = $row1["car_id"];
                    $car_name = $row1["car_name"];
                    $ac_price = $row1["ac_price"];
                    $ac_price_per_day = $row1["ac_price_per_day"];
                    $non_ac_price = $row1["non_ac_price"];
                    $non_ac_price_per_day = $row1["non_ac_price_per_day"];
                    $car_img = $row1["car_img"];
               
                    ?>
            <a href="booking.php?id=<?php echo($car_id) ?>">
            <div class="sub-menu">
            

            <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Card image cap">
            <h5><b> <?php echo $car_name; ?> </b></h5>
            <h6> AC Fare: <?php echo ("Rs. " . $ac_price . "/km & Rs." . $ac_price_per_day . "/day"); ?></h6>
            <h6> Non-AC Fare: <?php echo ("Rs. " . $non_ac_price . "/km & Rs." . $non_ac_price_per_day . "/day"); ?></h6>

            
            </div> 
            </a>
            <?php }}
            else {
                ?>
<h1> No cars available :( </h1>
                <?php
            }
            ?>                                   
        </section>
                    
    </div>
    <br><br>
    
    <div class="container map-container">
    <h2 class="font-weight: bold">Discover Our Service Locations:</h2>
    <div id="googleMap" style="width: 100%; height: 500px; margin-bottom: 20px;"></div>
</div>

    
    <div class="bgimg-2">
        <div class="caption">
            <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;"></span>
        </div>
    </div>



    
    <!-- Container (Contact Section) -->
    <!-- -->
    <footer class="site-footer">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-6">
                    <h5>By continuing past this page, you agree to our Terms of Service, Cookie Policy, Privacy Policy and Content Policies. All trademarks are properties of their respective owners. © AnytimeWheels. All rights reserved - <?php echo date("Y"); ?> </h5>
                    <a href="https://www.instagram.com/accounts/login/" class="round-button">
                        <!-- Replace "your-image-source" with the actual path to your image file -->
                        <img src="assets/img/insta_round.jpg" alt="Button Image" width="30" height="30">
                        Instagram
                        </a>
                        <a href="https://www.facebook.com/login/" class="round-button">
                        <!-- Replace "your-image-source" with the actual path to your image file -->
                        <img src="assets/img/fb_round.png" alt="Button Image" width="30" height="30">
                        Facebook
                        </a>
                        <a href="https://twitter.com/i/flow/login" class="round-button">
                        <!-- Replace "your-image-source" with the actual path to your image file -->
                        <img src="assets/img/t_round.jpg" alt="Button Image" width="30" height="30">
                        Twitter
                        </a>
                </div>
                
            </div>
        </div>
    </footer>
    <script type="text/javascript">
        function myMap() {
            // Define the center of the map
            var myCenter = new google.maps.LatLng(20.5937, 78.9629); // India's center coordinates

            // Specify map options
            var mapOptions = {
                center: myCenter,
                zoom: 5,
                scrollwheel: true,
                draggable: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            // Create the map object
            var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

            // Define array of locations with their coordinates and names
            var locations = [
    { lat: 19.0760, lng: 72.8777, name: 'Mumbai' },
    { lat: 12.9716, lng: 77.5946, name: 'Bangalore' },
    { lat: 18.5204, lng: 73.8567, name: 'Pune' },
    { lat: 15.2993, lng: 74.1240, name: 'Goa' },
    { lat: 28.7041, lng: 77.1025, name: 'Delhi' },
    { lat: 22.5726, lng: 88.3639, name: 'Kolkata' },
    { lat: 25.5941, lng: 85.1376, name: 'Patna' },
    { lat: 26.9124, lng: 75.7873, name: 'Jaipur' },
    { lat: 30.7333, lng: 76.7794, name: 'Chandigarh' },
    { lat: 17.3850, lng: 78.4867, name: 'Hyderabad' },
    { lat: 19.0760, lng: 72.8777, name: 'Thane' },
    { lat: 22.7196, lng: 75.8577, name: 'Indore' },
    { lat: 23.2599, lng: 77.4126, name: 'Bhopal' },
    { lat: 23.0225, lng: 72.5714, name: 'Ahmedabad' },
    { lat: 30.3165, lng: 78.0322, name: 'Dehradun' },
    { lat: 13.0827, lng: 80.2707, name: 'Chennai' }, 
    // Add more locations as needed
];

            // Add markers for each location
            locations.forEach(function (location) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(location.lat, location.lng),
                    map: map,
                    title: location.name
                });
            });
        }
    </script>
    <script>
        function sendGaEvent(category, action, label) {
            ga('send', {
                hitType: 'event',
                eventCategory: category,
                eventAction: action,
                eventLabel: label
            });
        };
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5gR4ZafrsHLQb4y1gCUtvYtqRUNvVH6U&callback=myMap" type="text/javascript"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="assets/js/theme.js"></script>
</body>

</html>
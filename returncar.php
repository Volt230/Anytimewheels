<!DOCTYPE html>
<html>
<?php 
session_start(); 
require 'connection.php';
$conn = Connect();
?>
<head>
<link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
<link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
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
              <li> <a href="returncar.php">Return Now</a></li>
              <li> <a href="mybookings.php"> My Bookings</a></li>
            </ul>
            </li>
          </ul>
                     <li>
                        <a href="faq/aboutus.php"> About Us </a>
                    </li>
                    <li>
                        <a href="faq/index.php"> FAQ </a>
                    </li>
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
<?php
function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}
 $id = $_GET["id"];
 $sql="SELECT rc.driver_id FROM rentedcars rc WHERE id = '$id'";
 $result = $conn->query($sql);
 if (mysqli_num_rows($result) > 0) {
 $row = mysqli_fetch_array($result);
    $driver_id = $row["driver_id"];
 }

 if (($driver_id)!=0) {
    $sql1 = "SELECT c.car_name, c.car_nameplate, rc.rent_start_date, rc.rent_end_date, rc.fare, rc.charge_type, d.driver_name, d.driver_phone
    FROM rentedcars rc, cars c, driver d
    WHERE id = '$id' AND c.car_id=rc.car_id AND d.driver_id = rc.driver_id";
    $result1 = $conn->query($sql1);
}
 else {
    $sql1 = "SELECT c.car_name, c.car_nameplate, rc.rent_start_date, rc.rent_end_date, rc.fare, rc.charge_type
    FROM rentedcars rc, cars c
    WHERE id = '$id' AND c.car_id=rc.car_id";
    $result1 = $conn->query($sql1);
}
 if (mysqli_num_rows($result1) > 0) {
    while($row = mysqli_fetch_assoc($result1)) {
        $car_name = $row["car_name"];
        $car_nameplate = $row["car_nameplate"];
        $rent_start_date = $row["rent_start_date"];
        $rent_end_date = $row["rent_end_date"];
        $fare = $row["fare"];
        $charge_type = $row["charge_type"];
        $no_of_days = dateDiff("$rent_start_date", "$rent_end_date");
        if (($driver_id)!=0) {
            $driver_name = $row["driver_name"];
            $driver_phone = $row["driver_phone"];
        }
    }
}
?>
    <div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" id="paymentForm" action="printbill.php?id=<?php echo $id ?>" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 5px; text-align: center; font-size: 30px;"> Journey Details </h3>
          <h6 style="margin-bottom: 25px; text-align: center; font-size: 12px;"> Allow your driver to fill the below form </h6>

           <h5> Car:&nbsp;  <?php echo($car_name);?></h5>

           <h5> Vehicle Number:&nbsp;  <?php echo($car_nameplate);?></h5>

           <h5> Rent date:&nbsp;  <?php echo($rent_start_date);?></h5>

           <h5> End Date:&nbsp;  <?php echo($rent_end_date);?></h5>

           <h5> Fare:&nbsp;  Rs. <?php 
            if($charge_type == "days"){
                    echo ($fare . "/day");
                } 
                
                else {
                    echo ($fare . "/km");
                }
            ?>
            </h5>
           <?php if (($driver_id)!=0) { ?>
           <h5> Driver Name:&nbsp;  <?php echo($driver_name);?></h5>

           <h5> Driver Contact:&nbsp;  <?php echo($driver_phone);?></h5>
           <?php }?>
          <?php if($charge_type == "km") { ?>
          <div class="form-group">
            <input type="text" class="form-control" id="distance_or_days" name="distance_or_days" placeholder="Enter the distance travelled (in km)" required="" autofocus>
          </div>
          <?php }  else { ?>
            <h5> Number of Day(s):&nbsp;  <?php echo($no_of_days);?></h5>
            <input type="hidden" name="distance_or_days" value="<?php echo $no_of_days; ?>">
          <?php } ?>
          <input type="hidden" name="hid_fare" id="hid_fare" value="<?php echo $fare; ?>">
          <input type="hidden" name="total_fare" id="total_fare" value="">

          
          <form action="display.php" method="post">
        <label for="userInput"><h5>Arrivat At: </h5></label>
<<<<<<< HEAD
        <input type="text" id="userInput" name="userInput" required>
=======
<select name="userInput" id="userInput">
    <option value="" selected disabled hidden>Select your city</option>
    <option value="Mumbai">Mumbai</option>
    <option value="Bangalore">Bangalore</option>
    <option value="Pune">Pune</option>
    <option value="Goa">Goa</option>
    <option value="Delhi">Delhi</option>
    <option value="Kolkata">Kolkata</option>
    <option value="Patna">Patna</option>
    <option value="Jaipur">Jaipur</option>
    <option value="Chandigarh">Chandigarh</option>
    <option value="Hyderabad">Hyderabad</option>
    <option value="Thane">Thane</option>
    <option value="Indore">Indore</option>
    <option value="Bhopal">Bhopal</option>
    <option value="Ahmedabad">Ahmedabad</option>
    <option value="Dehradun">Dehradun</option>
    <option value="Chennai">Chennai</option>
</select>
<br><br>

>>>>>>> a6d0474 (feature signup working)
        <button type="button" id="rzp-button" class="btn btn-success pull-right">Submit</button>
    </form>

           <!-- <input type="submit" name="submit" value="submit" class="btn btn-success pull-right"> -->    
        </form>
      </div>
    </div>
   
    </div>

</body>
<script>
    var total_charge;
    var fare = <?php echo $fare; ?>;
    document.getElementById('rzp-button').onclick = function () {
        var no_of_days = <?php echo $no_of_days; ?>;
        var charge;
        var driver_charge=0;
        if("<?php echo $driver_id ?>" != 0){
            driver_charge=1000*no_of_days;
        }
        if ("<?php echo $charge_type; ?>" == "days") {
        charge = fare * no_of_days+driver_charge;
        console.log(charge);
        }
        else {
        charge = fare * document.getElementById("distance_or_days").value+driver_charge;
        console.log(charge);
        }
        total_charge = Math.round(charge * 100);
        console.log(total_charge);
        document.getElementById('total_fare').value = total_charge;
        var options = {
            "key": "rzp_test_fRnrf22SkuFtjW", // Replace with your Razorpay key
            "amount": total_charge, // The amount to be charged in paise (e.g., 500 for ₹5.00)
            "currency": "INR", // Currency
            "name": "Anytime Wheels",
            "description": "Booking Payment",
            "image": "assets/img/p.png", // Your logo
            "handler": function (response) {
                // On success, submit the form to your server for booking confirmation
                 document.getElementById('paymentForm').submit();
            },
            "prefill": {
                // Pre-fill customer details if available
                "name": "<?php echo $_SESSION['login_customer']; ?>",
                "email": "customer@example.com"
            },
            "theme": {
                "color": "#F37254" // Theme color
            }
        };
        var rzp = new Razorpay(options);
        rzp.open();
        };
    
       
        // document.getElementById('rzp-button').onclick = = function () {
        //     rzp.open();
        // };
    </script>
<footer class="site-footer">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <h5>Anytime Wheels - <?php echo date("Y"); ?> </h5>
                </div>
            </div>
        </div>
    </footer>
</html>
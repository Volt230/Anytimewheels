<!DOCTYPE html>
<html>
<?php 
 include('session_customer.php');
if(!isset($_SESSION['login_customer'])){
    session_destroy();
    header("location: customerlogin.php");
}
?> 
<title>Book Car </title>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script type="text/javascript" src="assets/ajs/angular.min.js"> </script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="assets/js/custom.js"></script> 
</head>
<body ng-app=""> 


      <!-- Navigation -->
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
                        <a href="#"> FAQ </a>
                    </li>
                </ul>
            </div>
                <?php   }
                ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
<div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" id="paymentForm" method="POST" action="bookingconfirm.php">
        <br style="clear: both">
          <br>

        <?php
        $car_id = $_GET["id"];
        $sql1 = "SELECT * FROM cars WHERE car_id = '$car_id'";
        $result1 = mysqli_query($conn, $sql1);

        if(mysqli_num_rows($result1)){
            while($row1 = mysqli_fetch_assoc($result1)){
                $car_name = $row1["car_name"];
                $car_nameplate = $row1["car_nameplate"];
                $ac_price = $row1["ac_price"];
                $non_ac_price = $row1["non_ac_price"];
                $ac_price_per_day = $row1["ac_price_per_day"];
                $non_ac_price_per_day = $row1["non_ac_price_per_day"];
            }
        }

        ?>

          <!-- <div class="form-group"> -->
              <h5> Selected Car:&nbsp;  <b><?php echo($car_name);?></b></h5>
         <!-- </div> -->
         
          <!-- <div class="form-group"> -->
            <h5> Number Plate:&nbsp;<b> <?php echo($car_nameplate);?></b></h5>
          <!-- </div>      -->
        <!-- <div class="form-group"> -->
        <?php $today = date("Y-m-d") ?>
          <label><h5>Start Date:</h5></label>
            <input type="date" name="rent_start_date" min="<?php echo($today);?>" required="">
            &nbsp; 
          <label><h5>End Date:</h5></label>
          <input type="date" name="rent_end_date" min="<?php echo($today);?>" required="">
        <!-- </div>      -->
        
        <h5> Choose your car type:  &nbsp;
            <input onclick="reveal()" type="radio" name="radio" value="ac" ng-model="myVar"> <b>With AC </b>&nbsp;
            <input onclick="reveal()" type="radio" name="radio" value="non_ac" ng-model="myVar"><b>With-Out AC </b>
                
        
        <div ng-switch="myVar"> 
        <div ng-switch-default>
                    <!-- <div class="form-group"> -->
                <h5>Fare: <h5>    
                <!-- </div>    -->
                     </div>
                    <div ng-switch-when="ac">
                    <!-- <div class="form-group"> -->
                <h5>Fare: <b><?php echo("Rs. " . $ac_price . "/km and Rs. " . $ac_price_per_day . "/day");?></b><h5>    
                <!-- </div>    -->
                     </div>
                     <div ng-switch-when="non_ac">
                     <!-- <div class="form-group"> -->
                <h5>Fare: <b><?php echo("Rs. " . $non_ac_price . "/km and Rs. " . $non_ac_price_per_day . "/day");?></b><h5>    
                <!-- </div>   -->
                     </div>
        </div>        
         <h5> Charge type:  &nbsp;
            <input onclick="reveal()" type="radio" name="radio1" value="km"><b> per KM</b> &nbsp;
            <input onclick="reveal()" type="radio" name="radio1" value="days"><b> per day</b>
            <br><br>
<<<<<<< HEAD
            Enter Your city :
            <input type="text" placeholder="Enter your city" name="city">        
            <br><br>
=======
Enter Your city:
<select name="city" id="citySelect">
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
                <!-- <form class="form-group"> -->
                 <label>Select a driver:</label>
                    <select name="driver_id_from_dropdown" ng-model="myVar1" onchange="selectDriver()">
                        <option value="None">None</option>
                        <?php
                        $sql2 = "SELECT * FROM driver d WHERE d.driver_availability = 'yes' AND d.client_username IN (SELECT cc.client_username FROM clientcars cc WHERE cc.car_id = '$car_id')";
                        $result2 = mysqli_query($conn, $sql2);

                        if(mysqli_num_rows($result2) > 0){
                            while($row2 = mysqli_fetch_assoc($result2)){
                                $driver_id = $row2["driver_id"];
                                $driver_name = $row2["driver_name"];
                                $driver_gender = $row2["driver_gender"];
                                $driver_phone = $row2["driver_phone"];
                    ?>
                        <option value="<?php echo($driver_id); ?>"><?php echo($driver_name); ?></option>
                    <?php }}  
                    else{
                        ?>
                    Sorry! No Drivers are currently available, try again later...
                        <?php
                    }
                    ?>
                    </select>
                    <br><br>
        Driver charge: Rs. 1000/day 
        <br><br>
                <div id="driverDetails"  ng-switch="myVar1">
                    <!-- Driver details will be displayed here based on selection -->
                </div>
                <?php
$sql2 = "SELECT * FROM driver d WHERE d.driver_availability = 'yes' AND d.client_username IN (SELECT cc.client_username FROM clientcars cc WHERE cc.car_id = '$car_id')";
$result2 = mysqli_query($conn, $sql2);

if(mysqli_num_rows($result2) > 0){
    while($row2 = mysqli_fetch_assoc($result2)){
        $driver_id = $row2["driver_id"];
        $driver_name = $row2["driver_name"];
        $driver_gender = $row2["driver_gender"];
        $driver_phone = $row2["driver_phone"];
?>
<input type="hidden" id="driver_name_<?php echo $driver_id; ?>" value="<?php echo $driver_name; ?>">
<input type="hidden" id="driver_gender_<?php echo $driver_id; ?>" value="<?php echo $driver_gender; ?>">
<input type="hidden" id="driver_phone_<?php echo $driver_id; ?>" value="<?php echo $driver_phone; ?>">
<?php }} ?>
                <input type="hidden" name="hidden_carid" value="<?php echo $car_id; ?>">
                
         
           <input type="Submit" value="Rent Now" class="btn btn-warning pull-right">     
           </div>
        </form>
        
      </div>
      <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
            <h6><strong>Note:</strong> You will be charged with extra <span class="text-danger">Rs. 500</span> for any in-car damages.</h6>
        </div>
    </div>

</body>
<script>
    function selectDriver() {
    var selectedDriver = document.getElementsByName("driver_id_from_dropdown")[0].value;
    var driverDetailsDiv = document.getElementById("driverDetails");

    if (selectedDriver === "None") {
        // Display default message or hide the driver details section
        driverDetailsDiv.innerHTML = "<p>No driver selected.</p>";
    } else {
        // Display driver details based on selection
        var driverName = document.getElementById("driver_name_" + selectedDriver).value;
        var driverGender = document.getElementById("driver_gender_" + selectedDriver).value;
        var driverPhone = document.getElementById("driver_phone_" + selectedDriver).value;

        driverDetailsDiv.innerHTML = "<div>" +
            "<p>Driver Name: <b>" + driverName + "</b></p>" +
            "<p>Gender: <b>" + driverGender + "</b></p>" +
            "<p>Contact: <b>" + driverPhone + "</b></p>" +
            "</div>";
    }
}

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
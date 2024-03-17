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
    <!-- Include Razorpay API script -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <!-- Your other scripts and styles -->
    <!-- Rest of your head content -->
</head>
<body ng-app=""> 

    <!-- Your existing HTML content -->

    <!-- Add a Razorpay payment button -->
    <form id="paymentForm" role="form" action="bookingconfirm.php" method="POST">
        <!-- Your form fields -->
        <!-- For example, input fields for name, email, etc. -->

        <!-- Razorpay payment button -->
        <button type="button" id="rzp-button">Pay Now</button>
    </form>

    <!-- Your existing HTML content -->

    <!-- Initialize Razorpay payment -->
    <script>
        var options = {
            "key": "YOUR_RAZORPAY_KEY", // Replace with your Razorpay key
            "amount": AMOUNT_IN_PAISE, // The amount to be charged in paise (e.g., 500 for ₹5.00)
            "currency": "INR", // Currency
            "name": "Anytime Wheels",
            "description": "Booking Payment",
            "image": "assets/img/P.png.png", // Your logo
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
        document.getElementById('rzp-button').onclick = function () {
            rzp.open();
        };
    </script>

    <!-- Your existing HTML content -->

    <footer class="site-footer">
        <!-- Your footer content -->
    </footer>
</body>
</html>

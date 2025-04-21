<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
       <title>Payment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 100px;
            background-color: #F0F0F0; /* Background color for the container */
            border-radius: 10px; /* Rounded corners for the container */
        }
        .header {
            font-size: 30px;
            font-weight: bold;
        }
        .statement {
            font-size: 25px;
            margin-bottom: 20px;
            font-family: 'Times New Roman', Times, serif; /* Change font family */
        }
        .pay-button {
            background-color: #007BFF;
            color: white;
            border: none;
            font-size: 15px;
            padding: 20px 20px;
            cursor: pointer;
            border-radius: 10px; /* Rounded corners for the button */
        }
        .pay-button:hover {
            background-color: #0056b3;
        }
    </style>
    </head>
    <body>
<!--        <button type="submit" value="submit" id="payment">Payment
            
        </button>-->
        <br><br>
    <div class="container">
        <div class="header">Payment Confirmation for Car Rental</div>
        <br>
        <div class="statement">
            <p>Are you sure you want to book a car?</p>
        </div>
        <form action="payment_processing.php" method="post">
            <button class="pay-button" type="submit" id="payment" >Confirm and Pay</button>
        </form>
    </div>
       <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "rzp_test_QKqjMApuaUZ6Ko", // Enter the Key ID generated from the Dashboard
            "amount": "100", // Amount is in currency subunits
            "currency": "INR"
            // ... (other options)
        };
        var rzp1 = new Razorpay(options);
        document.getElementById('payment').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        };
    </script>                   
                        
                        
                        <script src="js/jquery-3.3.1.min.js"></script>
                        <script src="js/jquery-ui.js"></script>
                        <script src="js/popper.min.js"></script>
                        <script src="js/bootstrap.min.js"></script>
                        <script src="js/owl.carousel.min.js"></script>
                        <script src="js/jquery.magnific-popup.min.js"></script>
                        <script src="js/aos.js"></script>

                        <script src="js/main.js"></script>
    </body>
</html>

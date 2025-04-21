<!--<!DOCTYPE html>
<?php
//include "DatabaseConnection.php";
?>
<html lang="en">
<head>
    <title>Booking Receipt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 50px;
            background-color: #F0F0F0;
            border-radius: 10px;
        }
        .header {
            font-size: 30px;
            font-weight: bold;
        }
        .statement {
            font-size: 25px;
            margin-bottom: 20px;
            font-family: 'Times New Roman', Times, serif;
        }
        .pay-button {
            background-color: #007BFF;
            color: white;
            border: none;
            font-size: 15px;
            padding: 20px 20px;
            cursor: pointer;
            border-radius: 10px;
        }
        .pay-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
   
    echo "Hello, " . $_SESSION['bookingcurr'];
//    if (isset($_GET['Booking_Id'])) {
//        $Booking_Id = $_GET['Booking_Id'];
//
//        // Fetch booking details using $Booking_Id
//        $select1 = "SELECT `Booking_Id`, `Email`, `Registration_No`, `City_Id`, `Start_Date`, `End_Date`, `Start_Meter`, `End_Meter`, `Start_Time`, `End_Time`, `Security_Deposit`, `Selected_Kms`, `Offer`, `Amount`, `Booking_Date`, `Status` FROM `booking` WHERE `Booking_Id`='$Booking_Id'";
//        $query1 = mysqli_query($conn, $select1);
//        if (!$query1) {
//            echo "Query failed";
//        } else {
//            $row = mysqli_fetch_assoc($query1); // Fetch the data
//            $bid = $row['Booking_Id'];
//            $email = $row['Email'];
//            $rno = $row['Registration_No'];
//            $city = $row['City_Id'];
//            $sdate = $row['Start_Date'];
//            $edate = $row['End_Date'];
//            $smeter = $row['Start_Meter'];
//            $emeter = $row['End_Meter'];
//            $stime = $row['Start_Time'];
//            $etime = $row['End_Time'];
//            $sd = $row['Security_Deposit'];
//            $sk = $row['Selected_Kms'];
//            $offer = $row['Offer'];
//            $amt = $row['Amount'];
//            $bd = $row['Booking_Date'];
//        }
//    }
    ?>
    
    <div class="container">
        <div class="header">Receipt</div><br><br>
        <div id="receipt">
            <h2>Booking Details</h2>
            <p><strong>Booking Id:  </strong> <?php // echo $bid ?></p>
            <p><strong>Email:  </strong> <?php // echo $email ?></p>
            <p><strong>Pickup Date:</strong> <?php // echo $sdate ?></p>
            <p><strong>Return Date:</strong> <?php // echo $edate ?></p>
            <p><strong>Pickup Time:</strong> <?php // echo $stime ?></p>
            <p><strong>Return Time:</strong> <?php // echo $etime ?></p>
            <p><strong>Start Meter:</strong> <?php // echo $smeter ?></p>
            <p><strong>End Meter:</strong> <?php // echo $emeter ?></p>
            <p><strong>Security Deposit:</strong> <?php // echo $sd ?></p>
            <p><strong>Kilo meters :</strong> <?php // echo $sk ?></p>
            <p><strong>Offer:</strong> <?php // echo $offer ?></p>
            <p><strong>Total Amount:</strong> <?php // echo $amt ?></p>
            <p><strong>Booking Date:</strong> <?php // echo $bd ?></p>
        </div>
    </div>

    <button onclick="printReceipt()">Print Receipt</button>

    <script>
        function printReceipt() {
            var receipt = document.getElementById('receipt').innerHTML;
            var myWindow = window.open('', 'PRINT', 'height=600,width=800');
            myWindow.document.write('<html><head><title>Receipt</title></head><body>');
            myWindow.document.write(receipt);
            myWindow.document.write('</body></html>');
            myWindow.document.close();
            myWindow.print();
            myWindow.close();
        }
    </script>
</body>
</html>-->
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start(); 
        // put your code here
        // echo "Hello, " .$_SESSION['bookingcurr'];
         $bookidcurr=$_SESSION['bookingcurr'];
        ?>
    </body>
</html>





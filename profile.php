<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
include 'DatabaseConnection.php';
include 'Sessionwithoutlogin.php';
include 'headlink.php';
include 'Header.php';
?>
<html>
    <head>
        <style>
            .profile-edit {
                border: none;
                border-radius: 4px;
                width: 95%; /* Adjust the width as needed */
                padding: 16px; /* Adjust the padding as needed */
                font-size: 14px; /* Adjust the font size as needed */
                font-weight: 600;
                color: #6c757d;
                cursor: pointer;
                text-align: center; /* Center the text within the button */
                margin-bottom: 10px; 
                text-align: left;
            }
        </style>

        <meta charset="UTF-8">
        <title></title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="css/customerprofile.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <?php
        $Email = $_SESSION['CustomerEmail'];
//        $query = $conn->prepare("SELECT * FROM `customer` where `Email`=?");
//        $query->bind_param("s", $Email);
        $select = "SELECT * FROM `customer` where `Email`='$Email'";
        $query5 = mysqli_query($conn, $select);
        if (!$query5) {
            echo "failed to show";
        } else {
            while ($row = mysqli_fetch_array($query5)) {
                $Name = $row['Name'];
                $Email = $row['Email'];
                $mobile = $row['Mobile'];
                $DOB = $row['Date_Of_Birth'];
                $DL = $row['Driving_Licence'];
                $EX = $row['Expiration_date'];
                $AN = $row['AadharCard'];
                $Ph = $row['Image'];
            }
        }

//        foreach ($result as $row) {
//            $Name = $row['Name'];
//            $Email = $row['Email'];
//            $mobile = $row['Mobile'];
//            $DOB = $row['Date_Of_Birth'];
//            $DL = $row['Driving_Licence'];
//            $EX=$row['Expiration_date'];
//            $AN = $row['AadharCard'];
//            $Ph = $row['Image'];
//        }
        ?>
        <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="Customer/customerP/<?= $Ph; ?>" alt=""/>
<!--                            <img src="Customer/customerP/Priyank.jpg" alt=""/>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5>
<?= $Email; ?>
                            </h5>
                        </div>
                    </div>
                    <div class="col-md-12" >
                        <div  class="d-flex justify-content-end">
                            <a href="updateprofile.php"> <!-- Replace "edit_profile.php" with the actual URL of your edit profile page -->
                                <input type="button" class="profile-edit" name="btnAddMore" value="Edit Profile"/><br><br>

                            </a>
                            <a href="forgotpassword.php"> <!-- Replace "edit_profile.php" with the actual URL of your edit profile page -->
                                <input type="button" class="profile-edit" name="changepass" value="Change Password" href="forgorpassword.php"/><br><br>

                            </a>
                            <a href="forget.php"> <!-- Replace "edit_profile.php" with the actual URL of your edit profile page -->
                                <input type="button" class="profile-edit" name="forgetpass" value="forget Password" href="forget.php"/><br><br>

                            </a>
                        </div>
                    </div>

                </div>
                <br/><br/>
                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $Name; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>DOB</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $DOB; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>AadharCard No</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $AN; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Driving licence</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $DL; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Driving Licence Expiration Date</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $EX; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $mobile; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Experience</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Expert</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Hourly Rate</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>10$/hr</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Total Projects</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>230</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>English Level</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Expert</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Availability</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>6 months</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
<?php
// put your code here
include 'footerlink.php';
?>
    </body>
</html>

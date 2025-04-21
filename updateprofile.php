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
        <meta charset="UTF-8">
        <title></title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="css/customerprofile.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            .update-btn {

                background-color: grey;
                color: white;
                border: none;
                padding: 10px 15px;
                cursor: pointer;
                border-radius: 10px;
                font-size: 12px;
                margin-left: 1px;
                width: 100px;
                height: 50px;
                text-align: center;
            }

            .cancel-btn {

                background-color: grey;
                color: white;
                border: none;
                border-radius: 10px;
                padding: 10px 15px;
                cursor: pointer;
                margin-left: 800px; 
                width: 100px;
                height: 50px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php
        $Email = $_SESSION['CustomerEmail'];
        $query = $conn->prepare("SELECT * FROM customer where Email=?");
        $query->bind_param("s", $Email);
        $result = $query->execute();
        $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        foreach ($result as $row) {
            $Name = $row['Name'];
            $Email = $row['Email'];
            $mobile = $row['Mobile'];
            $DOB = $row['Date_Of_Birth'];
            $DL = $row['Driving_Licence'];
            $EX = $row['Expiration_date'];
            $AN = $row['AadharCard'];
            $Ph = $row['Image'];
        }
        ?>
        <div class="container emp-profile">
            <form method="post">
                <div class="row">

                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5>
                                <?php echo $Email; ?>
                            </h5>
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
                                        <input type="text" name="fullname" class="form-control" placeholder="Full Name" onkeypress="return (event.charCode > 64 &&
                                                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)" value="<?php echo $Name; ?>" required readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>DOB</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" name="DOB" id="DOB" class="form-control" placeholder="dd-mm-yyyy" required value="<?php echo $DOB; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>AadharCard No</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="Aadharcard" class="form-control Aadharcard" placeholder="000000000000" required value="<?php echo $AN; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Driving licence</label>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" name="licence_number" id="licence_number" class="form-control licence_number" placeholder="GJ0000000000000" maxlength="15" required value="<?php echo $DL; ?>"readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Driving Licence Expiration Date</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" name="licence_expiration" id="licence_expiration" class="form-control licence_number" min="2023-01-01" max="2040-12-31" maxlength="15" value="<?php echo $EX; ?>" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="MobileNo" id="MobileNo" class="form-control MobileNo" placeholder="Mobile Number" required maxlength="10" value="<?php echo $mobile; ?>" >
                                    </div>
                                </div>

                            </div>


                            <div class="col-md-3">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="cancel-btn mr-2" onclick="cancelUpdate()">Cancel</button>
                                    <input type="submit" class="update-btn profile-edit-btn" name="btnupdate" value="Update Profile" />
                                </div>
                            </div>
                            <script>
                                function cancelUpdate() {
                                    window.history.back();
                                }
                            </script>



                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnupdate'])) {
                            $D = $_POST['DOB'];
                            $E = $_POST['licence_expiration'];
                            $N=$_POST['fullname'];
                            $AD=$_POST['Aadharcard'];
                            $L=$_POST['licence_number'];
                            $C=$_POST['MobileNo'];

                            $update = "UPDATE `customer` SET `Name`='".$N."',`Mobile`='".$C."',`Date_Of_Birth`='".$D."',`Driving_Licence`='".$L."',`AadharCard`='".$AD."',`Expiration_date`='".$E."' WHERE `Email`='$Email'";
                            $query7 = mysqli_query($conn, $update);

                            if (!$query7) {
                                echo "Profile update failed: " . mysqli_error($conn);
//                                header('location:profile.php');
                                // Update successful
//                                echo "Profile updated successfully.";
                               
                            } else {
                                // Update failed
                                echo 'PIN';
                              echo '<script>window.location.href = "profile.php";</script>';
                                // header('location:profile.php'); // It might be better not to redirect in case of an error
                            }
                        }
                            ?>
                        </div>
                        <div class = "tab-pane fade" id = "profile" role = "tabpanel" aria-labelledby = "profile-tab">
                            <div class = "row">
                                <div class = "col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class = "col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-6">
                                    <label>Hourly Rate</label>
                                </div>
                                <div class = "col-md-6">
                                    <p>10$/hr</p>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-6">
                                    <label>Total Projects</label>
                                </div>
                                <div class = "col-md-6">
                                    <p>230</p>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-6">
                                    <label>English Level</label>
                                </div>
                                <div class = "col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-6">
                                    <label>Availability</label>
                                </div>
                                <div class = "col-md-6">
                                    <p>6 months</p>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-12">
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

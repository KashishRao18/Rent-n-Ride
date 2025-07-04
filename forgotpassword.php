<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Change Password</title>
        <link href="Admin/css/styles.css" rel="stylesheet"/>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        include './DatabaseConnection.php';
//        include './Sessionwithoutlogin.php';
        ?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Change Password</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Email" name="Email" type="email"
                                                       placeholder="name@example.com"/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <span id="email1"></span>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Opassword" name="Opassword" type="password" placeholder="Old Password"/>
                                                <label for="Opassword">Old Password</label>
                                            </div>
                                            <span id="Opass"></span>

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Npassword" name="Npassword" type="password" placeholder="New Password"/>
                                                <label for="Npassword">New Password</label>
                                            </div>
                                            <span id="Npass"></span>

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Cpassword" name="Cpassword" type="password" placeholder="Confirm Password"/>
                                                <label for="Cpassword">Confirm Password</label>
                                            </div>
                                            <span id="Cpass"></span>
                                            <div class="d-grid gap-2">
                                                <input type="submit" name="updatepassword" id="submit" class="btn btn-primary btn-lg"
                                                       value="Change Password">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script>
            function email() {
                $("#email1").append("Please enter a valid email id!.");
                $("#email1").css("color", "red");
            }

            function Npass() {
                $("#Npass").append("Password must be at least 8 characters and contain at least one number and one special symbol.");
                $("#Npass").css("color", "red");
            }

            function Opassword() {
                $("#Opass").append("Please enter a valid Old password!.");
                $("#Opass").css("color", "red");
            }

            function Cpass() {
                $("#Cpass").append("Passwords do not match.");
                $("#Cpass").css("color", "red");
            }
        </script>
        <?php
       
        if (isset($_POST['updatepassword'])) {
            $Customer_email_id = $_POST['Email'];
            $Npassword = $_POST['Npassword'];
            $Cpassword = $_POST['Cpassword'];

            $uppercase = preg_match('@[A-Z]@', $Npassword);
            $lowercase = preg_match('@[a-z]@', $Npassword);
            $number = preg_match('@[0-9]@', $Npassword);
            $specialChars = preg_match('@[^\w]@', $Npassword);

            $sql = $conn->prepare("SELECT * FROM customer WHERE Email = ? AND Password = ?");
            $sql->bind_param("ss", $Customer_email_id, $_POST['Opassword']);
            $sql->execute();
            $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

            if (count($result) > 0) {
                if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($Npassword) < 8) {
                    echo "<script>alert('Password must be at least 8 characters and contain at least one number and one special symbol.')</script>";
                    echo "<script>Npass();</script>";
                } else {
                    if ($Npassword == $Cpassword) {
                        $updatePassword = $conn->prepare("UPDATE customer SET Password = ? WHERE Email = ?");
                        $updatePassword->bind_param("ss", $Npassword, $Customer_email_id);
                        $update = $updatePassword->execute();

                        if ($update > 0) {
                            echo "<script>window.location.href='index.php'</script>";
                        } else {
                            echo "<script>alert('$conn->error');</script>";
                        }
                    } else {
                        echo "<script>Cpass();</script>";
                        echo "<script>alert('Passwords do not match.')</script>";
                    }
                }
            } else {
                echo '<script>Opassword();</script>';
                echo "<script>alert('Please enter valid Old password!.')</script>";
            }
        }
        $conn->close();
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

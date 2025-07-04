<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Car | Add</title>
        <meta name="description" content="Add Car"/>
        <meta name="author" content="Add Car"/>
    </head>
    <body>
        <?php
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';

//        function mimg(){
//            $Mimg=$_POST['Image1'];
//            $i=1;
//            while ($i<=$Mimg) {
//                echo "<div class='form-floating mb-3'>";
//                echo "<input type='file' name='Image_$i' id='Image_$i' accept='image/*' class='form-control'>";
//                echo " <label for='Image_$i'>Image</label>";
//                echo "</div>";
//                $i++;
//            }
//        }
        ?>
        <div id="layoutSidenav_content">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Add Car
                </div>
                <div class="card-body" style="padding-left: 150px;padding-right: 150px;">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="R_no" name="R_no" type="text" placeholder="MH03AH6414" maxlength="10" minlength="10" REQUIRED>
                            <label for="R_no">Registration No</label>
                            <span id="RegistrationNo"> </span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Car_name" name="Car_name" type="text"
                                   onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33) || (event.charCode > 47 && event.charCode < 58)"
                                   placeholder="Car Name" REQUIRED>
                            <label for="Car_name">Car Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Car_brand" name="Car_brand" type="text"
                                   onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
                                   placeholder="Car Brand" REQUIRED>
                            <label for="Car_brand">Car Brand</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="ModelYear" name="ModelYear" type="text"
                                   onkeypress="return (event.charCode > 47 && event.charCode < 58)" maxlength="4"
                                   placeholder="Car Model Year" REQUIRED>
                            <label for="Car_brand">Car Model Year</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" name="Image" id="Image" accept="image/*" class="form-control">
                            <label for="Image">Image</label>
                        </div>
                        <!--                        <div class="form-floating mb-3">-->
                        <!--                            <input type="checkbox" name="Multipalimg" value="Multipalimg" id="Multipalimg" onclick="Addimg();">can you add multipal img?-->
                        <!--                        </div>-->
                        <div class="form-floating mb-3" id="Mimg" style="display: none;">
                            <input type="text" name="Image1" placeholder="only enter 1 to 3" id="Image1" class="form-control"
                                   onkeypress="return (event.charCode > 48 && event.charCode < 52)" maxlength="1" onclick="showmul();">
                            <label for="Image1">Image</label>

                        </div>
                        <script>
                            function Addimg() {
                                var Mimg = document.getElementById("Mimg");
                                var val = document.getElementById("Multipalimg").checked;

                                if (val) {
                                    Mimg.style.display = "block";

                                } else {
                                    Mimg.style.display = "none";
                                }
                            }
                        </script>
                        <!--                        <div class="form-floating mb-3">-->
                        <!--                            <select class="form-select" id="City" aria-label="Default select example" name="City" required>
                        <?php
//                                $query = "SELECT * FROM city";
//                                $result = $conn->query($query);
//                                $id = 1;
//                                while ($row = mysqli_fetch_array($result)) {
//                                    $city = $row['City'];
//                                    
                        ?>
                                                            <option id='tr_//<?= $id ?>'>
                                                                //<?= $city; ?>
                                                            </option>
                                                            //<?php
//                                    $id++;
//                                }
                        ?>
                                                    </select>-->
                        <!--                            <label for="Role">City</label>
                                                </div>-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="city" name="city" type="text" placeholder="city" REQUIRED>
                            <label for="city">City</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="Category_id">
                                <?php
                                $query = "SELECT * FROM car_category";
                                $result = $conn->query($query);
                                $id = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    $Category_name = $row['Category_Name'];
                                    $Category_id = $row['Category_Id'];
                                    ?>
                                    <option id='tr_<?= $id ?>' value='<?= $Category_id ?>'>
                                    <?= $Category_name ?>
                                    </option>
                                    <?php
                                    $id++;
                                }
                                ?>
                            </select>
                            <label for="Category_id">Category Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Policy_No" name="Policy_No" type="text" placeholder="Policy No" REQUIRED>
                            <label for="Policy_No">Policy No</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="Car_hire_cost" name="Car_hire_cost" type="text"
                                   onkeypress="return (event.charCode > 47 && event.charCode < 58)" placeholder="Car Hire Cost"
                                   required>
                            <label for="Car_hire_cost">Car Hire Cost</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="Car_Speed" name="Car_Speed" type="text" placeholder="Car Speed" REQUIRED>
                            <label for="Car_name">Car Speed</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="Car_Status" name="Car_Status">
                                <option selected>Active</option>
                                <option>Deactive</option>
                            </select>
                            <label for="Car_Status">Car Status</label>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" name="Carsubmit" id="Carsubmit" class="btn btn-primary btn-lg" value="Add Car">
                        </div>
                    </form>
                </div>
                <script>
                    function alreadyexistRegistrationNo() {
                        $("#RegistrationNo").append("This Car Registration No is already exist!");
                        $("#RegistrationNo").css("color", "red");
                    }

                    $("#R_no").keyup(function (e) {
                        $("#ErrorR_no").html('');

                        var validstr = '';
                        var dInput = $(this).val();
                        var numpattern = /^\d+$/;
                        var alphapattern = /^[A-Z]+$/;

                        for (var i = 0; i < dInput.length; i++) {

                            if ((i == 2 || i == 3 || i == 6 || i == 7 || i == 8 || i == 9)) {
                                if (numpattern.test(dInput[i])) {
                                    // console.log('validnum' + dInput[i]);
                                    validstr += dInput[i];
                                } else {
                                    $("#ErrorR_no").html("Only Digits").show();

                                }
                            }

                            if ((i == 0 || i == 1 || i == 4 || i == 5)) {
                                if (alphapattern.test(dInput[i])) {
                                    // console.log('validword' + dInput[i]);
                                    validstr += dInput  [i];
                                } else {
                                    $("#ErrorR_no").html("Only Capital Alpahbets").show();

                                }
                            }

                        }

                        $(this).val(validstr);
                        return false;
                    });
                </script>
                <?php
                if (isset($_POST['Carsubmit'])) {
                    $R_no = $_POST['R_no'];
                    $Car_name = $_POST['Car_name'];
                    $Car_brand = $_POST['Car_brand'];
                    $ModelYear = $_POST['ModelYear'];
                    $City = $_POST['City'];
                    $Car_Status = $_POST['Car_Status'];
                    $Car_hire_cost = $_POST['Car_hire_cost'];
                    $Category_id = $_POST['Category_id'];
                    $Car_Speed = $_POST['Car_Speed'];
                    $Policy_No = $_POST['Policy_No'];

                    $Img = $_FILES['Image']['name'];
//                    if (len($R_no) == 10) {
                    $CheckP = $conn->prepare("SELECT * FROM car WHERE Registration_No = ?");
                    $CheckP->bind_param("s", $R_no);
                    $result = $CheckP->execute();
                    $result = $CheckP->get_result()->fetch_all(MYSQLI_ASSOC);

                    if (!count($result) > 0) {

                        $extension = pathinfo($_FILES["Image"]["name"], PATHINFO_EXTENSION);
                        $imgname = $R_no . "." . $extension;

                        $car = $conn->prepare("INSERT INTO car VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                        $car->bind_param("ssssssssiss", $R_no, $Car_name, $Car_brand, $ModelYear, $imgname, $City, $Category_id, $Car_Status, $Car_hire_cost, $Car_Speed, $Policy_No);
                        $Addcar = $car->execute();

                        if ($Addcar > 0) {
                            move_uploaded_file($_FILES["Image"]["tmp_name"], "CarImg/" . $imgname);
                            echo "<script>window.location.href='Car.php'</script>";
                        } else {
                            echo "<script> alert('$conn->error');</script>";
                        }
                    } else {
                        echo "<script>alreadyexistRegistrationNo();</script>";
                    }
//                    } else {
//                        echo "<script>alert('invalid car number');</script>";
//                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>

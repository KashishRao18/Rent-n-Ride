<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Car | Edit</title>
        <meta name="description" content="Edit Category"/>
        <meta name="author" content="Edit Category"/>
        <style>
            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
            .succWrap{
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
        </style>
    </head>
    <body>
        <?php
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';

        $car = base64_decode(strval($_GET['Rid']));
        $query = $conn->prepare("SELECT * FROM car where Registration_No=?");
        $query->bind_param("s", $car);
        $result = $query->execute();
        $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
        foreach ($result as $row) {
            $R_no = $row['Registration_No'];
            $Car_name = $row['Name'];
            $Car_brand = $row['Brand'];
            $ModelYear = $row['ModelYear'];
            $Image = $row['Image'];
            $City = $row['City'];
            $Category_id = $row['Category_Id'];
            $Car_Status = $row['Status'];
            $Car_hire_cost = $row['Hire_Cost'];
            $Speed = $row['Speed'];
            ?>
            <div id="layoutSidenav_content">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Edit Car
                    </div>
                    <div class="card-body" style="padding-left: 150px;padding-right: 150px;">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="R_no" name="R_no" type="text" placeholder="MH03AH6414" value="<?= $R_no; ?>" disabled="disabled" REQUIRED>
                                <label for="R_no">Registration No</label>
                                <span id="RegistrationNo"></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="Car_name" name="Car_name" type="text"
                                       onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33) || (event.charCode > 47 && event.charCode < 58)"
                                       placeholder="Car Name"  value="<?= $Car_name; ?>" REQUIRED>
                                <label for="Car_name">Car Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="Car_brand" name="Car_brand" type="text"
                                       onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
                                       placeholder="Car Brand" value="<?= $Car_brand; ?>" REQUIRED>
                                <label for="Car_brand">Car Brand</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="ModelYear" name="ModelYear" type="text"
                                       onkeypress="return (event.charCode > 47 && event.charCode < 58)" maxlength="4"
                                       placeholder="Car Model Year"  value="<?= $ModelYear; ?>" REQUIRED>
                                <label for="Car_brand">Car Model Year</label>
                            </div>
                            <div class="form-floating mb-3">
                                <img src="CarImg/<?php echo $Image; ?>" width="100px" height="100px">
                            </div>
                            <!--<div class="form-floating mb-3">-->
    <!--                                <select class="form-select" id="City" aria-label="Default select example" name="City" required>
                            <?php
//                                    $query = "SELECT * FROM city";
//                                    $result = $conn->query($query);
//                                    $id = 1;
//                                    while ($row = mysqli_fetch_array($result)) {
//                                        $city = $row['City'];
//                                        
                            ?>
                                        <option id='tr_//<?= $id ?>'>
                                            //<?= $city; ?>
                                        </option>
                                        //<?php
//                                        $id++;
//                                    }
                            ?>
                                </select>-->
                            <!--                                <label for="Role">city</label>
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
                                       value="<?= $Car_hire_cost; ?>" required>
                                <label for="Car_hire_cost">Car Hire Cost</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="Car_Speed" name="Car_Speed" type="text" placeholder="Car Speed" value="<?= $Speed; ?>" REQUIRED>
                                <label for="Car_name">Car Speed</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="Car_Status" name="Car_Status">
                                    <?php
                                    if ($Car_Status == 'Deactive') {
                                        echo "<option>Active</option><option selected>Deactive</option>";
                                    } else {
                                        echo "<option selected>Active</option><option>Deactive</option>";
                                    }
                                    ?>
                                </select>
                                <label for="Car_Status">Car Status</label>
                            </div>
                            <div class="d-grid gap-2">
                                <input type="submit" name="Carupdate" id="Carupdate" class="btn btn-primary btn-lg" value="Update Car">
                            </div>
                        </form>
                <?php } ?>
                </div>
                <?php
                if (isset($_POST['Carupdate'])) {
                    $Car_name = $_POST['Car_name'];
                    $Car_brand = $_POST['Car_brand'];
                    $ModelYear = $_POST['ModelYear'];
                    $City = $_POST['City'];
                    $Category_id = $_POST['Category_id'];
                    $Car_Status = $_POST['Car_Status'];
                    $Car_hire_cost = $_POST['Car_hire_cost'];
                    $Speed = $_POST['Car_Speed'];
                    $Policy_No = $_POST['Policy_No'];

                    $UpdateCar = $conn->prepare("UPDATE car SET Name=?,Brand=?,ModelYear=?,City=?,Category_Id=?,Status=?,Hire_Cost=?,Speed=?,Policy_No=? WHERE Registration_No=?");
                    $UpdateCar->bind_param("ssssssssss", $Car_name, $Car_brand, $ModelYear, $City, $Category_id, $Car_Status, $Car_hire_cost, $Speed, $Policy_No, $R_no);
                    $Update = $UpdateCar->execute();
                    if ($Update > 0) {
                        $msg = "Your Password succesfully changed";
                        echo "<script>window.location.href='Car.php'</script>";
                    } else {
                        $error = "Your current password is wrong";
                        echo "<script> alert('$conn->error');</script>";
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Car Category | Edit</title>
        <meta name="description" content="Edit Category"/>
        <meta name="author" content="Edit Category"/>
    </head>
    <body>
        <?php
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';

        $Categoryid = base64_decode(strval($_GET['id']));
        $query = $conn->prepare("SELECT * FROM car_category where Category_Id=?");
        $query->bind_param("s", $Categoryid);
        $result = $query->execute();
        $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
        foreach ($result as $row) {
            $id = $row['Category_Id'];
            $name = $row['Category_Name'];
            $categorySeats = $row['Seats'];
            $categoryFuel = $row['Fuel'];
            $categoryTransmission = $row['Transmission'];
        }
        ?>
        <div id="layoutSidenav_content">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit Category
                </div>
                <div class="card-body" style="padding-left: 150px;padding-right: 150px;">
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Category_id" name="Category_id" type="text"
                                   placeholder="Category Id"
                                   onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 47 && event.charCode < 58)"
                                   MAXLENGTH="10" value="<?php echo $id; ?>" disabled="disabled" required/>
                            <label for="Category_id">Category Id</label>
                        </div>
                        <div class="form-floating mb-3">
                             <?php
//                               
                                $name=$_POST['Category_Name'];
                                
                                ?>
                            <input type="text" class="form-control" name="Category_name" value="<?php echo "$name";?>" required>
                               
                           
                            <label for="Category_name">Category Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="Seats" required>
                                <?php
                                if ($categorySeats == '4') {
                                    echo "<option selected>4</option><option>5</option><option>6</option><option>7</option><option>8</option>";
                                } elseif ($categorySeats == '5') {
                                    echo "<option>4</option><option selected>5</option><option>6</option><option>7</option><option>8</option>";
                                } elseif ($categorySeats == '6') {
                                    echo "<option>4</option><option>5</option><option selected>6</option><option>7</option><option>8</option>";
                                } elseif ($categorySeats == '7') {
                                    echo "<option>4</option><option>5</option><option>6</option><option selected>7</option><option>8</option>";
                                } else {
                                    echo "<option>4</option><option>5</option><option>6</option><option>7</option><option selected>8</option>";
                                }
                                ?>
                            </select>
                            <label for="Seats">Seats</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="Fuel" required>
                                <?php
                                if ($categoryFuel == 'Petrol') {
                                    echo "<option selected>Petrol</option><option>CNG</option><option>Diesel</option><option>Electric</option>";
                                } elseif ($categoryFuel == 'CNG') {
                                    echo "<option>Petrol</option><option selected>CNG</option><option>Diesel</option><option>Electric</option>";
                                } elseif ($categoryFuel == 'Diesel') {
                                    echo "<option>Petrol</option><option>CNG</option><option selected>Diesel</option><option>Electric</option>";
                                } else {
                                    echo "<option>Petrol</option><option>CNG</option><option>Diesel</option><option selected>Electric</option>";
                                }
                                ?>
                            </select>
                            <label for="Fuel">Fuel</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="Transmission" required>
                                <?php
                                if ($categoryTransmission == 'Manual') {
                                    echo "<option selected>Manual</option><option>Automatic</option>";
                                } else {
                                    echo "<option>Manual</option><option selected>Automatic</option>";
                                }
                                ?>
                            </select>
                            <label for="Transmission">Transmission</label>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" name="UpdateCategory" id="UpdateCategory" class="btn btn-primary btn-lg"
                                   value="Update Category">
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_POST['UpdateCategory'])) {
                    $Category_id = $_POST['Category_id'];
                    $Category_name = $_POST['Category_name'];
                    $Seats = $_POST['Seats'];
                    $Fuel = $_POST['Fuel'];
                    $Transmission = $_POST['Transmission'];

                    $UpdateCategory = $conn->prepare("UPDATE car_category SET Category_name=?,Seats=?,Fuel=?,Transmission=? WHERE Category_id=?");
                    $UpdateCategory->bind_param("sssss", $Category_name, $Seats, $Fuel, $Transmission, $Categoryid);
                    $Update = $UpdateCategory->execute();
                    if ($Update > 0) {
                        echo "<script>window.location.href='CarCategory.php'</script>";
                    } else {
                        echo "<script> alert('$conn->error');</script>";
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>

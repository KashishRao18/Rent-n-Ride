<?php
include './DatabaseConnection.php';
include './Sessionwithoutlogin.php';
include './header.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Car</title>
    </head>
    <body>
        <script>
            function Checkboxseleted() {
                alert('please Select any one check box!');
            }
            $(document).ready(function () {
                $('#Car').DataTable();
            });
        </script>
        <div id="layoutSidenav_content">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Car
                </div>
<?php
if (isset($_GET["Status"]) && $_GET["Status"] == 'Deactive') {
    $id = $_GET["id"];
    // Activate user
    $sql = "UPDATE car SEt Status= 'active' WHERE Registration_no = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location.href='Car.php'</script>";
    } else {
        echo "Error activating user: " . mysqli_error($conn);
    }
}


if (isset($_GET["Status"]) && $_GET["Status"] == 'active') {
    $id = $_GET["id"];
    // Activate user
    $sql = "UPDATE car SEt Status= 'Deactive' WHERE Registration_No = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location.href='Car.php'</script>";
    } else {
        echo "Error activating user: " . mysqli_error($conn);
    }
}
?>

                <form method="post">
                    <div class="card-body">

                        <table  id="Car" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                                <tr style=" position: sticky;">
                                    <th scope="col"></th>
                                    <th scope="col">Registration<br/>No</th>
                                    <th scope="col">Car<br/>Name</th>
                                    <th scope="col">Car<br/>Brand</th>
                                    <th scope="col">Model<br/>Year</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Category<br/>Id</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Hire<br/>Cost</th>
                                    <th scope="col">Mileage</th>
                                    <th scope="col">Booking Status</th>
                                    <th scope="col">Policy No</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
<!--                            <tfoot>
                                <tr   style=" position: sticky;">
                                    <th scope="col"></th>
                                    <th scope="col">Registration no</th>
                                    <th scope="col">Car name</th>
                                    <th scope="col">Car brand</th>
                                    <th scope="col">Model Year</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Category id</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Car hire cost</th>
                                    <th scope="col">Speed</th>
                                    <th scope="col"></th>
                                </tr>
                            </tfoot>-->
                            <tbody>
<?php
$query = "SELECT * FROM car";
$result = $conn->query($query);
while ($row = mysqli_fetch_array($result)) {
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
    $Policy_No = $row['Policy_No']
    ?>
                                    <tr id='tr_<?= $id ?>'>
                                        <td><input type='checkbox' name='delete[]' value='<?= $R_no ?>'></td>
                                        <td><?= $R_no ?></td>
                                        <td><?= $Car_name ?></td>
                                        <td><?= $Car_brand ?></td>
                                        <td><?= $ModelYear ?></td>
                                        <td>
                                            <img src="CarImg/<?php echo $Image; ?>" width="100px" height="100px"><br/>
    <?php // echo $Image  ?>
                                        </td>
                                        <td><?= $City ?></td>
                                        <td><?= $Category_id ?></td>
                                        <td>
    <?php
    if ($Car_Status == 'Deactive') {
        echo "<a href='Car.php?id=$R_no&Status=Deactive'><span class='badge badge-secondary'>$Car_Status</span></a>";
    } else {
//                                                echo "<a href='function.php?id=$R_no&Status=active'><span class='badge badge-success'>$Car_Status</span></a>";
        echo "<a href='Car.php?id=$R_no&Status=active'><span class='badge badge-success'>$Car_Status</span></a>";
    }
    ?>
                                        </td>
                                        <td><?= $Car_hire_cost ?></td>
                                        <td><?= $Speed ?></td>
                                        <td>
    <?php
    $current_date = date("Y-m-d");
    $sql1234 = "SELECT car.Registration_No, booking.Registration_No,booking.End_Date  FROM car INNER JOIN booking ON car.Registration_No = booking.Registration_No WHERE car.Registration_No = '$R_no'";
    $result123 = mysqli_query($conn, $sql1234);
    $row12 = mysqli_fetch_assoc($result123);
    $end_date = $row12['End_Date'];

    if ($end_date < $current_date) {
        echo "<span class='badge badge-success'>Not Booked</spen>";
    } else {

        echo "<span class='badge badge-danger'>Booked </span>";
    }
    ?>
                                        </td>
                                        <td><?= $Policy_No ?></td>
                                        <td><a href="editCar.php?Rid=<?= base64_encode($R_no); ?>"><i class="fa fa-edit"></i></a></td>
                                    </tr>
    <?php
//                                    $id++;
}
?>
                            </tbody>
                        </table>
                        <a href="AddCar.php" class="btn btn-primary">+Add Car</a>
                        <input type="submit" class="btn btn-primary" name="Car_delete" id="but_delete" value="Delete Car">
<?php
if (isset($_POST['Car_delete'])) {

    if (isset($_POST['delete'])) {
        foreach ($_POST['delete'] as $deleteid) {
//                                    $query = "SELECT * FROM car";
//                                    $result = $conn->query($query);
//                                    foreach ($result as $row) {
//                                        $Image = $row['Image'];
//                                    }
            $deleteCar = $conn->prepare("DELETE from car WHERE Registration_No=?");
            $deleteCar->bind_param("s", $deleteid);
            $deleteCar->execute();
        }
//                                unlink("CarImg/$Image");
        echo "<script>window.location.href='car.php'</script>";
    } else {
        echo '<script>Checkboxseleted();</script>';
    }
}
?>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
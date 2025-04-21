<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Booking</title>
    </head>
    <body>
        <?php
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';
        ?>
        <script>
            function Checkboxseleted() {
                alert('please Select any one check box!');
            }
            $(document).ready(function () {
                $('#Booking').DataTable();
            });
        </script>
        <div id="layoutSidenav_content">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Booking
                </div>
                <form method="post">
                    <div class="card-body">
                        <table  id="Booking" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                                <tr style=" position: sticky;">
                                    <!--<th scope="col"></th>-->
                                    <th scope="col">Email Id</th>
                                    <th scope="col">Registration no</th>
                                    <th scope="col">Start date</th>
                                    <th scope="col">End date</th>
                                   <th scope="col">Start meter</th>
                                    <th scope="col">end meter</th>
                                    <th scope="col">start time</th>
                                    <th scope="col">End time</th>
                                    <th scope="col">Security deposit</th>
                                    <th scope="col">Booking amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
<!--                            <tfoot>
                                <tr style=" position: sticky;">
                                    <th scope="col"></th>
                                    <th scope="col">Email Id</th>
                                    <th scope="col">Registration no</th>
                                    <th scope="col">Start date</th>
                                    <th scope="col">End date</th>
                                    <th scope="col">Start meter</th>
                                    <th scope="col">end meter</th>
                                    <th scope="col">start time</th>
                                    <th scope="col">End time</th>
                                    <th scope="col">Security deposit</th>
                                    <th scope="col">Booking amount</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </tfoot>-->
                            <tbody>
                                <?php
                                $query = "SELECT * FROM booking";
                                $result = $conn->query($query);
                                while ($row = mysqli_fetch_array($result)) {
                                    $bookingId = $row['Booking_Id'];
                                    $Email_id = $row['Email'];
                                    $Booking_start_date = $row['Start_Date'];
                                    $Booking_end_date = $row['End_Date'];
                                    $Start_meter = $row['Start_Meter'];
                                    $End_meter = $row['End_Meter'];
                                    $Start_time = $row['Start_Time'];
                                    $End_time = $row['End_Time'];
                                    $Security_deposit = $row['Security_Deposit'];
                                    $Booking_amount = $row['Amount'];
                                    $R_no = $row['Registration_No'];
                                    $CheckP = $conn->prepare("SELECT * FROM car WHERE Registration_No = ?");
                                    $CheckP->bind_param("s", $R_no);
                                    $result1 = $CheckP->execute();
                                    $result1 = $CheckP->get_result()->fetch_all(MYSQLI_ASSOC);
                                    foreach ($result1 as $row1) {
                                        $img = $row1['Image'];
                                    }

                                    $current_date = date('Y-m-d');

                                    if ($current_date < $Booking_start_date) {
//
                                        $booking_status = 'Pending';
                                    } elseif ($current_date >= $Booking_start_date && $current_date <= $Booking_end_date) {
                                        $booking_status = 'Current';
                                    } elseif ($current_date > $Booking_end_date) {
                                        $booking_status = 'Completed';
                                    }

                                    $sql_update = "UPDATE booking SET Status='$booking_status' WHERE  Booking_Id ='$bookingId'";
                                    if ($conn->query($sql_update) === TRUE) {

                                    } else {
                                        echo "<script>alert(Error updating booking record: . $conn->error)</script>";
                                    }

                                    $Status = $row['Status'];
                                    ?>
                                    <tr id='tr_<?= $id ?>'>
                                        <!--<td><input type='checkbox' name='delete[]' value='<?= $R_no ?>'></td>-->
                                        <td><?= $Email_id ?></td>
                                        <td>
                                            <img src="CarImg/<?php echo $img; ?>" width="100px" height="100px"><br/>
                                            <?= $R_no ?>
                                        </td>
                                        <td><?= $Booking_start_date ?></td>
                                        <td><?= $Booking_end_date ?></td>
                                    <td><?= $Start_meter ?></td>
                                        <td><?= $End_meter ?></td>
                                        <td><?= $Start_time ?></td>
                                        <td><?= $End_time ?></td>
                                        <td><?= $Security_deposit ?></td>
                                        <td><?= $Booking_amount ?></td>
                                        <td>
                                            <?php
                                            if ($Status == 'Current') {
                                                echo "<span class='badge badge-primary'>$Status</span>";
                                            } elseif ($Status == 'Completed') {
                                                echo "<span class='badge badge-success' >$Status</span>";
                                            }elseif ($Status == 'Pending') {
                                                echo "<span class='badge badge-warning' >$Status</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                        <?php
                                           if ($Status == 'Completed') {

                                           }elseif ($Status == 'Pending') {
                                           }elseif ($Status == 'Current') {
                                            ?><a href="editBooking.php?Bid=<?= base64_encode($bookingId); ?>"><i class="fa fa-edit"></i></a>';
                                         <?php  }
                                        ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $id++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <!--                <a href="AddCar.php" class="btn btn-primary">+Add Car</a>-->
                        <!--                <input type="submit" class="btn btn-primary" name="Car_delete" id="but_delete" value="Delete Car">-->
                        <!--                --><?php
//                if (isset($_POST['Car_delete'])) {
//
//                    if (isset($_POST['delete'])) {
//                        foreach ($_POST['delete'] as $deleteid) {
//                            $query = "SELECT Image FROM car";
//                            $result = $conn->query($query);
//                            $Image = $row['Image'];
//
//                            unlink("CarImg/$Image");
//
//                            $deleteCar = $conn->prepare("DELETE from car WHERE Registration_no=?");
//                            $deleteCar->bind_param("s", $deleteid);
//                            $deleteCar->execute();
//                        }
//                        echo "<script>window.location.href='car.php'</script>";
//                    } else {
//                        echo '<script>Checkboxseleted();</script>';
//                    }
//                }
//
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
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

$Bid = base64_decode(strval($_GET['Bid']));
$query = $conn->prepare("SELECT * FROM booking where Booking_Id=?");
$query->bind_param("s", $Bid);
$result = $query->execute();
$result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
foreach ($result as $row) {
    $bookingId = $row['Booking_Id'];
    $Email_id = $row['Email'];
    $Booking_start_date = $row['Start_Date'];
    $Booking_end_date = $row['End_Date'];
    $Start_meter = $row['Start_Meter'];
    $End_meter = $row['End_Meter'];
    $Start_time = $row['Start_Time'];
    $End_time = $row['End_Time'];
    $Security_deposit = $row['Security_Deposit'];
    $Selected_Kms = $row['Selected_Kms'];
    $Offer =$row['Offer'];
    $Booking_Date = $row['Booking_Date'];
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
<div id="layoutSidenav_content">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Car
        </div>
        <div class="card-body" style="padding-left: 150px;padding-right: 150px;">
            <form method="post" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input class="form-control" value="<?= $bookingId; ?>" disabled="disabled">
                    <label>Booking No</label>
                    <span id="RegistrationNo"></span>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" value="<?= $R_no; ?>" disabled="disabled">
                    <label>Registration No</label>
                    <span id="RegistrationNo"></span>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" disabled="disabled"  value="<?= $Email_id; ?>">
                    <label>Cutomer Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" disabled="disabled" value="<?= $Booking_start_date; ?>">
                    <label>Booking Start Date</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" disabled="disabled" value="<?= $Booking_end_date; ?>">
                    <label>Booking End Date</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="Start_Meter" name="Start_Meter" type="text"
                           onkeypress="return (event.charCode > 47 && event.charCode < 58)"
                           placeholder="Start Meter" value="<?= $Start_meter ?>">
                    <label for="Start_Meter">Start Meter</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="End_Meter" name="End_Meter" type="text"
                           onkeypress="return (event.charCode > 47 && event.charCode < 58)"
                           placeholder="End Meter" value="<?= $End_meter ?>">
                    <label for="Start_Meter">End Meter</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" disabled="disabled" value="<?= $Start_time; ?>">
                    <label>Booking Start Time</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" disabled="disabled" value="<?= $End_time; ?>">
                    <label>Booking End Time</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" disabled="disabled" value="<?= $Security_deposit; ?>">
                    <label>Security Deposit</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" disabled="disabled" value="<?= $Selected_Kms; ?>">
                    <label>Selected Kms</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" disabled="disabled" value="<?= $Offer; ?>">
                    <label>Offer</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" disabled="disabled" value="<?= $Booking_amount; ?>">
                    <label>Amount</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" disabled="disabled" value="<?= $Booking_Date; ?>">
                    <label>Booking Date</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" disabled="disabled" value="<?= $Status; ?>">
                    <label>Status</label>
                </div>
                <div class="d-grid gap-2">
                    <input type="submit" name="Bookingupdate" id="Bookingupdate" class="btn btn-primary btn-lg" value="Update Booking">
                </div>
            </form>
            <?php } ?>
        </div>
        <?php
        if (isset($_POST['Bookingupdate'])) {
        $Start_Meter = $_POST['Start_Meter'];
        $End_Meter = $_POST['End_Meter'];

//

        $UpdateCar = $conn->prepare("UPDATE booking SET Start_Meter=?,End_Meter=? WHERE Booking_Id =?;");
        $UpdateCar->bind_param("sss", $Start_Meter, $End_Meter, $Bid);
        $Update = $UpdateCar->execute();
        if ($Update > 0) {
        echo "<script>window.location.href='booking.php'</script>";
        } else {
        echo "<script> alert('$conn->error');</script>";
        }
        }
        ?>
    </div>
</div>
</body>
</html>

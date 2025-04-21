<?php
include '../databaseConnection.php';

$availabilityStmt = $conn->prepare("CALL GetCarAvailabilityStatus()");
$availabilityStmt->execute();

// Get the result set from the GetCarAvailabilityStatus stored procedure
$availabilityResult = $availabilityStmt->get_result();

// Check if there are any available cars
if ($availabilityResult->num_rows > 0) {
    // Start building the available cars report
    $availableReport = '<h2>Available Cars</h2>
                        <table border="1" class="table table-bordered" id="dataTable">
                            <tr>
                                <th>No</th>
                                <th>Car ID</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Status</th>
                            </tr>';

    $i=1;
    // Loop through the results and add rows to the available cars report table
    while ($row = $availabilityResult->fetch_assoc()) {
        $car_id = $row["Registration_No"];
        $make = $row["Brand"];
        $model = $row["Name"];
        $status = $row["Availability_Status"];

        $availableReport .= '<tr>
                                <td>'.$i .'</td>
                                <td>'.$car_id.'</td>
                                <td>'.$make.'</td>
                                <td>'.$model.'</td>
                                <td>'.$status.'</td>
                            </tr>';
        $i++;
    }

    $availableReport .= '</table>';

} else {
    $availableReport = "<h2>Available Cars</h2><p>No available cars found.</p>";
}

$conn->close();
include '../databaseConnection.php';

// Execute the GetBookedCars stored procedure
$bookedStmt = $conn->prepare("CALL GetBookedCars()");
$bookedStmt->execute();

// Get the result set from the GetBookedCars stored procedure
$bookedResult = $bookedStmt->get_result();
$i=1;
// Check if there are any booked cars
if ($bookedResult->num_rows > 0) {
    // Start building the booked cars report
    $bookedReport = '<h2>Booked Cars</h2>
                     <table border="1" class="table table-bordered" id="dataTable">
                         <tr>
                            <tr>
                                <th>No</th>
                                <th>Car ID</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Status</th>
                            </tr>';

    // Loop through the results and add rows to the booked cars report table
    while ($row = $bookedResult->fetch_assoc()) {
        $car_id = $row["Registration_No"];
        $make = $row["Brand"];
        $model = $row["Name"];
        $status = "Booked";

        $bookedReport .= '<tr>
                          <td>'.$i .'</td>
                                <td>'.$car_id.'</td>
                                <td>'.$make.'</td>
                                <td>'.$model.'</td>
                                <td>'.$status.'</td>
                          </tr>';
    }

    $bookedReport .= '</table>';
} else {
    $bookedReport = '<h2>Booked Cars</h2>
  <p>No booked cars found.</p>';
}

echo $availableReport;


echo $bookedReport;
?>
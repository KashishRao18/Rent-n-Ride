<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta name="description" content="Dashborad"/>
        <meta name="author" content="Dashborad"/>
        <title>Dashboard</title>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/be19cf8b62.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <style type="text/css">
            body{
                margin-top:20px;
                background:#FAFAFA;
            }
            .order-card {
                color: #fff;
            }

            .bg-c-blue {
                background: linear-gradient(45deg,#4099ff,#73b4ff);
            }

            .bg-c-green {
                background: linear-gradient(45deg,#2ed8b6,#59e0c5);
            }

            .bg-c-yellow {
                background: linear-gradient(45deg,#FFB64D,#ffcb80);
            }

            .bg-c-pink {
                background: linear-gradient(45deg,#FF5370,#ff869a);
            }


            .card {
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
                box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
                border: none;
                margin-bottom: 30px;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }

            .card .card-block {
                padding: 25px;
            }

            .order-card i {
                font-size: 26px;
            }

            .f-left {
                float: left;
            }

            .f-right {
                float: right;
            }

            #calendar {
                width: 80%;
                height: 600px;
                margin: auto;
                font-size: 14px;
                color: #000000;

            .fc-toolbar.fc-header-toolbar > .fc-left,
            .fc-toolbar.fc-header-toolbar > .fc-center,
            .fc-toolbar.fc-header-toolbar > .fc-right {
                margin-right: 10px;
            }

            .fc-event-container a {
                color: #fff;
            }

            .fc-event-container a:hover {
                text-decoration: none;
            }

        </style>
    </head>
    <body class="sb-nav-fixed">
        <?php
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';
        ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <div class="row">
                        <?php
                        $customer = "SELECT * FROM customer";
                        $result = $conn->query($customer);
                        $Deactive = 0;
                        $active = 0;
                        $count = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $count++;
                            $curr_status = $row['Status'];
                            if ($curr_status == 'Deactive') {
                                $Deactive++;
                            } else {
                                $active++;
                            }
                        }
                        ?>
                        <div class="col-md-3 col-xl-3">
                            <div class="card bg-c-blue order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Happy Customer</h6>
                                    <h2 class="text-right"><span><?php echo $count; ?></span></h2><br/>
                                    <p class="m-b-0">Active Customer<span class="f-right"><?php echo $active; ?></span><br/> Inactive Customer<span class="f-right"><?= $Deactive; ?></span></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT * FROM car";
                        $result = $conn->query($sql);
                        $Deactive = 0;
                        $active = 0;
                        $count = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $count++;
                            $curr_status = $row['Status'];
                            if ($curr_status == 'Deactive') {
                                $Deactive++;
                            } else {
                                $active++;
                            }
                        }
                        ?>
                        <div class="col-md-3 col-xl-3">
                            <div class="card bg-c-green order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Total Car</h6>
                                    <h2 class="text-right"><span><?php echo $count; ?></span></h2><br/>
                                    <p class="m-b-0">Active Car<span class="f-right"><?php echo $active; ?></span>
                                        <br/>Inactive Car<span class="f-right"><?php echo $Deactive; ?></span></p>
                                </div>
                            </div>
                        </div>
                        <?php
//                        $sql = "SELECT * FROM booking";
//                        $booking_result = mysqli_query($conn, $sql);
                        //                        Current', 'Booking', 'Pending', 'Completed
                        $booking = "SELECT * FROM booking";
                        $booking1 = $conn->query($booking);
                        $counto = 0;
                        $Current = 0;
                        $Completed = 0;
                        $Pending = 0;
                        while ($row1 = mysqli_fetch_array($booking1)) {
                            $counto++;
                            $Status = $row1['Status'];
                            if ($Status == 'Current') {
                                $Current++;
                            } elseif ($Status == 'Completed') {
                                $Completed++;
                            } elseif ($Status == 'Pending') {
                                $Pending++;
                            }
                        }
                        ?>
                        <div class="col-md-3 col-xl-3">
                            <div class="card bg-c-pink order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Total Booking</h6>
                                    <h2 class="text-right"><?= $counto; ?></span></h2>
                                    <p class="m-b-0">Current Booking<span class="f-right"><?= $Current; ?></span>
                                        <br/>Pending Booking<span class="f-right"><?= $Pending; ?></span>
                                        <br/>Completed Booking<span class="f-right"><?= $Completed; ?></span></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT * FROM offer";
                        $result = $conn->query($sql);
                        $Deactiveo = 0;
                        $activeo = 0;
                        $counto = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $counto++;
                            $curr_status = $row['Status'];
                            if ($curr_status == 'Deactive') {
                                $Deactiveo++;
                            } else {
                                $activeo++;
                            }
                        }
                        ?>
                        <div class="col-md-3 col-xl-3">
                            <div class="card bg-c-yellow order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Total Offers</h6>
                                    <h2 class="text-right"><i class="fa-solid fa-percent f-left"></i><span><?php echo $counto; ?></span></h2><br/>
                                    <p class="m-b-0">Active Offers<span class="f-right"><?php echo $activeo; ?></span>
                                        <br/>Inactive Offers<span class="f-right"><?php echo $Deactiveo; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <section class="tps">
                    <div class="row">
                        <div class="col-sm" style="margin-left: 2rem;">
                            <h3 style="text-align: center">Pick up Cars Today</h3>


                            <table class="table" border="10" style="margin-top:3rem;margin-right: 1rem; " width="10px">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Car Number</th>
                                        <th scope="col">Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $date = date('Y-m-d');
                                    $sql = "SELECT * FROM booking WHERE Start_Date = '$date'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $total = 0;
                                        $i = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            $i++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= $row["Email"] ?></td>
                                                <td><?= $row["Registration_No"] ?></td>
                                                <td><?php
                                                    echo $row["Amount"];
//                                            $total = $row["Amount"] + $total;
                                                    ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                        <tr>
                                            <td style="text-align: center" colspan="4">No matching records found</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>




                        <div class="col-sm" style="margin-left: 2rem;margin-right: 1rem;">
                            <h3 style="text-align: center">Drop off Cars Today</h3>
                            <table class="table" border="10" style="margin-top:3rem; " width="10px">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Car Number</th>
                                        <th scope="col">Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $date = date('Y-m-d');
                                    $sql = "SELECT * FROM booking WHERE End_Date = '$date'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $total = 0;
                                        $i = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            $i++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= $row["Email"] ?></td>
                                                <td><?= $row["Registration_No"] ?></td>
                                                <td><?php
                                                    echo $row["Amount"];
                                                    $total = $row["Amount"] + $total;
                                                    ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                        <tr>
                                            <td style="text-align: center" colspan="4">No matching records found</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
<!--                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6" style="height: 400px;">
                                <h5 style="text-align: center">Number of cars booked monthly</h5>
                                <canvas id="booking-chart"></canvas>
                            </div>
                            <div class="col-md-6" style="height: 400px;">
                                <h5 style="text-align: center">Total Amount of booked Cars Monthly</h5>
                                <canvas id="booking-Amount-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </section>-->
                <script>
                    $(document).ready(function () {
                        // load the chart data using AJAX
                        $.ajax({
                            url: 'get_booking_data.php',
                            dataType: 'json',
                            success: function (data) {
                                // create the chart
                                var ctx = document.getElementById('booking-chart').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: data.labels,
                                        datasets: [{
                                                label: 'Booking Count',
                                                data: data.counts,
                                                backgroundColor: 'rgba(0, 128, 255, 0.2)',
                                                borderColor: 'rgba(0, 128, 255, 1)',
                                                borderWidth: 1
                                            }]
                                    },
                                    options: {
                                        responsive: true,
                                        scales: {
                                            yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                        }
                                    }
                                });
                            },
                            error: function () {
                                alert("error");
                            }
                        });
                    });
                </script>
                <script>
                    $(document).ready(function () {
                        // load the chart data using AJAX
                        $.ajax({
                            url: 'get_booking_Amount_chart.php',
                            dataType: 'json',
                            success: function (data) {
                                // create the chart
                                var ctx = document.getElementById('booking-Amount-chart').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: data.labels,
                                        datasets: [{
                                                label: 'Booking Amount Count',
                                                data: data.counts,
                                                backgroundColor: 'rgba(0, 128, 255, 0.2)',
                                                borderColor: '#f50404',
                                                borderWidth: 1
                                            }]
                                    },
                                    options: {
                                        responsive: true,
                                        scales: {
                                            yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                        }
                                    }
                                });
                            },
                            error: function () {
//                                alert("error 123123123");
                            }
                        });
                    });
                </script>

                <section>
<!--                    <div class="container">-->
                        <div id='calendar'  style="text-align:center; width: 92rem; margin-top: 3rem;"></div>
<!--                    </div>-->
                    <script>
                        $(document).ready(function () {

                            // Call the PHP script to fetch the car rental data
                            $.ajax({
                                url: "get_car_rental_data.php",
                                type: "GET",
                                success: function (data) {

                                    // Parse the JSON data
                                    var carRentalData = JSON.parse(data);

                                    // Initialize the calendar
                                    $('#calendar').fullCalendar({
                                        header: {
                                            left: 'prev,next today',
                                            center: 'title',
                                            right: 'month,agendaWeek,agendaDay',

                                        },
                                        defaultView: 'month',
                                        events: carRentalData
                                    });
                                },
                                error: function (xhr, status, error) {
                                    console.log("Error: " + error);
                                }
                            });

                        });
                    </script>
                </section>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
                <script src="app.js"></script>
            </main>
        </div>
    </body>
</html>
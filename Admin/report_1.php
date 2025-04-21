<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reports</title>
    <?php
    include './headerLinks.php';
    include './sessionWithoutLogin.php';
    include './databaseConnection.php';
    ?>
    <style type="text/css">
        body{
            /*margin-top:20px;*/
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
    </style>
</head>
<body id="page-top">
<div id="wrapper">
    <?php
    include './sidebar.php';
    ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <?php
        include './header.php';
        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <main>

<!--            <div class="d-sm-flex align-items-center justify-content-between mb-4">-->
<!--                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>-->
<!--                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">-->
<!--                    <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
<!--            </div>-->

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    $("#myCar").submit(function (event) {
                        // Stop form from submitting normally
                        event.preventDefault();

                        // Get form data
                        var formData = $(this).serialize();

                        // Submit form data using AJAX
                        $.ajax({
                            type: "POST",
                            url: "./ajax/carReport.php",
                            data: formData,
                            success: function (response) {
                                // Display results
                                $("#Carresult").html(response);
                            },
                            error: function () {
                                // Display error message
                                alert("Error selecting records");
                            }
                        });
                    });
                });
            </script>
            <section class="tps" style="margin-top: 2rem;">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1  style="text-align: center;">Total Car</h1>
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" id="myCar">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>City :</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Car brand:</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select class="form-select" name="City" id="city"  required>
                                                    <option>Select City</option>
                                                    <?php
                                                    $query = "SELECT * FROM city";
                                                    $result = $conn->query($query);
                                                    $id = 1;
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $city = $row['City'];
                                                        $City_Id =$row['City_Id'];
                                                        ?>
                                                        <option value="<?= $City_Id; ?>">
                                                            <?= $city; ?>
                                                        </option>
                                                        <?php
                                                        $id++;
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="Car_brand" id="Car_brand" class="form-select" >
                                                </select>
                                            </div>
                                            <br/><br/>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary">Search
                                            </div>
                                        </div>
                                        <div class="row">

                                        </div>
                                        <div id="Carresult"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script>
                            // Add event listener to city dropdown
                            document.getElementById('city').addEventListener('change', function () {
                                // Get the selected city ID
                                var cityId = this.value;

                                // Make an AJAX request to fetch car brands from selected city
                                var xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function () {
                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                        // Update car brand dropdown with fetched data
                                        document.getElementById('Car_brand').innerHTML = xhr.responseText;
                                    }
                                };
                                xhr.open('POST', './ajax/fetchBrands.php', true);
                                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                xhr.send('city=' + cityId);
                            });
                        </script>
                        <div class="col">
                            <h1 style="text-align: center;">Total Bookings</h1>
                            <script>
                                $(document).ready(function () {
                                    $("#myReport").submit(function (event) {
                                        // Stop form from submitting normally
                                        event.preventDefault();

                                        // Get form data
                                        var formData = $(this).serialize();

                                        // Submit form data using AJAX
                                        $.ajax({
                                            type: "POST",
                                            url: "./ajax/bookingReport.php",
                                            data: formData,
                                            success: function (response) {
                                                // Display results
                                                $("#Reportresult").html(response);
                                            },
                                            error: function () {
                                                // Display error message
                                                alert("Error selecting records");
                                            }
                                        });
                                    });
                                });
                            </script>
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" id="myReport" >
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label> FromDate :</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>ToDate :</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="ToDate" id="ToDate" autocomplete="Off" required>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="FromDate" id="FromDate" autocomplete="Off" required>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                        <div class="row">

                                        </div>
                                        <div id="Reportresult"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(function () {
                            $("#ToDate").datepicker({
                                numberOfMonths: 1,
                                dateFormat: "yy-mm-dd",
                                onSelect: function (selected) {
                                    var dt = new Date(selected);
                                    dt.setDate(dt.getDate() + 1);
                                    $("#FromDate").datepicker("option", "minDate", dt);
                                }
                            });
                            $("#FromDate").datepicker({
                                numberOfMonths: 1,
                                dateFormat: "yy-mm-dd",
                                onSelect: function (selected) {
                                    var dt = new Date(selected);
                                    dt.setDate(dt.getDate() - 1);
                                    $("#ToDate").datepicker("option", "maxDate", dt);
                                }
                            });
                        });
                    </script>
                    <div class="row">
                        <div class="col">
                            <h1 style="text-align: center;">Total car booked per selected city </h1>
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" id="myBooking" >
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label> City :</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select id="mySelectCity" name="mySelectCity" class="form-select" name="City"  required>
                                                        <option>Select City</option>
                                                        <?php
                                                        $query = "SELECT * FROM city";
                                                        $result = $conn->query($query);
                                                        $id = 1;
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $city = $row['City'];
                                                            $City_Id =$row['City_Id'];
                                                            ?>
                                                            <option value="<?= $City_Id; ?>">
                                                                <?= $city; ?>
                                                            </option>
                                                            <?php
                                                            $id++;
                                                        }
                                                        ?>
                                                    </select>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                        <div class="row">

                                        </div>
                                        <div id="ReportBookingresult"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $("#myBooking").submit(function (event) {
                            // Stop form from submitting normally
                            event.preventDefault();

                            // Get form data
                            var formData = $(this).serialize();

                            // Submit form data using AJAX
                            $.ajax({
                                type: "POST",
                                url: "./ajax/cityTotalBooking.php",
                                data: formData,
                                success: function (response) {
                                    // Display results
                                    $("#ReportBookingresult").html(response);
                                },
                                error: function () {
                                    // Display error message
                                    alert("Error selecting records");
                                }
                            });
                        });
                    });
                </script>
        </div>
        </section>

    </div>

</div>
<!-- End of Main Content -->


<?PHP include './footerLinks.php'; ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/start/jquery-ui.css" rel="Stylesheet" type="text/css"/>

</body>
</html>
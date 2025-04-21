<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reports</title>
    <?php
    include './headerLinks.php';
    include './sessionWithoutLogin.php';
    include './databaseConnection.php';
    ?>
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
                <div class="row">
                    <div class="col">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Rental History Report</h1>
                            <a href="#" id="generateBtn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data" id="myCar">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>City :</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Car :</label>
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
                                            <select name="carSelect" id="carSelect" class="form-select" >
                                            </select>
                                        </div>
                                        <br/><br/>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary">Search
                                        </div>
                                    </div>
                                    <div id="rentalHistoryReport"></div>
                                </form>
                            </div>
                        </div>
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
                                        url: "./ajax/rentalHistoryReport.php",
                                        data: formData,
                                        success: function (response) {
                                            // Display results
                                            $("#rentalHistoryReport").html(response);

                                        },
                                        error: function () {
                                            // Display error message
                                            alert("Error selecting records");
                                        }
                                    });
                                });
                            });


                            // Add event listener to city dropdown
                            document.getElementById('city').addEventListener('change', function () {
                                // Get the selected city ID
                                var cityId = this.value;

                                // Make an AJAX request to fetch car brands from selected city
                                var xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function () {
                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                        // Update car brand dropdown with fetched data
                                        document.getElementById('carSelect').innerHTML = xhr.responseText;
                                    }
                                };
                                xhr.open('POST', './ajax/fetchCar.php', true);
                                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                xhr.send('city=' + cityId);
                            });
                        </script>
                    </div>
                </div>
            </main>
        </div>
        <!-- End admin -->
    </div>
</div>
<!-- End of Main Content -->
<?PHP include './footerLinks.php'; ?>

</body>
</html>
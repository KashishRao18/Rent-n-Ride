<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
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
        $city_id=$_SESSION['city_id'];
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <?php
                                    $sql = "SELECT * FROM customer";
                                    $customer_result = mysqli_query($conn, $sql);
                                    $customer = mysqli_num_rows($customer_result);
                                    ?>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Happy Customers
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php echo $customer; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <?php
                                    $sql = "SELECT * FROM offer where City_Id= '$city_id'";
                                    $city_result = mysqli_query($conn, $sql);
                                    $city = mysqli_num_rows($city_result);
                                    ?>
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Offers</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $city; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-percentage fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <?php
                                    $sql = "SELECT * FROM car where City_Id= '$city_id'";
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
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Cars</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-car fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <?php
                                    $booking = "SELECT * FROM booking where City_Id= '$city_id'";
                                    $booking1 = $conn->query($booking);
                                    $counto=0;
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
                                        }elseif ($Status == 'Pending') {
                                            $Pending++;
                                        }
                                    }
                                    ?>
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Bookings</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $counto; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-car fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Earnings (Monthly) Card Example -->
            <!--                        <div class="col-xl-3 col-md-6 mb-4">-->
            <!--                            <div class="card border-left-info shadow h-100 py-2">-->
            <!--                                <div class="card-body">-->
            <!--                                    <div class="row no-gutters align-items-center">-->
            <!--                                        <div class="col mr-2">-->
            <!--                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks-->
            <!--                                            </div>-->
            <!--                                            <div class="row no-gutters align-items-center">-->
            <!--                                                <div class="col-auto">-->
            <!--                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>-->
            <!--                                                </div>-->
            <!--                                                <div class="col">-->
            <!--                                                    <div class="progress progress-sm mr-2">-->
            <!--                                                        <div class="progress-bar bg-info" role="progressbar"-->
            <!--                                                             style="width: 50%" aria-valuenow="50" aria-valuemin="0"-->
            <!--                                                             aria-valuemax="100"></div>-->
            <!--                                                    </div>-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->
            <!--                                        <div class="col-auto">-->
            <!--                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                        </div>-->

            <!-- Pending Requests Card Example -->
            <!--                        <div class="col-xl-3 col-md-6 mb-4">-->
            <!--                            <div class="card border-left-warning shadow h-100 py-2">-->
            <!--                                <div class="card-body">-->
            <!--                                    <div class="row no-gutters align-items-center">-->
            <!--                                        <div class="col mr-2">-->
            <!--                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">-->
            <!--                                                Pending Requests</div>-->
            <!--                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>-->
            <!--                                        </div>-->
            <!--                                        <div class="col-auto">-->
            <!--                                            <i class="fas fa-comments fa-2x text-gray-300"></i>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                        </div>-->

            <!-- Content Row -->
          <div class="row">
          </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<!-- End of Main Content -->
<?PHP include './footerLinks.php'; ?>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link href="css/styles.css" rel="stylesheet"/>
        <script src="https://kit.fontawesome.com/be19cf8b62.js" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>

        <!-- ======= Icons used for dropdown ======== -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
        <script type="text/javascript">

            document.addEventListener("DOMContentLoaded", function () {

                document.querySelectorAll('.sidebar .nav-link').forEach(function (element) {

                    element.addEventListener('click', function (e) {

                        let nextEl = element.nextElementSibling;
                        let parentEl = element.parentElement;

                        if (nextEl) {
                            e.preventDefault();
                            let mycollapse = new bootstrap.Collapse(nextEl);

                            if (nextEl.classList.contains('show')) {
                                mycollapse.hide();
                            } else {
                                mycollapse.show();
                                // find other submenus with class=show
                                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                                // if it exists, then close all of them
                                if (opened_submenu) {
                                    new bootstrap.Collapse(opened_submenu);
                                }

                            }
                        }

                    });
                })

            });
            // DOMContentLoaded  end
        </script>
        <style type="text/css">

            .sidebar li .submenu{
                list-style: none;
                margin: 0;
                padding: 0;
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .sidebar .nav-link {
                font-weight: 500;
                color : var(--bs-dark);
            }
            .sidebar .nav-link:hover {
                color : var(--bs-primary);
            }

        </style>
    </head>
    <body>
        <?php
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="Dashboard.php">Rent N Ride</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                    class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li>
                            <hr class="dropdown-divider"/>
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav  accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu ">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="Dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="Admin.php">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-user"></i></div>
                                Admin
                            </a>
                            <a class="nav-link" href="Customer.php">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-user"></i></div>
                                Customer
                            </a>

                            <a class="nav-link" href="booking.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-car"></i></div>
                                Booking
                            </a>
                            <a class="nav-link" href="Car.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-car"></i></div>
                                Car
                            </a>
                            <a class="nav-link" href="CarCategory.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-car"></i></div>
                                Car Category
                            </a>
                            <a class="nav-link" href="city.php">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-map"></i></div>
                                City
                            </a>
                            <a class="nav-link" href="Offers.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-percent"></i></div>
                                Offers
                            </a>
                            <a class="nav-link" href="Contact.php">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-user"></i></div>
                                Contact
                            </a>
                            <a class="nav-link" href="Report.php">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-user"></i></div>
                                Reports
                            </a>

                            <a class="nav-link" href="Page.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                                Edit Pages
                            </a>
                            <a class="nav-link" href="forgetpsw.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                                Forget Password
                            </a>
                            <a class="nav-link" href="Forgotpassword.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-lock"></i></div>
                                Change Password
                            </a>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-sign-out"></i></div>
                                Log Out
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php
                        echo $_SESSION['Admin_name'];
                        ?>
                    </div>
                </nav>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script src="assets/demo/chart-area-demo.js"></script>
            <script src="assets/demo/chart-bar-demo.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
            <script src="js/datatables-simple-demo.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
            <script src="https://cdn.datatables.net/datetime/1.3.0/js/dataTables.dateTime.min.js"></script>


    </body>
</html>
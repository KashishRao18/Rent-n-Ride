<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RentNRide | About us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php
        include 'headlink.php';
        include "DatabaseConnection.php";
        include "Header.php";
        ?>
    </head>
    <body>
        <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                    <div class="col-md-9 ftco-animate pb-5">
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
                        <h1 class="mb-3 bread">About Us</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section ftco-about">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
                    </div>
                    <div class="col-md-6 wrap-about ftco-animate">
                        <div class="heading-section heading-section-white pl-md-5">
                            <?php
                            $about='ABOUT';
                            $query = $conn->prepare("SELECT * FROM Page where Page_type=?");
                            $query->bind_param("s", $about);
                            $result = $query->execute();
                            $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);

                            foreach ($result as $row) {
                                $Page_id = $row['Page_id'];
                                $Page_name = $row['Page_name'];
                                $Page_type = $row['Page_type'];
                                $Page_details = $row['Page_details'];
                            }
                            ?>
                            <span class="subheading"><?= $Page_name?></span>
                            <?= $Page_details;?> <p><a href="index.php" class="btn btn-primary py-3 px-4">Rent N Ride</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div>
                <h4> <br></h4>
            </div>
        </div>
        <section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
            <!--<div class="overlay"></div>-->
            <div class="container">
                <div class="row justify-content-end">
                   
                    <div class="col-md-8 heading-section heading-section-white ftco-animate">
                        <div class="heading-section heading-section-white pl-md-5">
                           <div style="text-align: left;">
                            <h2 class="mb-1">Terms and Conditions</h2>
                            <h6 style="color: whitesmoke;">Welcome to Rent N Ride! provide you the car at your services: legal terms n condition for booking a car Renters must use the vehicle only for personal use, adhere to traffic laws, and not use the vehicle for any illegal activities or transportation of hazardous materials. Users must make a reservation and provide accurate payment information. Charges may include rental fees, taxes, and additional service. Vehicle Return: Renters must return the vehicle at the agreed-upon time and location. Late returns may incur additional fees. Privacy policy the company's negligence. The system should include a privacy policy outlining how customer data is collected, used, and protected. the vehicle can be booked for a week if need for more than again car registration is needed. legal documentation soft copy should be submited at the time of pick up.</h6>
                           </div>
                        </div>
                        
<!--                        <a href="#" class="btn btn-primary btn-lg">Show Offer</a>-->
                    </div>
                </div>
            </div>
        </section>


        <?php include 'footerlink.php'; ?>
    </body>
</html>
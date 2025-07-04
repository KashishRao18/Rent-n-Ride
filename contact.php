<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RentNRide | Contact us</title>
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
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
                        <h1 class="mb-3 bread">Contact Us</h1>
                    </div>
                </div>
            </div>
        </section>
        <?php if ($error) { ?>
            <div class="errorWrap"><strong>ERROR</strong>:
                <?php echo htmlentities($error); ?>
            </div>
            <?php
        } else {
            if ($msg) {
                ?>
                <div class="succWrap"><strong>SUCCESS</strong>:
                    <?php echo htmlentities($msg); ?>
                </div><?php
            }
        }
        ?>
        <section class="ftco-section contact-section">
            <div class="container">
                <div class="row d-flex mb-5 contact-info">
                    <div class="col-md-4">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <div class="border w-100 p-4 rounded mb-2 d-flex">
                                    <div class="icon mr-3">
                                        <span class="icon-map-o"></span>
                                    </div>
                                    <p><span>Address:</span> Uka Tarsadia University, Bardoli</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="border w-100 p-4 rounded mb-2 d-flex">
                                    <div class="icon mr-3">
                                        <span class="icon-mobile-phone"></span>
                                    </div>
                                    <p><span>Phone:</span> <a href="tel://1234567920">+91 88492 88573</a></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="border w-100 p-4 rounded mb-2 d-flex">
                                    <div class="icon mr-3">
                                        <span class="icon-envelope-o"></span>
                                    </div>
                                    <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@rentnride.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 block-9 mb-md-5">
                        <form action="#" class="bg-light p-5 contact-form" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name" name="cname" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Email" name="email" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject" name="sub" required="">
                            </div>
                            <div class="form-group">
                                <textarea cols="30" rows="7" class="form-control" name="message" required="" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5" name="submit">
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {

                            $cname = $_POST['cname'];
                            $email = $_POST['email'];
                            $sub = $_POST['sub'];
                            $message = $_POST['message'];

                            $contact = $conn->prepare("INSERT INTO contact (Name, Email,Subject,Message)VALUES (?,?,?,?)");
                            $contact->bind_param("ssss", $cname, $email, $sub, $message);
                            $contactshow = $contact->execute();
                            if ($contactshow > 0) {
                                $msg = "Success";
                            } else {
                                $msg = "Fail";
                            }
                        } else {
                            $msg = "Please enter valid details";
                        }
                        ?>
                    </div>
                </div>
                <!--                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div id="map" class="bg-white">
                                            <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/place/UKA+TARSDIA+UNIVERSITY./@21.0682849,73.1333266,15z/data=!4m6!3m5!1s0x3be060e07393bc51:0xf96e044991e337e9!8m2!3d21.0682849!4d73.1333266!16s%2Fm%2F0tkglhq"></iframe>
                                        </div>
                                    </div>
                                </div>-->
            </div>
        </section>
        <?php include 'footerlink.php'; ?>
    </body>
</html>
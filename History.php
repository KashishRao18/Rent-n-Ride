<!DOCTYPE html>
<html lang="en">
    <head>
    <head>
        <title>RentNRide | History</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php
        include 'headlink.php';
        include "DatabaseConnection.php";
        include "Sessionwithoutlogin.php";
        include "Header.php";
        ?>
    </head>
</head>
<body>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>My Booking<i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">My Booking</h1>

                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Registration No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Img</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Offer</th>
                        <th scope="col">Total Amount</th>
                    </tr>
                </thead>
               <a href="index.php"><h2><span style="color: red; text-decoration: underline;">Book</span> <span style="color: red; text-decoration: underline;">Car</span></h2></a>


                <tbody>
                    <?php
                    $CustomerEmail = $_SESSION['CustomerEmail'];
                    $sql1 = $conn->prepare("SELECT * FROM booking WHERE Email = ?");
                    $sql1->bind_param("s", $CustomerEmail);
                    $sql1->execute();
                    $history = $sql1->get_result()->fetch_all(MYSQLI_ASSOC);

                    if (count($history) > 0) {
                        $i = 0;
                        foreach ($history as $row) {
                            $car = $row['Registration_No'];
//          SELECT Image FROM car WHERE Registration_No = GJ01DS4434;
                            $sql = $conn->prepare("SELECT * FROM car WHERE Registration_No = ?");
                            $sql->bind_param("s", $car);
                            $sql->execute();
                            $carimg = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
                            foreach ($carimg as $row1) {
                                $name = $row1['Name'];
                                $img = $row1['Image'];
                            }
                            $i++;
                            ?>


                            <tr id='tr_<?= $i; ?>'>
                                <th><?= $i; ?></th>
                                <td><?= $row['Registration_No']; ?></td>
                                <td><?= $name; ?></td>
                                <td>
                                    <img src="Admin/CarImg/<?= $img; ?>" width="100px" height="100px" alt="hy"><br/>
                                </td>
                                <td><?= $row['Start_Date']; ?></td>
                                <td><?= $row['End_Date']; ?></td>
                                <td><?= $row['Offer'];?></td>
                                <td><?= $row['Amount'];?></td>
                            </tr>
                        <?php
                        }
                    } else {
//                        echo "not valid";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <?php
    include 'footerlink.php';
    ?>
</body>
</html>
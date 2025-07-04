<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <meta charset="UTF-8">
        <title>Offer | Add</title>
        <meta name="description" content="Add Offer"/>
        <meta name="author" content="Add Offer"/>
    </head>
    <body>
        <?php
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';
        ?>
        <div id="layoutSidenav_content">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Add Offer
                </div>
                <div class="card-body" style="padding-left: 150px;padding-right: 150px;">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Offer_Code" name="Offer_Code" type="text"
                                   onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 47 && event.charCode < 58)"
                                   placeholder="Offer Code" maxlength="10" required/>
                            <label for="Offer_Code">Offer Code</label>
                            <span id="OfferCode"></span>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Offer_Name" name="Offer_Name" type="text" placeholder="Offer Name"
                                   onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)"
                                   required/>
                            <label for="Offer_Name">Offer Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" name="OfferImage" id="OfferImage" accept="image/*" class="form-control">
                            <label for="Image">Offer Image</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Offer_Amount" name="Offer_Amount" type="text"
                                   placeholder="Offer Amount" onkeypress="return (event.charCode > 47 && event.charCode < 58)"
                                   required/>
                            <label for="Offer_Amount">Offer Percentage</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Offer_Start_Date" name="Offer_Start_Date" type="text"
                                   placeholder="Offer Start Date" required/>
                            <label for="Offer_Start_Date">Offer Start Date</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Offer_End_Date" name="Offer_End_Date" type="text"
                                   placeholder="Offer End Date" required/>
                            <label for="Offer_End_Date">Offer End Date</label>
                        </div>
                        <div class="form-floating mb-3" >
                            <select class="form-select" name="Offer_Status" required disabled="disabled">
                                <option selected>Active</option>
                                <option>Deactive</option>
                            </select>
                            <label for="Offer_Status">Offer Status</label>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" name="Offersubmit" id="Offersubmit" class="btn btn-primary btn-lg"
                                   value="Add Offer">
                        </div>
                    </form>
                </div>
                <script type="text/javascript">
                    function alreadyexistOffer() {
                        $("#OfferCode").append("This Offer Code is already exist!");
                        $("#OfferCode").css("color", "red");
                    }

                    $(function () {
                        var dateToday = new Date();
                        $("#Offer_Start_Date").datepicker({
                            numberOfMonths: 1,
                            dateFormat: "yy-mm-dd",
                            minDate: dateToday,
                            onSelect: function (selected) {
                                var dt = new Date(selected);
                                dt.setDate(dt.getDate() + 1);
                                $("#Offer_End_Date").datepicker("option", "minDate", dt);
                            }
                        });
                        $("#Offer_End_Date").datepicker({
                            numberOfMonths: 1,
                            dateFormat: "yy-mm-dd",
                            minDate: dateToday,
                            onSelect: function (selected) {
                                var dt = new Date(selected);
                                dt.setDate(dt.getDate() - 1);
                                $("#Offer_Start_Date").datepicker("option", "maxDate", dt);
                            }
                        });
                    });
                </script>
                <?php
                if (isset($_POST['Offersubmit'])) {
                    $offercode = $_POST['Offer_Code'];
                    $OfferName = $_POST['Offer_Name'];
                    $OfferAmount = $_POST['Offer_Amount'];
                    $startdate = $_POST['Offer_Start_Date'];
                    $enddate = $_POST['Offer_End_Date'];
                    $Status = $_POST['Offer_Status'];

                    $OfferImage = $_FILES['OfferImage']['name'];

                    $CheckP = $conn->prepare("SELECT * FROM offer WHERE Code = ?");
                    $CheckP->bind_param("s", $offercode);
                    $result = $CheckP->execute();
                    $result = $CheckP->get_result()->fetch_all(MYSQLI_ASSOC);

                    if (!count($result) > 0) {

                        $extensionOffer = pathinfo($OfferImage, PATHINFO_EXTENSION);
                        $OfferImg = $offercode . "." . $extensionOffer;

                        $today_date = date("yy-mm-dd");
                        $last_date = $enddate;

                        if ($last_date < $today_date) {
                            $Status = "Deactive";
                        } else {
                            $Status = "Active";
                        }

                        if ($startdate > $today_date) {
                            $Status = "Active";
                        } else {
                            $Status = "Deactive";
                        }
                        $offer = $conn->prepare("INSERT INTO offer VALUES (?,?,?,?,?,?,?)");
                        $offer->bind_param("sssisss", $offercode, $OfferName, $OfferImg, $OfferAmount, $startdate, $enddate, $Status);
                        $AddOffer = $offer->execute();
                        if ($AddOffer > 0) {
                            move_uploaded_file($_FILES["OfferImage"]["tmp_name"], "Offerimg/" . $OfferImg);
                            echo "<script>window.location.href='Offers.php'</script>";
                        } else {
                            echo "<script> alert('$conn->error');</script>";
                        }
                    } else {
                        echo "<script>alreadyexistOffer();</script>";
                    }
                }
                ?>
            </div>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/start/jquery-ui.css" rel="Stylesheet" type="text/css"/>
    </body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <meta charset="UTF-8">
        <title>City | Edit</title>
        <meta name="description" content="Edit Offer"/>
        <meta name="author" content="Edit Offer"/>

    </head>
    <body>
        <?php
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';

        $id = $_GET['cityid'];
        $query = $conn->prepare("SELECT * FROM city where City_Id=?");
        $query->bind_param("i", $id);
        $result = $query->execute();
        $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);

        foreach ($result as $row) {
            $City = $row['City'];
            $Address = $row['Address'];
            ?>
            <div id="layoutSidenav_content">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Edit City
                    </div>
                    <div class="card-body" style="padding-left: 150px;padding-right: 150px;">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="City_name" name="City_name" type="text" placeholder="City Name"
                                       onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
                                       value="<?php echo $City; ?>" required>
                                <label for="Adminname">City Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="City_address" name="City_address" type="text" placeholder="City Name" value="<?php echo $Address; ?>" required>
                                <label for="Adminname">City Address</label>
                            </div>
                            <div class="d-grid gap-2">
                                <input type="submit" name="Cityupdate" id="Cityupdate" class="btn btn-primary btn-lg"
                                       value="Update City">
                            </div>
                        </form>
                    </div>
                <?php } ?>
                <?php
                if (isset($_POST['Cityupdate'])) {
                    $City_name = $_POST['City_name'];
                    $City_address = $_POST['City_address'];

                    $city = $conn->prepare("UPDATE city SET City=?,Address=? WHERE City_Id = ?");
                    $city->bind_param("sss", $City_name, $City_address, $id);
                    $updatecity = $city->execute();
                    if ($updatecity > 0) {
                        echo "<script>window.location.href='city.php'</script>";
                    } else {
                        echo "<script> alert('$conn->error');</script>";
                    }
                }
                ?>
            </div>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/start/jquery-ui.css" rel="Stylesheet"
              type="text/css"/>
    </body>
</html>

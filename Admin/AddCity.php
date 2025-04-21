<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>City | Add</title>
        <meta name="description" content="Add Admin"/>
        <meta name="author" content="Add admin"/>
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
                    Add City
                </div>
                <div class="card-body" style="padding-left: 150px;padding-right: 150px;">
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="City_name" name="City_name" type="text" placeholder="City Name"
                                   onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
                                   required>
                            <label for="Adminname">City Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="City_address" name="City_address" type="text" placeholder="City Name" required>
                            <label for="Adminname">City Address</label>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" name="Citysubmit" id="Citysubmit" class="btn btn-primary btn-lg"
                                   value="Add City">
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_POST['Citysubmit'])) {
                    $City_name = $_POST['City_name'];
                    $City_address = $_POST['City_address'];

//            INSERT INTO city(City,Address) VALUES (?,?)
                    $city = $conn->prepare(" INSERT INTO city(City,Address) VALUES (?,?)");
                    $city->bind_param("ss", $City_name, $City_address);
                    $Addcity = $city->execute();
                    if ($Addcity == 1) {
                        echo "<script>window.location.href='city.php'</script>";
                    } else {
                        echo "<script> alert('$conn->error');</script>";
                    }
                }
                $conn->close();
                ?>
            </div>
        </div>
    </body>
</html>

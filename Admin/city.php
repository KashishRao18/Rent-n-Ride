<?php
include './DatabaseConnection.php';
include './Sessionwithoutlogin.php';
include './header.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>City</title>
        <meta name="description" content="Customer"/>
        <meta name="author" content="Customer"/>
    </head>
    <body>
        <script>
            $(document).ready(function () {
                $('#city').DataTable();
            });
        </script>
        <div id="layoutSidenav_content">
            <main>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        City
                    </div>
                    <form method="post">
                        <div class="card-body">

                            <table id="city" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">City</th>
                                        <th scope="col">Address</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
        <!--                        <tfoot>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">City</th>
                                    <th scope="col">Address</th>
                                    <th scope="col"></th>
                                </tr>
                                </tfoot>-->
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM city";
                                    $result = $conn->query($query);
                                    $id = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr id='tr_<?= $row['City_Id']; ?>'>
                                            <td><input type='checkbox' name='delete[]' value='<?= $row['City_Id']; ?>'></td>
                                            <td><?= $row['City']; ?></td>
                                            <td><?= $row['Address']; ?></td>
                                            <td><a href="editCity.php?cityid=<?= $row['City_Id']; ?>"><i class="fa fa-edit"></i></a></td>
                                        </tr>
                                        <?php
                                        $id++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <a href="AddCity.php" class="btn btn-primary">+Add City</a>
                            <input type="submit" class="btn btn-primary" name="City" id="but_delete" value="Delete City">
                            <?php
                            if (isset($_POST['City'])) {

                                if (isset($_POST['delete'])) {
                                    foreach ($_POST['delete'] as $deleteid) {
                                        $deleteCar = $conn->prepare("DELETE from city WHERE City_Id=?");
                                        $deleteCar->bind_param("s", $deleteid);
                                        $deleteCar->execute();
                                    }
                                    echo "<script>window.location.href='city.php'</script>";
                                } else {
                                    echo '<script>Checkboxseleted();</script>';
                                }
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Customer</title>
        <meta name="description" content="Customer"/>
        <meta name="author" content="Customer"/>
    </head>
    <body>
        <?php
// put your code here
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';
        ?>
        <script>
            $(document).ready(function () {
                $('#Customer').DataTable();
            });
        </script>
        <div id="layoutSidenav_content">
            <main>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Customer
                    </div>
                    <?php
                    if (isset($_GET["Status"]) && $_GET["Status"] == 'Deactive') {
                        $id = $_GET["id"];
                        // Activate user
                        $sql = "UPDATE customer SEt Status= 'active' WHERE Email = '$id'";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script>window.location.href='Customer.php'</script>";
                        } else {
                            echo "Error activating user: " . mysqli_error($conn);
                        }
                    }

                    if (isset($_GET["Status"]) && $_GET["Status"] == 'active') {
                        $id = $_GET["id"];
                        // Activate user
                        $sql = "UPDATE customer SEt Status= 'Deactive' WHERE Email = '$id'";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script>window.location.href='Customer.php'</script>";
                        } else {
                            echo "Error activating user: " . mysqli_error($conn);
                        }
                    }
                    ?>
                    <form method="post">
                        <div class="card-body">

                            <table id="Customer" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <!--<th scope="col"></th>-->
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile No</th>
                                        <th scope="col">Date Of Birth</th>
                                        <th scope="col">Driving Licence</th>
                                        <th scope="col">AadharCard Number</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
<!--                                <tfoot>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile No</th>
                                        <th scope="col">Date Of Birth</th>
                                        <th scope="col">Driving Licence</th>
                                        <th scope="col">AadharCard Number</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </tfoot>-->
                                <tbody>
<?php
$query = "SELECT * FROM customer";
$result = $conn->query($query);
$id = 1;
while ($row = mysqli_fetch_array($result)) {
    ?>
                                        <tr id='tr_<?= $id ?>'>
                                            <!--<td><input type='checkbox' name='delete[]' value='<?= $Email ?>'></td>-->
                                            <td><?= $row['Name']; ?></td>
                                            <td><?= $Email = $row['Email']; ?></td>
                                            <td><?= $row['Mobile']; ?></td>
                                            <td><?= $row['Date_Of_Birth']; ?></td>
                                            <td><?= $row['Driving_Licence']; ?></td>
                                            <td><?= $row['AadharCard']; ?></td>
                                            <td>
    <?php
    $Status = $row['Status'];
    if ($Status == 'Deactive') {
        echo "<a href='Customer.php?id=$Email&Status=Deactive'><span class='badge badge-secondary'>$Status</span></a>";
    } else {
        echo "<a href='Customer.php?id=$Email&Status=active'><span class='badge badge-success'>$Status</span></a>";
    }
    ?>
                                            </td>
                                        </tr>
    <?php
    $id++;
}
?>
                                </tbody>
                            </table>
<!--                            <input type="submit" class="btn btn-primary" name="customer_delete" id="but_delete"
                                   value="Delete Customer">-->
<?php
if (isset($_POST['customer_delete'])) {

    if (isset($_POST['delete'])) {
        foreach ($_POST['delete'] as $deleteid) {
            $deleteCustomer = $conn->prepare("DELETE from customer WHERE Email=?");
            $deleteCustomer->bind_param("s", $deleteid);
            $deleteCustomer->execute();
        }
        echo "<script>window.location.href='Customer.php'</script>";
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

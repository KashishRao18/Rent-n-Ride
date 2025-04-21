<?php
include './DatabaseConnection.php';
include './Sessionwithoutlogin.php';
include './header.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // Activate user
    $sql = "UPDATE Contact SET Status='Read' WHERE Contact_Id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location.href='Contact.php'</script>";
    } else {
        echo "Error activating user: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact us</title>
        <meta name="description" content="Customer"/>
        <meta name="author" content="Customer"/>
    </head>
    <body>
        <script>
            $(document).ready(function () {
                $('#Contact').DataTable();
            });
        </script>
        <div id="layoutSidenav_content">
            <main>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Customer Contact
                    </div>
                    <form method="post">
                        <div class="card-body">

                            <table id="Contact" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        
                                    </tr>
                                </thead>
<!--                                <tfoot>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </tfoot>-->
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM contact";
                                    $result = $conn->query($query);
                                    $id = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $Name = $row['Name'];
                                        $Email = $row['Email'];
                                        $sub = $row['Subject'];
                                        $message = $row['Message'];
                                        $Status = $row['Status'];
                                        ?>
                                        <tr id='tr_<?= $id ?>'>
                                            <td><?= $Name ?></td>
                                            <td><?= $Email ?></td>
                                            <td><?= $sub ?></td>
                                            <td><?= $message ?></td>
                                           
                                        </tr>
                                        <?php
                                        $id++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>
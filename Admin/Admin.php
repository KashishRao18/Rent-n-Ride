<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <meta name="description" content="Admin"/>
        <link href="Admin/css/styles.css" rel="stylesheet"/>
        <link href="Admin/css/styles_1.css" rel="stylesheet"/>
        <link href="Admin/css/sb-admin-2.css" rel="stylesheet"/>
        <meta name="author" content="Admin"/>
    </head>
    <body class="sb-nav-fixed">
        <?php
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';
        ?>
        <script>
            function Checkboxseleted() {
                alert('please Select any one check box!');
            }
            $(document).ready(function () {
                $('.Admin').DataTable();
            });
        </script>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Admin
                        </div>
                        <?php
                        if (isset($_GET["Status"]) && $_GET["Status"] == 'Deactive') {
                            $id = $_GET["id"];
                            // Activate user
                            $sql = "UPDATE admin SET Status='active' WHERE Email = '$id'";
                            if (mysqli_query($conn, $sql)) {
                                echo "<script>window.location.href='Admin.php'</script>";
                            } else {
                                echo "Error activating user: " . mysqli_error($conn);
                            }
                        }


                        if (isset($_GET["Status"]) && $_GET["Status"] == 'active') {
                            $id = $_GET["id"];
                            // Activate user
                            $sql = "UPDATE admin SET Status='Deactive' WHERE Email = '$id'";
                            if (mysqli_query($conn, $sql)) {
                                echo "<script>window.location.href='Admin.php'</script>";
                            } else {
                                echo "Error activating user: " . mysqli_error($conn);
                            }
                        }
                        ?>

                        <form method="post">
                            <div class="card-body">

                                <table  class="table table-striped table-bordered Admin" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Admin Name</th>
                                            <th scope="col">Admin Email Id</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
        <!--                            <tfoot>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Admin name</th>
                                        <th scope="col">Admin emailId</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                    </tfoot>-->
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM admin";
                                        $result = $conn->query($query);
                                        $id = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                            $Admin_name = $row['Name'];
                                            $Admin_email_id = $row['Email'];
                                            $Status = $row['Status'];
                                            $Role = $row['Role'];
                                            ?>
                                            <tr id='tr_<?= $id ?>'>
                                                <td><input type='checkbox' name='delete[]' value='<?= $Admin_email_id ?>'></td>
                                                <td><?= $Admin_name ?></td>
                                                <td><?= $Admin_email_id ?></td>
                                                <td>
                                                    <?php
                                                    if ($Status == 'Deactive') {
                                                        echo "<a href='Admin.php?id=$Admin_email_id&Status=Deactive'><span class='badge badge-secondary'>$Status</span>";
                                                    } else {
                                                        echo "<a href='Admin.php?id=$Admin_email_id&Status=active'><span class='badge badge-success'>$Status</span>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $Role ?></td>
                                                <td>
                                                    <a href="editAdmin.php?id=<?= base64_encode($Admin_email_id); ?>" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $id++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <a href="AddAdmin.php" class="btn btn-primary">+Add Admin</a>
                                <input type="submit" class="btn btn-primary" name="Admin_delete" id="but_delete" value="Delete Admin">
                                <?php
                                if (isset($_POST['Admin_delete'])) {

                                    if (isset($_POST['delete'])) {
                                        foreach ($_POST['delete'] as $deleteid) {

                                            $deleteAdmin = $conn->prepare("DELETE from admin WHERE Email=?");
                                            $deleteAdmin->bind_param("s", $deleteid);
                                            $deleteAdmin->execute();
                                        }
                                        echo "<script>window.location.href='Admin.php'</script>";
                                    } else {
                                        echo '<script>Checkboxseleted();</script>';
                                    }
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </main>

    </body>
</html>

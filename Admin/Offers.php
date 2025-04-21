<!DOCTYPE html>
<html>
    <head>
        <meta name="description" content="Offer Page to show all Offer"/>
        <meta name="author" content="Offer"/>
        <title>Offer</title>
    </head>
    <body>
        <?php
// put your code here
        include './DatabaseConnection.php';
        include './Sessionwithoutlogin.php';
        include './header.php';
        ?>
        <script>
            function Checkboxseleted() {
                alert('please Select any one check box!');
            }
            $(document).ready(function () {
                $('#Offer').DataTable();
            });
        </script>
        <div id="layoutSidenav_content">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Offer
                </div>
                <?php
                if (isset($_GET["Status"]) && $_GET["Status"] == 'Deactive') {
                    $id = $_GET["id"];
                    // Activate user
                    $sql = "UPDATE offer SET Status='active' WHERE Code = '$id'";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>window.location.href='Offers.php'</script>";
                    } else {
                        echo "Error activating user: " . mysqli_error($conn);
                    }
                }

                if (isset($_GET["Status"]) && $_GET["Status"] == 'active') {
                    $id = $_GET["id"];
                    // Activate user
                    $sql = "UPDATE offer SET Status='Deactive' WHERE Code = '$id'";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>window.location.href='Offers.php'</script>";
                    } else {
                        echo "Error activating user: " . mysqli_error($conn);
                    }
                }
                ?>
                <form method="post">
                    <div class="card-body">
                        <table id="Offer" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Offer Code</th>
                                    <th scope="col">Offer Name</th>
                                    <th scope="col">Offer Image</th>
                                    <th scope="col">Offer Percentage</th>
                                    <th scope="col">Offer Start Date</th>
                                    <th scope="col">Offer End Date</th>
                                    <th scope="col">Offer Status</th>
                                    <th scope="col">Offer Edit</th>
                                </tr>
                            </thead>
<!--                            <tfoot>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Offer Code</th>
                                    <th scope="col">Offer Name</th>
                                    <th scope="col">Offer Image</th>
                                    <th scope="col">Offer Percentage</th>
                                    <th scope="col">Offer Start Date</th>
                                    <th scope="col">Offer End Date</th>
                                    <th scope="col">Offer Status</th>
                                    <th scope="col">Offer Edit</th>
                                </tr>
                            </tfoot>-->
                            <tbody>
<?php
$query = "SELECT * FROM offer";
$result = $conn->query($query);
$id = 1;
while ($row = mysqli_fetch_array($result)) {
    $Oid = $row['Code'];
    $Offer_Code = $row['Code'];
    $Offer_Name = $row['Name'];
    $Image = $row['Image'];
    $Offer_Amount = $row['Percentage'];
    $Offer_Start_Date = $row['Start_Date'];
    $Offer_End_Date = $row['End_Date'];
    $Offer_Status = $row['Status'];
    $current_date = date("Y-m-d");
    if (strtotime($Offer_Start_Date) == strtotime($current_date)) {
        $Status = 'Active';
        $StartOffer = $conn->prepare(" UPDATE offer SET Status=? WHERE Code =?");
        $StartOffer->bind_param("ss", $Status, $Oid);
        $StartOffer->execute();
    }

    if ($current_date >= $Offer_End_Date) {
        $Status = 'Deactive';
        $EndOffer = $conn->prepare(" UPDATE offer SET Status=? WHERE Code =?");
        $EndOffer->bind_param("ss", $Status, $Oid);
        $EndOffer->execute();
    }
    ?>
                                    <tr id='tr_<?= $id ?>'>
                                        <td><input type='checkbox' name='delete[]' value='<?= $Offer_Code ?>'></td>
                                        <td><?= $Offer_Code ?></td>
                                        <td><?= $Offer_Name ?></td>
                                        <td>
                                            <img src="Offerimg/<?php echo $Image; ?>" width="100px" height="100px"><br/>
    <?php // echo $Image  ?>
                                        </td>
                                        <td><?= $Offer_Amount . "%" ?></td>
                                        <td><?= $Offer_Start_Date ?></td>
                                        <td><?= $Offer_End_Date ?></td>
                                        <td>
    <?php
    if ($Offer_Status == 'Deactive') {
        echo "<a href='Offers.php?id=$Offer_Code&Status=Deactive'><span class='badge badge-secondary'>$Offer_Status</span>";
    } else {
        echo "<a href='Offers.php?id=$Offer_Code&Status=active'><span class='badge badge-success' >$Offer_Status</span>";
    }
    ?>
                                        </td>
                                        <td><a href="editOffer.php?id=<?= base64_encode($Admin_email_id); ?>" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a></td>
                                    </tr>
    <?php
    $id++;
}
?>
                            </tbody>
                        </table>
                        <a href="AddOffer.php" class="btn btn-primary">+Add Offer</a>
                        <input type="submit" class="btn btn-primary" name="Offers_delete" id="but_delete" value="Delete Offers">
<?php
if (isset($_POST['Offers_delete'])) {

    if (isset($_POST['delete'])) {
        foreach ($_POST['delete'] as $deleteid) {
            $deleteOffer = $conn->prepare("DELETE from offer WHERE Code=?");
            $deleteOffer->bind_param("s", $deleteid);
            $deleteOffer->execute();
        }
        echo "<script>window.location.href='Offers.php'</script>";
        $msg = "Vehicle  record deleted successfully";
    } else {
        echo '<script>Checkboxseleted();</script>';
    }
}
?>
                    </div>
                </form>
            </div>
        </div>
<!--        <script>-->
        <!--            var minDate, maxDate;-->
        <!---->
        <!--            // Custom filtering function which will search data in column four between two values-->
        <!--            $.fn.dataTable.ext.search.push(-->
        <!--                function( settings, data, dataIndex ) {-->
        <!--                    var min = minDate.val();-->
        <!--                    var max = maxDate.val();-->
        <!--                    var date = new Date( data[4] );-->
        <!---->
        <!--                    if (-->
        <!--                        ( min === null && max === null ) ||-->
        <!--                        ( min === null && date <= max ) ||-->
        <!--                        ( min <= date   && max === null ) ||-->
        <!--                        ( min <= date   && date <= max )-->
        <!--                    ) {-->
        <!--                        return true;-->
        <!--                    }-->
        <!--                    return false;-->
        <!--                }-->
        <!--            );-->
        <!---->
        <!--            $(document).ready(function() {-->
        <!--                // Create date inputs-->
        <!--                minDate = new DateTime($('#min'), {-->
        <!--                    format: 'MMMM Do YYYY'-->
        <!--                });-->
        <!--                maxDate = new DateTime($('#max'), {-->
        <!--                    format: 'MMMM Do YYYY'-->
        <!--                });-->
        <!---->
        <!--                // DataTables initialisation-->
        <!--                var table = $('#Offer').DataTable();-->
        <!---->
        <!--                // Refilter the table-->
        <!--                $('#min, #max').on('change', function () {-->
        <!--                    table.draw();-->
        <!--                });-->
        <!--            });-->
        <!--        </script>-->
    </body>
</html>

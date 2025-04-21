<?php

include './DatabaseConnection.php';

    $CustomerEmail = $_POST['CustomerEmail'];
    $Customerpassword = md5($_POST['Customerpassword']);

    $sql = $conn->prepare("SELECT * FROM customer WHERE Email = ? ");
    $sql->bind_param("s", $CustomerEmail);
    $sql->execute();
    $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

    if (count($result) == 1) {
        if ($Customerpassword == $result[0]['Password']) {
            foreach ($result as $row) {
                $user_email = $row['Name'];
                $curr_status = $row['Status'];
            }
            if ($curr_status == 'Deactive') {
                echo '<div class="alert alert-danger" role="alert">Your account is inactive, Please contact the car shop");</div>';
            } else {
                $_SESSION['loggedin'] = true;
                $_SESSION['CustomerEmail'] = $CustomerEmail;
                echo "<script>window.location.href='index.php'</script>";
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Invalid password</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Account does not exist</div>';
}
?>
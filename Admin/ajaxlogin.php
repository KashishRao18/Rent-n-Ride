<?php

include 'DatabaseConnection.php';
    $Admin_email_id = $_POST['Email'];
    $Admin_password = md5($_POST['password']);

    $sql = $conn->prepare("SELECT * FROM admin WHERE Email = ? ");
    $sql->bind_param("s", $Admin_email_id);
    $sql->execute();
    $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

    if (count($result) > 0) {
        $sql = $conn->prepare("SELECT * FROM admin WHERE Email =? && Password = ? ");
        $sql->bind_param("ss", $Admin_email_id, $Admin_password);
        $sql->execute();
        $resultPassword = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        if (count($resultPassword) > 0) {
            foreach ($result as $row) {
                $user_email = $row['Name'];
                $curr_status = $row['Status'];
            }
            if ($curr_status == 'Deactive') {
                echo '<div class="alert alert-danger" role="alert">Sorry, your account is temporarily deactivated by the admin.</div>';
            } else {
                $_SESSION['Admin_name'] = $result[0]['Name'];
                $_SESSION['islogin'] = true;
                echo "<script>window.location.href='Dashboard.php'</script>";
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Please enter valid password!.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Please enter valid email id!.</div>';
    }

$conn->close();
?>
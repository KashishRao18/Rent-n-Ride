<?php ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Page | Add</title>
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
                            <input class="form-control" id="Page_name" name="Page_name" type="text" placeholder="Page Name"
                                   onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)"
                                   required>
                            <label for="Page_name">Page Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Page_type" name="Page_type" type="text" placeholder="Page Type"
                                   onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)"
                                   required>
                            <label for="Page_type">Page Type</label>
                        </div>
                        <div class="form-outline">
                            <textarea type="text"  name="Details" id="editor" rows="20">
                            </textarea>
                            <label class="form-label" for="textAreaExample">Message</label>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" name="Pagesubmit" id="Pagesubmit" class="btn btn-primary btn-lg"
                                   value="Add Page">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['Pagesubmit'])) {
            $Page_name = $_POST['Page_name'];
            $Page_type = $_POST['Page_type'];
            $Details = $_POST['Details'];

            $page = $conn->prepare("INSERT INTO page(Page_name,Page_type,Page_details) VALUES (?,?,?)");
            $page->bind_param("sss", $Page_name, $Page_type, $Details);
            $AddPage = $page->execute();
            if ($AddPage > 0) {
                echo "<script>window.location.href='Page.php'</script>";
            } else {
                echo "<script> alert('$conn->error');</script>";
            }
        } else {
            echo "<script>alreadyexistOffer();</script>";
        }
        ?>
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
        <script>
                                       ClassicEditor
                                               .create(document.querySelector('#editor'))
                                               .then(editor => {
                                                   console.log(editor);
                                               })
                                               .catch(error => {
                                                   console.error(error);
                                               });
        </script>
    </body>
</html>

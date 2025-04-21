<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Quick car hire | Admin</title>
        <link href="css/styles.css" rel="stylesheet"/>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .alert {
                padding: 15px;
                border: 1px solid transparent;
                border-radius: 4px;
            }
            .alert-danger {
                color: #721c24;
                background-color: #f8d7da;
                border-color: #f5c6cb;
            }
        </style>
    </head>
    <body>
        <?php
        include './DatabaseConnection.php';
        ?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post" id="login-form" enctype="multipart/form-data">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Email" name="Email" type="email"
                                                       placeholder="name@example.com"/>
                                                <label for="inputEmail">Email address</label>
                                                <span id="email1"></span>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password"
                                                       placeholder="Password"/>
                                                <label for="inputPassword">Password</label>
                                                <span id="password"></span>
                                            </div>
                                            <div id="login-result"></div>
                                            <div class="d-grid gap-2">
<!--                                                <a class="small" href="Forgotpassword.php">Forgot Password?</a>-->
                                                <input type="submit" name="submit" id="submit" class="btn btn-primary btn-lg"
                                                       value="Login">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(function () {
                $('#login-form').submit(function (event) {
                    event.preventDefault();
                    var Email = $('#Email').val();
                    var password = $('#password').val();
                    $.ajax({
                        url: 'ajaxlogin.php',
                        type: 'POST',
                        data: {Email: Email, password: password},
                        success: function (response) {
                            $('#login-result').html(response);
                        }
                    });
                });
            });
        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

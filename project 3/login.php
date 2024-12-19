<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="sytle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/all.min.css">
    <link rel="stylesheet" href="font/fontawesome.min.css">
</head>
<body>
   <div class="error mx-5 pt-2">
   <?php
            if(!empty($_SESSION["emailorpasswrong"])) {
                echo '
                <div class="alert alert-danger alert-dismissible  show" role="alert">
                    <strong>Error!</strong> '.$_SESSION["emailorpasswrong"].'.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                ';
            }
        ?>
   </div>
    <div class="login-container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card mx-2" style="width: 100%; max-width: 450px;">
            <div class="card-header user bg-primary">
                <img src="img/LOGO.png" class="my-2" width="80px"  alt="">
                <h4 class="text-light py-2">Login To CityCot University</h4>
            </div>
            <div class="body py-1">
                <form action="check_login.php" method="post" class="py-3 px-2">
                    <label for="" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <?php
                            if(!empty($_SESSION["email"])) {
                                echo '
                                    <input type="text" class="form-control" name="email" id="" placeholder="Enter Your Email" value="'.$_SESSION["email"].'">
                                ';
                            }else {
                                echo '
                                <input type="text" class="form-control" name="email" id="" placeholder="Enter Your Email">
                                ';
                            }
                        ?>
                    </div>
                    <label for="" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                            <input type="password" class="form-control" name="password" id="" placeholder="Enter Your Password">
                        </div>
                    <button type="submit" name="submit" value="Login" class="btn btn-primary mt-3" style="width: 100%;">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>
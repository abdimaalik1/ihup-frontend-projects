<?php
include("dashboard.php");
include("conn_db.php");
    $u_id = $_SESSION["u_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="sytle.css">
</head>
<body>
    <div class="d-flex justify-content-center">

        <div class="cont d-flex justify-content-center profile">
            <div class="card " style="width: 100%">
                <div class="card-header bg-primary text-light text-center">
                    <h1>User  Profile</h1>
                </div>
                <div class="body py-2">
                    <div class="logo my-2 d-flex justify-content-center">
                        <img src="img/LOGO.png" class="img-logo shadow p-2"  alt="">
                    </div>
    
                    <div class="user my-4 px-2">
                        <?php
                                $sql = "SELECT * FROM user WHERE USER_ID = ?";
                                $stmt = mysqli_stmt_init($conn);
                                mysqli_stmt_prepare($stmt,$sql);
                                mysqli_stmt_bind_param($stmt,"i",$u_id);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                $row = mysqli_fetch_assoc($result);
                        ?>
                        <h5 class="">UserID: <span class="lead"><?php echo $row["USER_ID"] ?></span></h5>
                        <h5 class="">UserName: <span class="lead"><?php echo $row["USER_NAME"] ?></span></h5>
                        <h5 class="">UserEmail: <span class="lead"><?php echo $row["USER_EMAIL"] ?></span></h5>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
   
<?php
    include("footer.php");
?>
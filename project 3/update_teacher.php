<?php

include("conn_db.php");
$id = $_GET["id"];

if(empty($id)) {
    header("location: teacher.php");
}
if(isset($_POST["submit"])) {

    $t_name = $_POST["teacher_name"];
    $t_phone = $_POST["teacher_phone"];
    $t_email = $_POST["teacher_email"];
    $c_name = $_POST["course_name"];
    $shift = $_POST["shift"];


    $sql1 = "UPDATE teacher SET TEACHER_NAME = ?,TEACHER_PHONE = ?,TEACHER_EMAIL = ?,COURSE = ?,SHIFT = ? WHERE TEACHER_ID = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql1);
    mysqli_stmt_bind_param($stmt,"sisssi",$t_name,$t_phone,$t_email,$c_name,$shift,$id);
    mysqli_stmt_execute($stmt);

    header("location: teacher.php");
}


$sql = "SELECT * FROM teacher WHERE TEACHER_ID = ?";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt,"i",$id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

?>

<?php
include("dashboard.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="sytle.css">
</head>
<body>
    <div class="d-flex justify-content-center">

        <div class="cont d-flex justify-content-center profile">
            <div class="card " style="width: 100%">
                <div class="card-header bg-primary text-light text-center">
                    <h1>Update Teacher</h1>
                </div>
                <div class="body py-2">
                <form action="" method="post" class="px-2">
                    <div class="row my-2">
                        <div class="col-12 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-id-card"></i>
                                </span>
                                <input class="form-control" type="number" disabled placeholder="Enter Teacher ID" value="<?php echo $row["TEACHER_ID"] ?>">
                            </div>
                        </div>
                        <div class="col-12 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                                </span>
                                <input class="form-control" type="text" required name="teacher_name" placeholder="Enter Teacher Name" value="<?php echo $row["TEACHER_NAME"] ?>">
                            </div>
                        </div>
                        <div class="col-12 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-phone"></i>
                                </span>
                                <input class="form-control" type="number" required name="teacher_phone" placeholder="Enter Teacher Phone" value="<?php echo $row["TEACHER_PHONE"] ?>">
                            </div>
                        </div>
                        <div class="col-12 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-envelope"></i>
                                </span>
                                <input class="form-control" type="email" required name="teacher_email" placeholder="Enter Teacher Email" value="<?php echo $row["TEACHER_EMAIL"] ?>">
                            </div>
                        </div>
                        <div class="col-12 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-chalkboard-user"></i>
                                </span>
                                <input class="form-control" type="name" required name="course_name" placeholder="Enter Course Name" value="<?php echo $row["COURSE"] ?>">
                            </div>
                        </div>
                        <div class="col-12 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-clock"></i>
                                </span>
                                <select name="shift" class="form-select">
                                    <?php
                                    if($row["SHIFT"] == "Morning") {
                                        echo '
                                        <option value="Morning" selected>Morning</option>
                                            <option value="Afternoon">Afternoon</option>
                                        ';
                                    }
                                    elseif($row["SHIFT"] == "Afternoon") {
                                        echo '
                                            <option value="Morning">Morning</option>
                                            <option value="Afternoon" selected>Afternoon</option>
                                        ';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 mb-2 mb-sm-0 my-sm-2">
                            
                            <button type="submit" name="submit" value="Save" class="btn btn-success d-block" style="width: 100%;">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span class="ps-1">Save</span>
                            </button>
                        </div>
                       
                    </div>
                </form>
                </div>
            </div>
    
        </div>
    </div>
   
<?php
    include("footer.php");
?>
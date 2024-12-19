<?php

include("conn_db.php");
$id = $_GET["id"];

if(empty($id)) {
    header("location: student_reg.php");
}
if(isset($_POST["submit"])) {

    $s_name = $_POST["student_name"];
    $s_phone = $_POST["student_phone"];
    $region = $_POST["region"];
    $city= $_POST["city"];
    $department = $_POST["department"];



    $sql1 = "UPDATE student SET STUDENT_NAME = ?,STUDENT_PHONE = ?,REGION = ?,CITY = ?,DEPARTMENT = ? WHERE STUDENT_ID = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql1);
    mysqli_stmt_bind_param($stmt,"sisssi",$s_name,$s_phone,$region,$city,$department,$id);
    mysqli_stmt_execute($stmt);

    header("location: student_reg.php");
}


$sql = "SELECT * FROM student WHERE STUDENT_ID = ?";
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
    <title>Update Student</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="sytle.css">
</head>
<body>
    <div class="d-flex justify-content-center">

        <div class="cont d-flex justify-content-center profile">
            <div class="card " style="width: 100%">
                <div class="card-header bg-primary text-light text-center">
                    <h1>Update Student</h1>
                </div>
                <div class="body py-2">
                <form action="#" method="post" class="px-2">
                    <div class="row my-2">
                        <div class="col-12 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-id-card"></i>
                                </span>
                                <input class="form-control" type="number" disabled placeholder="Enter Student ID" value="<?php echo $row["STUDENT_ID"] ?>">
                            </div>
                        </div>
                        <div class="col-12 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                                </span>
                                <input class="form-control" type="text" required name="student_name" placeholder="Enter Student Name" value="<?php echo $row["STUDENT_NAME"] ?>">
                            </div>
                        </div>
                        <div class="col-12 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-phone"></i>
                                </span>
                                <input class="form-control" type="number" required name="student_phone" placeholder="Enter Student Phone" value="<?php echo $row["STUDENT_PHONE"] ?>">
                            </div>
                        </div>
                        <div class="col-12 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-location-dot"></i>
                                </span>
                                <select name="region" class="form-select">
                                    <option value="Bari">Bari</option>
                                    <option value="Nugaal">Nugaal</option>
                                    <option value="Sanaag">Sanaag</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-building"></i>
                                </span>
                                <select name="city" class="form-select">
                                    <option value="Bosaso">Bosaso</option>
                                    <option value="Garoowe">Garoowe</option>
                                    <option value="Dhahar">Dhahar</option>
                                </select>
                            </div>
                        </div>
                  
                        

                        <div class="col-12 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-building"></i>
                                </span>
                                <select name="department" class="form-select">
                                <?php
                                    $sql = "SELECT DEPARTMENT_NAME FROM department";
                                    $result = mysqli_query($conn,$sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '
                                            <option value="'.$row["DEPARTMENT_NAME"].'">'.$row["DEPARTMENT_NAME"].'</option>
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
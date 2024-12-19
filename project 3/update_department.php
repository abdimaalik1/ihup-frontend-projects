<?php

include("conn_db.php");
$id = $_GET["id"];

if(empty($id)) {
    header("location: department.php");
}
if(isset($_POST["submit"])) {
    $d_name = $_POST["d_name"];
    $d_date = $_POST["d_date"];



    $sql = "UPDATE  department SET DEPARTMENT_NAME = ?, DEPARTMENT_REG = ? WHERE DEPARTMENT_ID = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"ssi",$d_name,$d_date,$id);
    mysqli_stmt_execute($stmt);
    header("location: department.php");
}


$sql = "SELECT * FROM department WHERE DEPARTMENT_ID = ?";
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
    <title>Update Department</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="sytle.css">
</head>
<body>
    <div class="d-flex justify-content-center">

        <div class="cont d-flex justify-content-center profile">
            <div class="card " style="width: 100%">
                <div class="card-header bg-primary text-light text-center">
                    <h1>Update Department</h1>
                </div>
                <div class="body py-2">
                <form action="#" method="post" class="px-2">
                    <div class="row my-2">
                        <div class="col-12 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-id-card"></i>
                                </span>
                                <input class="form-control" type="number" disabled name="d_id" placeholder="Enter Department ID" value="<?php echo $row["DEPARTMENT_ID"] ?>">
                            </div>
                        </div>
                        <div class="col-12 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-building"></i>
                                </span>
                                <input class="form-control" type="text" name="d_name" required placeholder="Enter Department Name" value="<?php echo $row["DEPARTMENT_NAME"] ?>">
                            </div>
                        </div>
                        <div class="col-12 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-calendar-days"></i>
                                </span>
                                <input class="form-control" type="date" name="d_date" required value="<?php echo $row["DEPARTMENT_REG"] ?>">
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
<?php
include("dashboard.php");
include("conn_db.php");
$success = "";
if(!empty($_POST["submit"])) {
    $t_name = $_POST["teacher_name"];
    $t_phone = $_POST["teacher_phone"];
    $t_email = $_POST["teacher_email"];
    $d_name = $_POST["d_name"];
    $c_name = $_POST["course_name"];
    $shift = $_POST["shift"];


    $sql1 = "INSERT INTO teacher (TEACHER_NAME,TEACHER_PHONE,TEACHER_EMAIL,DEPARTMENT,COURSE,SHIFT)
    VALUES (?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql1);
    mysqli_stmt_bind_param($stmt,"sissss",$t_name,$t_phone,$t_email,$d_name,$c_name,$shift);
    mysqli_stmt_execute($stmt);

    $success = "Registeration SuccessFuly";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="sytle.css">
</head>
<body>
    <div class="cont">
        <?php
            if(!empty($success)) {
                echo '
                <div class="alert alert-success alert-dismissible  show" role="alert">
                    <strong>Sended!</strong> '.$success.'.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                ';
        }

        ?>
        <div class="card tc">
            <div class="card-header bg-primary text-light">
                <h1>Add Teacher</h1>
            </div>
            <div class="body py-2">
                <form action="" method="post" class="px-2">
                    <div class="row my-2">
                        <div class="col-sm-4 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-id-card"></i>
                                </span>
                                <input class="form-control" type="number" disabled placeholder="Enter Teacher ID">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                                </span>
                                <input class="form-control" type="text" required name="teacher_name" placeholder="Enter Teacher Name">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-phone"></i>
                                </span>
                                <input class="form-control" type="number" required name="teacher_phone" placeholder="Enter Teacher Phone">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-envelope"></i>
                                </span>
                                <input class="form-control" type="email" required name="teacher_email" placeholder="Enter Teacher Email">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-building"></i>
                                </span>
                                <select name="d_name" class="form-select">
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
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-chalkboard-user"></i>
                                </span>
                                <input class="form-control" type="name" required name="course_name" placeholder="Enter Course Name">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-clock"></i>
                                </span>
                                <select name="shift" class="form-select">
                                    <option value="Morning">Morning</option>
                                    <option value="Afternoon">Afternoon</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-sm-6 mb-2 mb-sm-0 my-sm-2">
                            
                            <button type="submit" name="submit" value="Save" class="btn btn-success d-block" style="width: 100%;">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span class="ps-1">Save</span>
                            </button>
                        </div>
                        <div class="col-sm-6 mb-2 mb-sm-0 my-sm-2">
                            <button type="reset" class="btn btn-warning text-light" style="width: 100%;">
                            <i class="fa-solid fa-rotate-right"></i>
                            <span class="ps-1">Reset</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card table-bg mt-5 tc">
            <div class="card-header bg-primary text-light">
                <h2>Teachers</h2>
            </div>
            <div class="">
                <table class="table table-striped table-hover table-primary table-borderless ">
                    <thead class="text-center text-uppercase">
                        <tr >
                            <th>#</th>
                            <th>Teacher Name</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>Department</th>
                            <th>Course</th>
                            <th>Workshift</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $sql2 = "SELECT * FROM teacher";
                        $result1 = mysqli_query($conn,$sql2);

                        while($row = mysqli_fetch_assoc($result1)) {
                        echo '
                            <tr>
                        <td>'.$row["TEACHER_ID"].'</td>
                            <td>'.$row["TEACHER_NAME"].'</td>
                            <td>'.$row["TEACHER_PHONE"].'</td>
                            <td>'.$row["TEACHER_EMAIL"].'</td>
                            <td>'.$row["DEPARTMENT"].'</td>
                            <td>'.$row["COURSE"].'</td>
                            <td>'.$row["SHIFT"].'</td>
                            <td>
                            <a href="update_teacher.php?id='.$row["TEACHER_ID"].'">
                            <button type="submit" class="btn btn-info text-light">
                            <i class="fa-solid fa-pen"></i>    
                            <span class="ps-1">Edit</span>    
                            </button>
                            </a>
                            <a href="delete_teacher.php?id='.$row["TEACHER_ID"].'">
                            <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                            <span class="ps-1">Delete</span>    
                            </button>
                            </a>
                            </td>
                        </tr>
                        ';
                        }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
<?php
    include("footer.php");
?>
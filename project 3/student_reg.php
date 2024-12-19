<?php
include("dashboard.php");
include("conn_db.php");
$success = "";
if(!empty($_POST["submit"])) {

$s_name = $_POST["student_name"];
$s_phone = $_POST["student_phone"];
$region = $_POST["region"];
$city= $_POST["city"];
$sch_name= $_POST["school_name"];
$date = $_POST["date"];
$p_birth = $_POST["place_birth"];
$gender = $_POST["gender"];
$department = $_POST["department"];
$shift = $_POST["shift"];
$s_email = $_POST["student_email"];



    $sql1 = "INSERT INTO student (STUDENT_NAME,STUDENT_PHONE,REGION,CITY,SCHOOL,DATE,PLACE_BIRTH,GRNDER,DEPARTMENT,SHIFT,STUDENT_EMAIL)
    VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql1);
    mysqli_stmt_bind_param($stmt,"sisssssssss",$s_name,$s_phone,$region,$city,$sch_name,$date,$p_birth,$gender,$department,$shift,$s_email);
    mysqli_stmt_execute($stmt);

    $success = "Registeration SuccessFuly";


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
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
        <div class="card">
            <div class="card-header bg-primary text-light">
                <h1>Add Student</h1>
            </div>
            <div class="body py-2">
                <form action="#" method="post" class="px-2">
                    <div class="row my-2">
                        <div class="col-sm-4 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-id-card"></i>
                                </span>
                                <input class="form-control" type="number" disabled placeholder="Enter Student ID">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                                </span>
                                <input class="form-control" type="text" required name="student_name" placeholder="Enter Student Name">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-phone"></i>
                                </span>
                                <input class="form-control" type="number" required name="student_phone" placeholder="Enter Student Phone">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
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
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
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
                  
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-school"></i>
                                </span>
                                <input class="form-control" type="name" required name="school_name" placeholder="Enter School Name">
                            </div>
                        </div>

                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-calendar-days"></i>
                                </span>
                                <input class="form-control" name="date" required type="date">
                            </div>
                        </div>

                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                                <input class="form-control" type="text" required name="place_birth" placeholder="Enter Place Of Birth">
                            </div>
                        </div>
                        
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-venus-mars"></i>
                                </span>
                                <select name="gender" class="form-select">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
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

                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-envelope"></i>
                                </span>
                                <input class="form-control" type="email" required name="student_email" placeholder="Enter Student Email">
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
                <h2>Registered Students</h2>
            </div>
            <div class="">
                <table class="table table-striped table-hover table-primary table-borderless ">
                    <thead class="text-center text-uppercase">
                        <tr >
                            <th>#</th>
                            <th>Name</th>
                            <th>phone</th>
                            <th>Region</th>
                            <th>City</th>
                            <th>Faculty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                        $sql2 = "SELECT * FROM student";
                        $result1 = mysqli_query($conn,$sql2);

                        while($row = mysqli_fetch_assoc($result1)) {
                        echo '
                             <tr>
                        <td>'.$row["STUDENT_ID"].'</td>
                            <td>'.$row["STUDENT_NAME"].'</td>
                            <td>'.$row["STUDENT_PHONE"].'</td>
                            <td>'.$row["REGION"].'</td>
                            <td>'.$row["CITY"].'</td>
                            <td>'.$row["DEPARTMENT"].'</td>
                            <td>
                            <a href="update_student.php?id='.$row["STUDENT_ID"].'">
                            <button type="submit" class="btn btn-info text-light">
                            <i class="fa-solid fa-pen"></i>    
                            <span class="ps-1">Edit</span>    
                            </button>
                            </a>
                            <a href="delete_student.php?id='.$row["STUDENT_ID"].'">
                            <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                            <span class="ps-1">Delete</span>    
                            </button>
                            <a/>
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
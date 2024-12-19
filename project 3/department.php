<?php
include("dashboard.php");
include("conn_db.php");
$success = "";
if(isset($_POST["submit"])) {
    $d_name = $_POST["d_name"];
    $d_date = $_POST["d_date"];




 
        $sql = "INSERT INTO department (DEPARTMENT_NAME,DEPARTMENT_REG)
        VALUES (?,?)";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"ss",$d_name,$d_date);
    mysqli_stmt_execute($stmt);

    $success = "Registeration SuccessFuly";

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="sytle.css">
</head>
<body>
    <div class="cont">
         <!-- -->
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
                <h1>Add Department</h1>
            </div>
            <div class="body py-2">
                <form action="#" method="post" class="px-2">
                    <div class="row my-2">
                        <div class="col-sm-4 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-id-card"></i>
                                </span>
                                <input class="form-control" type="number" disabled name="d_id" placeholder="Enter Department ID">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-building"></i>
                                </span>
                                <input class="form-control" type="text" name="d_name" required placeholder="Enter Department Name">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-calendar-days"></i>
                                </span>
                                <input class="form-control" type="date" name="d_date" required>
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

        <div class="card table-bg mt-5 db">
            <div class="card-header bg-primary text-light">
                <h2>Departments</h2>
            </div>
            <div class="">
                <table class="table table-striped table-hover table-primary table-borderless ">
                    <thead class="text-center text-uppercase">
                        <tr >
                            <th>#</th>
                            <th>Department Name</th>
                            <th>Registeration Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $sql2 = "SELECT * FROM department";
                        $result1 = mysqli_query($conn,$sql2);

                        while($row = mysqli_fetch_assoc($result1)) {
                            echo '
                                <tr>
                            <td>'.$row["DEPARTMENT_ID"].'</td>
                            <td>'.$row["DEPARTMENT_NAME"].'</td>
                            <td>'.$row["DEPARTMENT_REG"].'</td>
                            <td>
                            <a href="update_department.php?id='.$row["DEPARTMENT_ID"].'">
                            <button type="submit" class="btn btn-info text-light">
                            <i class="fa-solid fa-pen"></i>    
                            <span class="ps-1">Edit</span>    
                            </button>
                            </a>
                            <a href="delete_department.php?id='.$row["DEPARTMENT_ID"].'"> 
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
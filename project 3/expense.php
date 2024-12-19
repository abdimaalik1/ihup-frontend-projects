<?php
include("dashboard.php");

include("conn_db.php");
$duplicate = "";
$success = "";
if(isset($_POST["submit"])) {
    $ex_type = $_POST["ex_type"];
    $amount = $_POST["amount"];
    $date = $_POST["date"];
    $description = $_POST["description"];




    $sql = "INSERT INTO expense (EXPENSE_TYPE,AMOUNT,DATE,DESCRIPTION)
    VALUES (?,?,?,?)";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"siss",$ex_type,$amount,$date,$description);
    mysqli_stmt_execute($stmt);

    $success = "Registeration SuccessFuly";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense</title>
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
                <h1>Add Expense</h1>
            </div>
            <div class="body py-2">
                <form action="#" method="post" class="px-2">
                    <div class="row my-2">
                        <div class="col-sm-4 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-money-check-dollar"></i>
                                </span>
                                <input class="form-control" type="text" name="ex_type" placeholder="Enter Expense Type">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-dollar-sign"></i>
                                </span>
                                <input class="form-control" type="number" name="amount" placeholder="Enter Amount">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-calendar-days"></i>
                                </span>
                                <input class="form-control" type="date" name="date">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-chart-simple"></i>
                                </span>
                                <textarea id="" class="form-control" name="description" placeholder="Enter Description"></textarea>
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

    </div>
   
<?php
    include("footer.php");
?>
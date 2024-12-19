<?php
include("dashboard.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="sytle.css">
</head>
<body>
    <div class="cont">
        <div class="card">
            <div class="card-header bg-primary text-light">
                <h1>Subject Attendance</h1>
            </div>
            <div class="body py-2">
                <form action="" class="px-2">
                    <div class="row my-2">
                    
                        
                       
                        
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-building"></i>
                                </span>
                                <select name="" class="form-select">
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Computer Science">Health Science</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-chalkboard-user"></i>
                                </span>
                                <input class="form-control" type="date">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-calendar-week"></i>
                                </span>
                                <select name="" class="form-select">
                                    <option value="Semester 3">Semester 3</option>
                                    <option value="Semester 2">Semester 2</option>
                                    <option value="Semester 1">Semester 1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-clock"></i>
                                </span>
                                <select name="" class="form-select">
                                    <option value="Computer Science">Morning</option>
                                    <option value="Computer Science">Afternoon</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-book"></i>
                                </span>
                                <input class="form-control" type="name" placeholder="Enter Course Name">
                            </div>
                        </div>
                        <div class="col-sm-4 p-xs-2 mb-2 mb-sm-0 my-sm-2">
                            <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-check"></i>
                                </span>
                                <select name="" class="form-select">
                                    <option value="Computer Science">Attendance Wasn't Submitted Yet</option>
                                    <!-- <option value="Computer Science"></option> -->
                                </select>
                            </div>
                        </div>
                        
                       
                    </div>
                            <button type="submit" class="btn btn-success d-block" style="width: 20%;">
                            <i class="fa-solid fa-circle-check"></i>
                            <span class="ps-1">Submit Attendance</span>
                            </button>
                </form>
            </div>
        </div>

        <div class="card table-bg mt-5 db">
            <div class="card-header bg-primary text-light">
                <h2>Attendance List</h2>
            </div>
            <div class="">
                <table class="table table-striped table-hover table-primary table-borderless ">
                    <thead class="text-center text-uppercase">
                        <tr >
                            <th>#</th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                        <td>1</td>
                           <td>12345</td>
                           <td>Ali Yuusuf xuseen</td>
                           <td>
                           <select name="" class="form-select">
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                    <option value="Leaved">Leaved</option>
                                </select>
                           </td>
                        </tr>
                        <tr>
                        <td>1</td>
                           <td>12345</td>
                           <td>Ali Yuusuf xuseen</td>
                           <td>
                           <select name="" class="form-select">
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                    <option value="Leaved">Leaved</option>
                                </select>
                           </td>
                        </tr>
                        </tr>
                        <tr>
                        <td>1</td>
                           <td>12345</td>
                           <td>Ali Yuusuf xuseen</td>
                           <td>
                           <select name="" class="form-select">
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                    <option value="Leaved">Leaved</option>
                                </select>
                           </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
<?php
    include("footer.php");
?>
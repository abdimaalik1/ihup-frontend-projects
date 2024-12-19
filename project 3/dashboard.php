<?php
  session_start();
  if(empty($_SESSION["u_id"])) {
    header("location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sytle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/all.min.css">
    <link rel="stylesheet" href="font/fontawesome.min.css">
</head>
<body>
    <div class="full-container">
        <div class="side bg-primary" id="side">
            <div class="logo my-3 mx-2">
                <h3 class="text-light ">Citycot Univ</h3>
            </div>
            <div class="list-container mt-5">
              <!-- Accoration -->
              <div class="accordion " id="accordionExample">
                  <!-- Item One (Faculty) -->
                    <div class="mt-1">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                         <i class="fa-solid fa-file-lines"></i>
                        <span class="ps-2">Faculty</span> 
                        </button>
                      </h2>
                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <ul>
                          <li class="list-group-item"><a href="department.php" class="list-group-item  text-light">Departement</a></li>
                          <li class="list-group-item"><a href="teacher.php" class="list-group-item pt-2 text-light">Teachers</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- Item Two (Student) -->
                      <div class="">
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                          <i class="fa-solid fa-user"></i>
                            <span class="ps-2">Student</span>
                          </button>
                        </h2>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                          <ul>
                            <li class="list-group-item"><a href="student_reg.php" class="list-group-item text-light">Student Reg</a></li>
                            <li class="list-group-item"><a href="attendance.php" class="list-group-item pt-2 text-light">Attendance</a></li>
                          </ul>
                        </div>
                      </div>
                      <!-- Item Three (Bills) -->
                      <div class="">
                        <h2 class="accordion-header" id="headingThree">
                          <button class="accordion-button bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                          <i class="fa-solid fa-building-columns"></i>
                            <span class="ps-2">Bills</span>
                          </button>
                        </h2>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                          <ul>
                            <li class="list-group-item"><a href="expense.php" class="list-group-item pt-2 text-light">Expenses</a></li>
                          </ul>
                        </div>
                      </div>

                   </div> 
                   <!-- end Accoration -->





            </div>
        </div>
        <div class="main">
            <div class="nav border-bottom border-1 border-dark d-flex justify-content-end align-items-center">
             <div class="my-2 mx-3 ">
              <div class="dropdown">
                  <img src="img/LOGO.png" class="cur dropdown-toggle" data-bs-toggle="dropdown" width="50px" alt="">
                <ul class="dropdown-menu mt-2">
                  <li><a href="profile.php" class="dropdown-item">Profile</a></li>
                  <li class="dropdown-divider"></li>
                  <li><a href="logout.php" class="dropdown-item">Logout</a></li>
                </ul>
              </div>
             </div>
            </div>
            <div class="content mt-4">


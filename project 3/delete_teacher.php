
<?php
    include("conn_db.php");
    $id = $_GET["id"];

    $sql= "DELETE FROM teacher WHERE TEACHER_ID = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"i",$id);
    mysqli_stmt_execute($stmt);
    
    header("location: teacher.php");
?>

<?php
    session_start();
    include("conn_db.php");
    $_SESSION["emailorpasswrong"] = "";
    
    $_SESSION["email"] = "";

    if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE USER_EMAIL = ? AND USER_PASSWORD = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"ss",$email,$password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $num_rows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if($num_rows > 0 ) {
        $_SESSION["u_id"] = $row["USER_ID"];
        header("location: home.php");
    } else {
        $_SESSION["email"] = $email;
        $_SESSION["emailorpasswrong"] = "Email is cxamari10@gmail.com, password is 1234";
        header("location: login.php");
    }
}

?>
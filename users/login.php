<?php
require "../connect.php";

$email = $_POST['email'];
$password = md5($_POST['password']);


// $email = $_POST["email"];
// $password = md5($_POST["password"]);
//Check Logned
// queryOnline$ = "SELECT * FROM `user` WHERE `email` = '$email' AND `is_online` = 1";
// $resultOnline = mysqli_query($conn, $queryOnline);
//Login student
$querystudent = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'  AND `type` = '1'";
$resultstudent = mysqli_query($conn, $querystudent);
//Login teacher
$queryteacher = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'  AND `type` = '2'";
$resultteacher = mysqli_query($conn, $queryteacher);
//Login Company
$querycompany = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'   AND `type` = '3'";
$resultcompany = mysqli_query($conn, $querycompany);
//Login Admin
$queryadmin = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password' AND `type` = '0'";
$resultadmin = mysqli_query($conn, $queryadmin);
        if (mysqli_num_rows($resultstudent) == 1)
        {   
            $status['isSuccess'] = 1;
            $status['message'] = "Đăng nhập thành công";
            $status['email'] = $email;
        } else
        if (mysqli_num_rows($resultteacher) == 1)
        {
            $status['isSuccess'] = 2;
            $status['message'] = "Đăng nhập thành công";
            $status['email'] = $email;
        }else
        if (mysqli_num_rows($resultcompany) == 1)
        {
            $status['isSuccess'] = 3;
            $status['message'] = "Đăng nhập thành công";
            $status['email'] = $email;
        } else
        if (mysqli_num_rows($resultadmin) == 1)
        {
            $status['isSuccess'] = 0;
            $status['message'] = "Đăng nhập thành công";
            $status['email'] = $email;
        }else{
            $status['isSuccess'] = 404;
            $status['message'] = "Đăng nhập thất bại";
        }
    

    echo json_encode($status);

?>

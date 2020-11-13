<?php
require "../connect.php";
$email = $_POST["email"];
$password = md5($_POST['password'];
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
$status = "";
if ($email == "" || $password == "")
{
    $status = "NOT Empty email and password" . $conn->error;
}
else
{
        if (mysqli_num_rows($resultstudent) == 1)
        {
            $queryupdatestu = "UPDATE `user` SET `is_online` = 1 WHERE `email` = '$email'";
            if ($conn->query($queryupdatestu) === true)
            {   
                $status = 1;
            }
            else
            {
                $status = "Login faild 1 " . $conn->error;
            }
        } else
        if (mysqli_num_rows($resultteacher) == 1)
        {
            $queryupdateteacher = "UPDATE `user` SET `is_online` = 1 WHERE `email` = '$email'";
            if ($conn->query($queryupdateteacher) === true)
            {
                $status = 2;
            }
            else
            {
                $status = "Login faild2" . $conn->error;
            }
        }else
        if (mysqli_num_rows($resultcompany) == 1)
        {
            $queryupdatecompany = "UPDATE `user` SET `is_online` = 1 WHERE `email` = '$email'";
            if ($conn->query($queryupdatecompany) === true)
            {
                $status = 3;
            }
            else
            {
                $status = "Login faild3 " . $conn->error;
            }
        } else
        if (mysqli_num_rows($resultadmin) == 1)
        {
            $queryupdateadmin = "UPDATE `user` SET `is_online` = 1 WHERE `email` = '$email'";
            if ($conn->query($queryupdateadmin) === true)
            {
                $status = 0;
            }
            else
            {
                $status = "Login faild0" . $conn->error;
            }
        }
    
}
    echo json_encode(array(
        "response" => $status
    ));
    mysqli_close($conn);

?>

<?php

require "../connect.php";


$email = $_POST['emailStudent'];
$phonenumber = $_POST['phoneStudent'];
$password = md5($_POST['passwordStudent']);
$type = "1";


//check duplicate username
// $query = "SELECT * FROM `user` WHERE `username` = '$username'";
// $result = mysqli_query($conn, $query);
//Check duplicate email
$query_email = "SELECT * FROM `user` WHERE `email` = '$email'" ;
$result_email =  mysqli_query($conn, $query_email);
//Check fill input empty
if ($password == "" || $email == "" || $phonenumber ==""  ||$type="") {
	$status = "Nhập thông tin đầy đủ!";
}else{
  
	if (mysqli_num_rows($result_email) > 0) {
		$status = "email already exist";
	}else{
		$query = "INSERT INTO `user`(`email`, `phonenumber`, `password`, `type`)  VALUES ( '$email', '$phonenumber','$password','$type');";
		$selectuser ="SELECT*From user where email = '$email'";
		
		if (mysqli_query($conn, $query)) {
			$status = "Register success!!!";
		}else{
			$status = "Register Faild";
		}
	}
  
}
echo json_encode(array("response"=>$status));



?>
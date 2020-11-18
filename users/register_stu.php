<?php

require "../connect.php";
$email = $_POST['emailStudent'];
$phonenumber = $_POST['phoneStudent'];
$password = md5($_POST['passwordStudent']);
$name = $_POST['nameStudent'];
$major = $_POST['majorStudent'];
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
		$status = "Email đã tồn tại";
	}else{
		$queryuser = "INSERT INTO `user`(`email`, `phonenumber`, `password`, `type`)  VALUES ( '$email', '$phonenumber','$password','1');";
		$querystudent = "INSERT INTO `students`(`name_stu`, `major`, `email_user`) VALUES ('$name','$major','$email')";
		if (mysqli_query($conn, $queryuser)) {
			if (mysqli_query($conn, $querystudent)){
				$status['isSuccess'] = 1;
				$status['emailStudent'] = $email;
				$status['message'] = "Đăng kí thành công";
			}
			else{
				$status['isSuccess'] = 0;
				$status['message'] = "Đăng kí không thành công";
			}
		}else{
			$status['isSuccess'] = 0;
				$status['message'] = "Đăng kí không thành công";
		}
	}
  
}
echo json_encode($status);



?>
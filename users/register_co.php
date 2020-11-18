<?php

require "../connect.php";

$name = $_POST['nameCompany'];
$email = $_POST['emailCompany'];
$phonenumber = $_POST['phoneCompany'];
$password = md5($_POST['passwordCompany']);




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
		        $status['isSuccess'] = 0;
				$status['message'] = "email đã tồn tại";
	}else{
		$queryuser = "INSERT INTO `user`(`email`, `phonenumber`, `password`, `type`)  VALUES ( '$email', '$phonenumber','$password','3');";
		$querycompany = "INSERT INTO `company`(`name_company`, `email_user`) VALUES ('$name','$email')";
		if (mysqli_query($conn, $queryuser)) {
			if(mysqli_query($conn, $querycompany)){
				$status['isSuccess'] = 1;
				$status['emailCompany'] = $email;
				$status['message'] = "Đăng kí thành công";
			}else{
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
<?php
  require "../connect.php";

  $target_dir = "../images/student/";
  $hosting = "http://192.168.1.113/wri/";
  $target_file = $target_dir. time() . "-" .basename($_FILES["image"]["name"]);
  $uploadOK = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check  = getimagesize($_FILES["image"]["tmp_name"]);
  $thumbnailstudent = $hosting."images/class/". time() . "-" .basename($_FILES["image"]["name"]);
  $emailUser = $_POST["emailUser"];
  $passwordUser = $_POST["passwordUser"];
  $codeStudent = $_POST["codeStudent"];
  $nameStudent = $_POST["nameStudent"];
  $birthdayStudent = $_POST["birthdayStudent"];
  $major = $_POST["major"];
  $phoneUser = $_POST["phoneUser"];
  $querryupStu = "UPDATE `students` SET `code_stu`='$codeStudent',`name_stu`='$nameStudent',`thumbnail_stu`="$thumbnailstudent",`birthday_stu`='$birthdayStudent',`major`='$major' WHERE `email_user` = '$emailUser'";
  $querryupUser = "UPDATE `user` SET `phonenumber`='$phoneUser',`password`="$passwordUser" WHERE `email`= '$emailUser'";
  $response = array();
  $error = "";
  if($check != false){
  	$uploadOK = 1;
  }else{
  	$uploadOK = 0;
  	$error .= "Tệp được tải lên không được hỗ trợ. ";
  }
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
	$uploadOK = 0;
	$error .= "Định dạng hình ảnh không được hỗ trợ";
}else{
	$uploadOK = 1;
}
if($uploadOK == 0){
   $response['status'] = 0;
   $response['message'] = $error;

}else{
	if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
     if (mysqli_query($conn, $querryupStu)) {
        if(mysqli_query($conn, $querryupStu)){
         $response['status'] = 1;
         $response['message'] = "Sửa thông tin thành công";
        }else{
         $response['status'] = 0;
         $response['message'] = "Sửa thông tin không thành công";
        
         }
         
      }else{
		$response['status'] = 0;
      $response['message'] = "Sửa thông tin không thành công";
     
      }

	}else{
		$response['status'] = 0;
      $response['message'] = "Sửa thông tin không thành công";
    
	}
}
echo json_encode($response);

?>
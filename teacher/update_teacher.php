<?php
  require "../connect.php";

  $target_dir = "../images/teacher/";
  $hosting = "http://192.168.1.113/wri/";
  $target_file = $target_dir. time() . "-" .basename($_FILES["image"]["name"]);
  $uploadOK = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check  = getimagesize($_FILES["image"]["tmp_name"]);
  $thumbnailTeacher = $hosting."images/teacher/". time() . "-" .basename($_FILES["image"]["name"]);
  $emailTeacher = $_POST["emailTeacher"];
  $codeTeacher = $_POST["codeTeacher"];
  $nameTeacher = $_POST["nameTeacher"];
  $phoneTeacher = $_POST["phoneTeacher"];
  $decriptionTeacher = $_POST["decriptionTeacher"];
  $querryupTeacher = "UPDATE `teacher` SET `code_teacher`='$codeTeacher',`name_teacher`='$nameTeacher',`description_teacher`='$decriptionTeacher',`thumbnail_teacher`='$thumbnailTeacher' WHERE `code_teacher`='$codeTeacher'";
  $querryupUser = "UPDATE `user` SET `phonenumber`='$phoneTeacher' WHERE `email`= '$emailTeacher'";
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
     if (mysqli_query($conn, $querryupTeacher)) {
        if(mysqli_query($conn, $querryupUser)){
         $response['status'] = 1;
         $response['message'] = "Cập nhập thông tin thành công";
        }else{
         $response['status'] = 0;
         $response['message'] = "Cập nhập thông tin không thành công";
         }
         
      }else{
		$response['status'] = 0;
      $response['message'] = "Cập nhập thông tin không thành công";
      }

	}else{
		$response['status'] = 0;
      $response['message'] = "Cập nhập thông tin không thành công";
    
	}
}
echo json_encode($response);

?>
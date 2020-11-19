<?php
  require "../connect.php";

  $target_dir = "../images/class/";
  $hosting = "http://192.168.1.113/wri/";
  $target_file = $target_dir. time() . "-" .basename($_FILES["image"]["name"]);
  $uploadOK = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check  = getimagesize($_FILES["image"]["tmp_name"]);
  $thumbnailclass = $hosting."images/class/". time() . "-" .basename($_FILES["image"]["name"]);
  $codeClass = $_POST["codeClass"];
  $nameClass = $_POST["nameClass"];
  $maxstudentClass = $_POST["maxstudentClass"];
  $decriptionClass = $_POST["decriptionClass"];
  $querry = "INSERT INTO `class`(`code_class`, `name_class`, `decription_class`,`maxstudent_class`,`thumbnail_class`) VALUES ('$codeClass','$nameClass','$decriptionClass','$maxstudentClass','$thumbnailclass')";
  
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
     if (mysqli_query($conn, $querry)) {
         $response['status'] = 1;
         $response['message'] = "Tạo lớp thành công";
         $response['codeClass'] = $codeClass;
         $response['thumbnailclass'] = $thumbnailclass;
         $response['nameClass'] = $nameClass;
         $response['maxstudentClass'] = $maxstudentClass;
         $response['decriptionClass'] = $decriptionClass;
      }else{
		$response['status'] = 0;
      $response['message'] = "Tạo lớp không thành công";
      $response['codeClass'] = $codeClass;
      $response['thumbnailclass'] = $thumbnailclass;
      $response['nameClass'] = $nameClass;
      $response['maxstudentClass'] = $maxstudentClass;
      $response['decriptionClass'] = $decriptionClass;
      }

	}else{
		$response['status'] = 0;
      $response['message'] = "Tạo lớp không thành công";
      $response['codeClass'] = $codeClass;
      $response['thumbnailclass'] = $thumbnailclass;
      $response['nameClass'] = $nameClass;
      $response['maxstudentClass'] = $maxstudentClass;
      $response['decriptionClass'] = $decriptionClass;
	}
}
echo json_encode($response);
?>
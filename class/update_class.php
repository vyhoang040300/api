<?php
  require "../connect.php";

  $target_dir = "image/";
  $hosting = "http://192.168.1.96/wri/";
  $target_file = $target_dir. time() . "-" .basename($_FILES["image"]["name"]);
  $uploadOK = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check  = getimagesize($_FILES["image"]["tmp_name"]);
  $thumbnailclass = $hosting.$target_file;
  
  $id = $_POST['id'];
  $codeClass = $_POST["codeClass"];
  $nameClass = $_POST["nameClass"];
  $maxstudentClass = $_POST["maxstudentClass"];
  $decriptionClass = $_POST["decriptionClass"];

  $querry = "UPDATE `class` SET `code_class`=$codeClass,`name_class`= $nameClass,`decription_class`= $decriptionClass,`maxstudent_class`=$maxstudentClass,`thumbnail_class`=$thumbnailclass WHERE `id` =$id";
  
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
         $response['message'] = "Chỉnh sửa thành công";

      }else{
		$response['status'] = 0;
      $response['message'] = "Chỉnh sửa không thành công";
      }

	}else{
		$response['status'] = 0;
      $response['message'] = "Chỉnh sửa không thành công";
	}
}
echo json_encode($response);
?>
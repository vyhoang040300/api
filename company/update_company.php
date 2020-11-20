<?php
  require "../connect.php";

  $target_dir = "image/";
  $hosting = "http://192.168.1.96/wri/";
  $target_file = $target_dir. time() . "-" .basename($_FILES["image"]["name"]);
  $uploadOK = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check  = getimagesize($_FILES["image"]["tmp_name"]);
  $thumbnailclass = $hosting.$target_file;
  //  
  $id = $_POST['id'];
  $nameCompany = $_POST["name_company"];
  $thumbnailCompnay = $_POST["thumbnail_company"];
  $idWishLisht = $_POST["id_wishlist"];
  $idSampleEmail = $_POST["id_sample_email"];
  $emailUser = $_POST["email_user"];
  $idPacket = $_POST["id_packet"];

  $querry = "UPDATE `company` SET `id`=$id,
            `name_company`= $nameCompany,
            `thumbnail_company`= $thumbnailCompnay,
            `id_wishlist`=$idWishLisht,
            `id_sample_email`=$idSampleEmail,
            `email_user`=$emailUser,
            `id_packet`=$idPacket
             WHERE `email_user` =$emailUser";
  
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
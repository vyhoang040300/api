<?php
  require "../connect.php";

  $target_dir = "../images/teacher/";
  $hosting = "http://192.168.1.96/wri/";
  $target_file = $target_dir. time() . "-" .basename($_FILES["image"]["name"]);
  $uploadOK = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check  = getimagesize($_FILES["image"]["tmp_name"]);
  $thumbnailTeacher = $hosting."images/teacher/". time() . "-" .basename($_FILES["image"]["name"]);
  ///Post
  $codeTeacher = $_POST["codeTeacher"];
  $nameTeacher = $_POST["nameTeacher"];
  $emailTeacher = $_POST["emailTeacher"];
  $passwordTeacher = md5($_POST["passwordTeacher"]);
  $phoneTeacher = $_POST["phoneTeacher"];
  $decriptionTeacher = $_POST["decriptionTeacher"];
  //
  $querry = "INSERT INTO `teacher`(`code_teacher`, `name_teacher`, `description_teacher`, `thumbnail_teacher`, `email_user`) VALUES ('$codeTeacher','$nameTeacher','$decriptionTeacher','$thumbnailTeacher','$emailTeacher');";
  $queryuser = "INSERT INTO `user`(`email`, `phonenumber`, `password`, `type`)  VALUES ( '$emailTeacher', '$phoneTeacher','$passwordTeacher','2');";
  $query_email = "SELECT * FROM `user` WHERE `email` = '$emailTeacher'" ;
  $result_email =  mysqli_query($conn, $query_email);
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
    if($codeTeacher == "" || $nameTeacher== "" ||  $emailTeacher="" || $passwordTeacher == "" || $phoneTeacher == ""){
        $response['status'] = 0;
        $response['message'] = "Nhập đầy đủ thông tin";
    }else{
    if (mysqli_num_rows($result_email) > 0) {
       $response['status'] = 0;
       $response['message'] = "Email đã tồn tại";
        }else{
            if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
                if(mysqli_query($conn, $queryuser)){
                  if (mysqli_query($conn, $querry)) {
                    $response['status'] = 1;
                    $response['message'] = "Tạo tài khoản thành công";
                  }else{
                   $response['status'] = 0;
                   $response['message'] = "Tạo tài khoản không thành công2";
                  }
                }else{
                    $response['status'] = 0;
                    $response['message'] = "Tạo lớp không thành công 3";
              
                  }
            }else{
                 $response['status'] = 0;
                 $response['message'] = "Tạo lớp không thành công 4";
           
               }
        }
    
    }
	
}
echo json_encode($response);
?>
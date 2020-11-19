<?php
  require "../connect.php";
 //get teacher 
  $codeteacher = $_POST['codeTeacher'];
  $idClass = $_POST['idClass'];
  $queryteacher = "INSERT INTO `teacher_class`(`code_teacher`, `id_class`) VALUES ('$codeteacher','$idClass');";
  //check teacher joined class
  $queryCheck = "SELECT*FROM `teacher_class` WHERE `code_teacher`= '$codeteacher' and `id_class` = '$idClass' ";
  $resultCheck = mysqli_query($conn, $queryCheck);
  if (mysqli_num_rows($resultCheck) > 0) {
    $status['isSuccess'] = 0;
    $status['message'] = "Giáo viên đã tham gia lớp";
   }else{
    if (mysqli_query($conn, $queryteacher)){
     
        $status['isSuccess'] = 1;
        $status['message'] = "Thêm giáo viên vào lớp thành công";
      
    }else{
      $status['isSuccess'] = 0;
      $status['message'] = "Thêm học viên vào lớp không thành công";
    }
   }
  
   echo json_encode($status);

?>

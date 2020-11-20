<?php
  require "../connect.php";
  //current student as class with id
  // $id = '1';
  // $sql = "SELECT COUNT(*) as total FROM stu_class where id_class = $id";
  // $result = mysqli_query($conn,$sql);
  // $values = mysqli_fetch_assoc($result);
  // $num_rows = $values['total'];
  //add student as class
 
  //get code_stu => id_stu
   
  



 //get id student 
  $idStudent = $_POST['idStudent'];
  $idClass = $_POST['idClass'];
  
  $queryStudent = "INSERT INTO `stu_class`(`id_stu`, `id_class`) VALUES ('$idStudent','$idClass');";
  //check student joined class
  $queryCheck = "SELECT * FROM `stu_class` WHERE `id_stu` = '$idStudent' AND `id_class` = '$idClass';";
  $resultCheck = mysqli_query($conn, $queryCheck);
  if (mysqli_num_rows($resultCheck) > 0) {
    $status['isSuccess'] = 0;
    $status['message'] = "Học viên đã tham gia lớp";
   }else{
    if (mysqli_query($conn, $queryStudent)){
      $sql = "SELECT COUNT(*) as total FROM stu_class where `id_class` = $idClass";
      $result = mysqli_query($conn,$sql);
      $values = mysqli_fetch_assoc($result);
      $num_rows = $values['total'];
      $queryUpdateClass = "UPDATE `class` SET `currentstudent_class`= $num_rows WHERE `currentstudent_class` = '$idClass';";
      if(mysqli_query($conn, $queryUpdateClass)){
        $status['isSuccess'] = 1;
        $status['message'] = "Thêm học viên vào lớp thành công";
      }else{
        $status['isSuccess'] = 0;
        $status['message'] = "Thêm học viên vào lớp không thành công";
      }
      
    }else{
      $status['isSuccess'] = 0;
      $status['message'] = "Thêm học viên vào lớp không thành công";
    }
   }
  
   echo json_encode($status);

?>

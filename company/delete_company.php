<?php
  require "../connect.php";

  //  
  $id = $_POST['id'];
  $nameCompany = $_POST['name_company'];
  $thumbnailCompnay = $_POST['thumbnail_company'];
  $idWishLisht = $_POST['id_wishlist'];
  $idSampleEmail = $_POST['id_sample_email'];
  $emailUser = $_POST['email_user'];
  $idPacket = $_POST['id_packet'];
  //
  $querry = "DELETE FROM `company` WHERE `email_user` = $emailUser";
  //
 
  if (mysqli_query($conn, $querry)) {
    echo "Xóa thông tin doanh nghiệp thành công";
  } else {
    echo "Lỗi : " . mysqli_error($conn);
  }



?>
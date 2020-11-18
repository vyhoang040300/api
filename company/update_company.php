<?php
  require "../connect.php";

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
             WHERE `id` =$id";
  

  if (mysqli_query($conn, $querry)) {
    echo "Cập nhật thông tin doanh nghiệp thành công";
  } else {
    echo "Lỗi update: " . mysqli_error($conn);
  }



?>
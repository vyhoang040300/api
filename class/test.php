<?php
  require "../connect.php";
  $id = '1';
  $sql = "SELECT COUNT(*) as total FROM stu_class where id = $id";
  $result = mysqli_query($conn,$sql);
  $values = mysqli_fetch_assoc($result);
  $num_rows = $values['total'];
  echo $num_rows;
?>

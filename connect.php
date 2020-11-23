<?php
  
  $hostname="localhost";
  $username="root";
  $password="";
  $databasename="wri";
  $conn = mysqli_connect($hostname,$username,$password,$databasename);
  mysqli_query($conn,"SET NAMES 'utf8'"); 
 if(!$conn){
   die('Connection Failed: '.mysqli_connect_error());
 }
?>
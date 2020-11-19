<?php

require "../connect.php";
// $sql = "SELECT COUNT(*) as total FROM user";
//   $result = mysqli_query($conn,$sql);
//   $values = mysqli_fetch_assoc($result);
//   $num_rows = $values['total'];

// $codeStudent = $_POST['codeStudent'];
$codeStudent = 'wri001';

$query = "SELECT * FROM `students` WHERE `code_stu` = '$codeStudent'";

$data = mysqli_query($conn, $query);

class Students{
	function Students($id, $codeStudent, $nameStudent, $thumbnailStudent, $birthdayStudent,$major,$email_user){
        $this->id = $id;
        $this->codeStudent = $codeStudent;
		$this->nameStudent = $nameStudent;
		$this->thumbnailStudent = $thumbnailStudent;
		$this->birthdayStudent = $birthdayStudent;
		$this->major = $major;
		$this->email_user = $email_user;
	}
}


$arrayStudent = array();
while ($row = mysqli_fetch_assoc($data)) {
    array_push($arrayStudent, new Students(
         $row['id']
    	,$row['code_stu']
		,$row['name_stu']
		,$row['thumbnail_stu']
		,$row['birthday_stu']
		,$row['major']
        ,$row['email_user']));
}

echo json_encode($arrayStudent);
echo json_encode($id);
?>
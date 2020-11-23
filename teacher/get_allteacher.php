<?php

require "../connect.php";
$query = "SELECT teacher.code_teacher, teacher.name_teacher, teacher.description_teacher, teacher.thumbnail_teacher,teacher.email_user,user.phonenumber
FROM teacher INNER JOIN user ON teacher.email_user = user.email WHERE 1";

$data = mysqli_query($conn, $query);

class Teacher{
	function Teacher($codeTeacher, $nameTeacher, $descriptionTeacher, $thumbnaulTeacher,$emailUser,$phoneUser){
        $this->codeTeacher = $codeTeacher;
		$this->nameTeacher = $nameTeacher;
		$this->descriptionTeacher = $descriptionTeacher;
		$this->thumbnaulTeacher = $thumbnaulTeacher;
		$this->emailUser = $emailUser;
		$this->phoneUser = $phoneUser;
	}
}


$arrayTeacher = array();
while ($row = mysqli_fetch_assoc($data)) {
    array_push($arrayTeacher, new Teacher(
      
    	$row['code_teacher']
		,$row['name_teacher']
		,$row['description_teacher']
		,$row['thumbnail_teacher']
		,$row['email_user']
		,$row['phonenumber']));
}
echo json_encode($arrayTeacher);

?>
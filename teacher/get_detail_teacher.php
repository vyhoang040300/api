<?php

require "../connect.php";

class Teacher{
	function Teacher($codeTeacher, $nameTeacher, $descriptionTeacher, $thumbnailTeacher,$emailUser,$phoneUser){
        $this->codeTeacher = $codeTeacher;
		$this->nameTeacher = $nameTeacher;
		$this->descriptionTeacher = $descriptionTeacher;
		$this->thumbnailTeacher = $thumbnailTeacher;
		$this->emailUser = $emailUser;
		$this->phoneUser = $phoneUser;
	}
}
if(isset($_POST['codeTeacher'])){
    $codeTeacher = $_POST['codeTeacher'];
$query = "SELECT teacher.code_teacher, teacher.name_teacher, teacher.description_teacher, teacher.thumbnail_teacher,teacher.email_user,user.phonenumber
FROM teacher INNER JOIN user ON teacher.email_user = user.email WHERE code_teacher = '$codeTeacher'";
}
$data = mysqli_query($conn, $query);


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
<?php

require "../connect.php";
$query = "SELECT students.id, students.code_stu, students.name_stu, students.thumbnail_stu, students.birthday_stu, students.major, students.email_user, user.phonenumber
FROM students INNER JOIN user ON students.email_user = user.email WHERE 1";

$data = mysqli_query($conn, $query);

class Students{
	function Students($id, $codeStudent, $nameStudent, $thumbnailStudent, $birthdayStudent,$major,$emailUser,$phoneUser){
        $this->id = $id;
        $this->codeStudent = $codeStudent;
		$this->nameStudent = $nameStudent;
		$this->thumbnailStudent = $thumbnailStudent;
		$this->birthdayStudent = $birthdayStudent;
		$this->major = $major;
		$this->emailUser = $emailUser;
		$this->phoneUser = $phoneUser;
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
		,$row['email_user']
		,$row['phonenumber']));
}
echo json_encode($arrayStudent);

?>
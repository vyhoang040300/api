<?php

require "../connect.php";
// $sql = "SELECT COUNT(*) as total FROM user";
//   $result = mysqli_query($conn,$sql);
//   $values = mysqli_fetch_assoc($result);
//   $num_rows = $values['total'];

$codestudent = $_POST['']
$query = "SELECT * FROM `students` WHERE `code_student` =$codestudent";

$data = mysqli_query($conn, $query);

class Students{
	function Students($id, $code_student, $name_stu, $thumbnail_stu, $birthday_stu, $major, $email_user,$id_class, $id_point){

        $this->id = $id;
        $this->codeStudent = $code_student;
		$this->nameStudent = $name_stu;
		$this->thumbnailStudent = $thumbnail_stu;
		$this->birthdayStudent = $birthday_stu;
		$this->major = $major;
		$this->emailUser = $email_user;
		$this->idClass = $id_class;
		$this->idPoint = $id_point;
		

	}
}


$arrayStudent = array();
while ($row = mysqli_fetch_assoc($data)) {
    array_push($arrayStudent, new Students($row['id']
    	,$row['code_student']
		,$row['name_stu']
		,$row['thumbnail_stu']
		,$row['birthday_stu']
		,$row['major']
        ,$row['email_user']
        ,$row['id_class']
		,$row['id_point']));


}

echo json_encode($arrayStudent);

?>
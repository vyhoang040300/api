<?php

require "../connect.php";
// $sql = "SELECT COUNT(*) as total FROM user";
//   $result = mysqli_query($conn,$sql);
//   $values = mysqli_fetch_assoc($result);
//   $num_rows = $values['total'];
   

$query = "SELECT `id`, `code_class`, `name_class`, `decription_class`, `maxstudent_class`, `thumbnail_class`, `currentstudent_class` FROM `class` WHERE 1";

$data = mysqli_query($conn, $query);

class Classs{
	function Classs($id, $code_class, $name_class, $decription_class, $maxstudent_class, $thumbnail_class, $currentstudent_class){

		$this->id = $id;
		$this->codeClass = $code_class;
		$this->nameClass = $name_class;
		$this->decriptionClass = $decription_class;
		$this->maxStudentClass = $maxstudent_class;
		$this->thumbnailClass = $thumbnail_class;
		$this->currentStudentClass = $currentstudent_class;
		
		

	}
}


$arrayClass = array();
while ($row = mysqli_fetch_assoc($data)) {
	array_push($arrayClass, new Classs($row['id']
		,$row['code_class']
		,$row['name_class']
		,$row['decription_class']
		,$row['maxstudent_class']
		,$row['thumbnail_class']
		,$row['currentstudent_class']));


}

echo json_encode($arrayClass);

?>
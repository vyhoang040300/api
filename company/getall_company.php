<?php

require "../connect.php";
// $sql = "SELECT COUNT(*) as total FROM user";
//   $result = mysqli_query($conn,$sql);
//   $values = mysqli_fetch_assoc($result);
//   $num_rows = $values['total'];
$emailuser=$_POST['']

$query = "SELECT * FROM `company` WHERE `email_user`= $emailuser";

$data = mysqli_query($conn, $query);

class Companys{
	function Companys($id, $name_company, $thumbnail_company, $id_wishlist, $id_sample_email, $email_user, $id_packet){

		$this->id = $id;
		$this->nameCompany = $name_company;
		$this->thumbnailCompany = $thumbnail_company;
		$this->idWishList = $id_wishlist;
		$this->idSampleEmail = $id_sample_email;
		$this->emailUser = $email_user;
		$this->idPacket = $id_packet;
		
		

	}
}


$arrayCompanys = array();
while ($row = mysqli_fetch_assoc($data)) {
	array_push($arrayCompanys, new Companys($row['id']
		,$row['name_company']
		,$row['thumbnail_company']
		,$row['id_wishlist']
		,$row['id_sample_email']
		,$row['email_user']
		,$row['id_packet']));


}

echo json_encode($arrayCompanys);

?>
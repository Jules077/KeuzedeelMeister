<?php
	include("functions.php");

	if(isset($_GET['studentenNummer'])){
		$data = GetKeuzedelen($_GET['studentenNummer']);
		echo json_encode($data);
	}else{
		echo json_encode(array("statusCode"=>201));
	}
?>
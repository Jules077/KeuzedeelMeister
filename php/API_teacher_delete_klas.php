<?php
	include("functions.php");

	if(isset($_POST['teacher']) && isset($_POST['klas'])){
		$data = DeleteKlas($_POST['teacher'], $_POST['klas']);
		echo json_encode($data);
	}else{
		echo json_encode(array("statusCode"=>201));
	}
?>
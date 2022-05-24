<?php
	include("functions.php");

	if(isset($_POST['teacher']) && isset($_POST['keuzedeelID'])){
		$data = DeleteKeuzedeel($_POST['teacher'], $_POST['keuzedeelID']);
		echo json_encode($data);
	}else{
		echo json_encode(array("statusCode"=>201));
	}
?>
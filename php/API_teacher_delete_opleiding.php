<?php
	include("functions.php");

	if(isset($_POST['teacher']) && isset($_POST['opleiding'])){
		$data = DeleteOpleiding($_POST['teacher'], $_POST['opleiding']);
		echo json_encode($data);
	}else{
		echo json_encode(array("statusCode"=>201));
	}
?>
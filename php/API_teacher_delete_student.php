<?php
	include("functions.php");

	if(isset($_POST['teacher']) && isset($_POST['student'])){
		$data = DeleteStudent($_POST['teacher'], $_POST['student']);
		echo json_encode($data);
	}else{
		echo json_encode(array("statusCode"=>201));
	}
?>
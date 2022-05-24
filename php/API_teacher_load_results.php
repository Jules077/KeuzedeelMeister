<?php
	include("functions.php");

	if(isset($_GET['teacher'])){
		$data = GetResults($_GET['teacher']);
		echo json_encode($data);
	}else{
		echo json_encode(array("statusCode"=>201));
	}
?>
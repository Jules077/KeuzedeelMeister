<?php
	include("functions.php");

	if(isset($_POST['teacher']) && isset($_POST['resultaat'])){
		$data = DeleteResultaat($_POST['teacher'], $_POST['resultaat']);
		echo json_encode($data);
	}else{
		echo json_encode(array("statusCode"=>201));
	}
?>
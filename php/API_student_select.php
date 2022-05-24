<?php
	include("functions.php");

	if(isset($_POST['studentenNummer']) && isset($_POST['keuzedeel']) && isset($_POST['keuzedeelVoorkeur'])){
		$data = AddChosenKeuzedeel($_POST['studentenNummer'], $_POST['keuzedeel'], $_POST['keuzedeelVoorkeur']);
		echo json_encode($data);
	}else{
		echo json_encode(array("statusCode"=>201));
	}
?>
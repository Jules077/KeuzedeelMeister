<?php
	include 'db.php';
	session_start();

	//set input
	$studentNummer = $_POST['studentenNummer'];
	$geboorte = $_POST['geboorte'];

	//mysql statement
	$check = mysqli_query($conn,"SELECT * from kz_studenten where studenten_nummer='$studentNummer' and geboorte='$geboorte'");
	
	//check if there is a result
	if (mysqli_num_rows($check)>0)
	{
		//set session for validation and give back succesfull login
		$_SESSION['studentNummer']=$studentNummer;
		echo json_encode(array("statusCode"=>200, "studentNummer"=>$studentNummer));
	}
	else{
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>
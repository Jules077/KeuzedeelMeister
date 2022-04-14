<?php
	include 'db.php';
	session_start();

	//set input
	$email = $_POST['email'];
	$password = $_POST['password'];

	//mysql statement
	$check = mysqli_query($conn,"SELECT * from kz_docenten where email='$email' and wachtwoord='$password'");
	
	//check if there is a result
	if (mysqli_num_rows($check)>0)
	{
		$teacher = 1;

		//set session for validation and give back succesfull login
		$_SESSION['email']=$email;
		$_SESSION['teacher']=$teacher;
		echo json_encode(array("statusCode"=>200, "teacher"=>$teacher));
	}
	else{
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>
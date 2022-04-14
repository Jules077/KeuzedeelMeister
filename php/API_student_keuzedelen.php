<?php	
	//Database connection
	include("db.php");
    session_start();

    $studentNummerPost = $_POST['studentenNummer'];

    if($_SESSION['studentNummer'] == $studentNummerPost){
        $get = mysqli_query($conn,"select * FROM kz_keuzedelen JOIN kz_opleiding_keuzedelen_junction ON kz_keuzedelen.keuzedeelNummer = kz_opleiding_keuzedelen_junction.keuzedeel_nummer JOIN kz_opleiding ON kz_opleiding.crebo = kz_opleiding_keuzedelen_junction.opleiding_crebo JOIN kz_klas ON kz_klas.opleiding_crebo = kz_opleiding.crebo JOIN kz_studenten ON kz_klas.klas_naam = kz_studenten.klas_naam WHERE kz_studenten.studenten_nummer = $studentNummerPost");
        
        	//check if there is a result
	if (mysqli_num_rows($get)>0)
	{
		//pust the data in array too give back
		$rows = array();
		$rows['statusCode'] = 200;
		while($r = mysqli_fetch_assoc($get)) {
			$rows[] = $r;
		}
		echo json_encode($rows);
	    }
	    else{
		    echo json_encode(array("statusCode"=>201));
	    }
	    mysqli_close($conn);
    }else{
        echo json_encode(array("statusCode"=>201));
    }

	//standerd mysql query for loading announcment

?>
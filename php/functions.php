<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();
$conn = NULL;
DEFINE ('DB_HOSTNAME', 'localhost');
DEFINE ('DB_DATABASE', 'keuzedeelmeister');
DEFINE ('DB_USERNAME', 'root');
DEFINE ('DB_PASSWORD', '');

/**
 * function to quickly dump info
 * about a variable in a readable manner
 */

function dd($var, $die = false)

{

    // print some HTML and CSS

    echo "<style>.debug{width: 50%; margin: 5px auto; padding: 3px; border:1px solid red; border-radius:5px;</style>";

    echo "<div class=\"debug\">";

    echo "<h5>Debug</h5>";

    // generate a backtrace

    $bt     = debug_backtrace();

    //

    $caller = array_shift($bt);

    // print some HTML

    echo "<h5>File : " . $caller['file'] . "</h5>";

    echo "<h5>Line : " . $caller['line'] . "</h5>";

    echo "<pre>";

    var_dump($var);

    echo "</pre>";

    if($die == true)

    {

        die("Died on Line " . $caller['line'] . "<br />Exit script!<br />No further ouput from here!</div>");

    }

    echo "</div>";

}

function dbConnect() {
    $dbConnect = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if(!$dbConnect) die("Unable to connect to MySQL: " . mysqli_error($dbConnect));
    return $dbConnect;
}

function GetKeuzedelen($studentNummer){
    if($_SESSION['studentNummer'] == $studentNummer){
        $conn = dbConnect();

        $sql = "SELECT studenten_nummer, voornaam, tussenvoegsel, achternaam, keuzedeelNummer, keuzedeel_info_url, keuzedeel_info, docent, plaatsen, keuzedeel_count, start_kiezen, eind_kiezen FROM kz_keuzedelen JOIN kz_opleiding_keuzedelen_junction ON kz_keuzedelen.keuzedeelNummer = kz_opleiding_keuzedelen_junction.keuzedeel_nummer JOIN kz_opleiding ON kz_opleiding.crebo = kz_opleiding_keuzedelen_junction.opleiding_crebo JOIN kz_klas ON kz_klas.opleiding_crebo = kz_opleiding.crebo JOIN kz_studenten ON kz_klas.klas_naam = kz_studenten.klas_naam LEFT JOIN ( SELECT keuzedeel_nummer, COUNT(*) AS keuzedeel_count FROM `kz_resultaten` WHERE `prioriteit`=1 GROUP BY keuzedeel_nummer ) keuzedeel_counts ON keuzedeel_counts.keuzedeel_nummer = kz_keuzedelen.keuzedeelNummer WHERE kz_studenten.studenten_nummer = $studentNummer";
        
        $sql2 = "SELECT studenten_nummer, COUNT(*) AS gekozen_count FROM `kz_resultaten` WHERE `studenten_nummer`=$studentNummer GROUP BY studenten_nummer LIMIT 1";
        
        $result = $conn->query($sql) or die($conn->error);
        $result2 = $conn->query($sql2) or die($conn->error);
        
        //check if there is a result
	    if ($result->num_rows > 0)
	    {
		    //pust the data in array too give back
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $data['gekozen'] = $result2->fetch_all(MYSQLI_ASSOC);
            $data['statusCode'] = 200;

            $conn -> close();
		    return $data;
	    }else{
            $sql = "SELECT * FROM kz_opleiding JOIN kz_klas ON kz_klas.opleiding_crebo = kz_opleiding.crebo JOIN kz_studenten ON kz_klas.klas_naam = kz_studenten.klas_naam WHERE kz_studenten.studenten_nummer = $studentNummer";

            $sql2 = "SELECT studenten_nummer, COUNT(*) AS gekozen_count FROM `kz_resultaten` WHERE `studenten_nummer`=$studentNummer GROUP BY studenten_nummer LIMIT 1";
        
            $result = $conn->query($sql) or die($conn->error);
            $result2 = $conn->query($sql2) or die($conn->error);

            if ($result->num_rows > 0)
	        {
		    //pust the data in array too give back
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $data['gekozen'] = $result2->fetch_all(MYSQLI_ASSOC);
            $data['statusCode'] = 200;

            $conn -> close();
		    return $data;
	        }else{
                return array("statusCode"=>404);
            }
        }
        
	}else{
		return array("statusCode"=>403);
	}
};

function GetResults($teacher) {
    if($_SESSION['teacher'] == $teacher){
        $conn = dbConnect();

        $sql = "SELECT resultaat_id, studenten_nummer, keuzedeel_nummer, keuzedeel_info, prioriteit, gekozen_op FROM `kz_resultaten` JOIN kz_keuzedelen ON kz_resultaten.keuzedeel_nummer = kz_keuzedelen.keuzedeelNummer";

        $result = $conn->query($sql) or die($conn->error);
        
        //check if there is a result
	    if ($result->num_rows > 0)
	    {
		    //pust the data in array too give back
            $data = $result->fetch_all(MYSQLI_ASSOC);

            $data['statusCode'] = 200;

            $conn -> close();
		    return $data;
	    } 
        else 
        {
            return array("statusCode"=>404);
        }
        
	}else{
		return array("statusCode"=>403);
	}
};

function GetOpleidingen($teacher) {
    if($_SESSION['teacher'] == $teacher){
        $conn = dbConnect();

        $sql = "SELECT * FROM `kz_opleiding`";

        $result = $conn->query($sql) or die($conn->error);
        
        //check if there is a result
	    if ($result->num_rows > 0)
	    {
		    //pust the data in array too give back
            $data = $result->fetch_all(MYSQLI_ASSOC);

            $data['statusCode'] = 200;

            $conn -> close();
		    return $data;
	    } 
        else 
        {
            return array("statusCode"=>404);
        }
        
	}else{
		return array("statusCode"=>403);
	}
};

function GetKlas($teacher) {
    if($_SESSION['teacher'] == $teacher){
        $conn = dbConnect();

        $sql = "SELECT * FROM `kz_klas`";

        $result = $conn->query($sql) or die($conn->error);
        
        //check if there is a result
	    if ($result->num_rows > 0)
	    {
		    //pust the data in array too give back
            $data = $result->fetch_all(MYSQLI_ASSOC);

            $data['statusCode'] = 200;

            $conn -> close();
		    return $data;
	    } 
        else 
        {
            return array("statusCode"=>404);
        }
        
	}else{
		return array("statusCode"=>403);
	}
};

function GetStudenten($teacher) {
    if($_SESSION['teacher'] == $teacher){
        $conn = dbConnect();

        $sql = "SELECT * FROM `kz_studenten`";

        $result = $conn->query($sql) or die($conn->error);
        
        //check if there is a result
	    if ($result->num_rows > 0)
	    {
		    //pust the data in array too give back
            $data = $result->fetch_all(MYSQLI_ASSOC);

            $data['statusCode'] = 200;

            $conn -> close();
		    return $data;
	    } 
        else 
        {
            return array("statusCode"=>404);
        }
        
	}else{
		return array("statusCode"=>403);
	}
};

function GetKeuzedelenTeacher($teacher) {
    if($_SESSION['teacher'] == $teacher){
        $conn = dbConnect();

        $sql = "SELECT * FROM `kz_keuzedelen`";

        $result = $conn->query($sql) or die($conn->error);
        
        //check if there is a result
	    if ($result->num_rows > 0)
	    {
		    //pust the data in array too give back
            $data = $result->fetch_all(MYSQLI_ASSOC);

            $data['statusCode'] = 200;

            $conn -> close();
		    return $data;
	    } 
        else 
        {
            return array("statusCode"=>404);
        }
        
	}else{
		return array("statusCode"=>403);
	}
};

function DeleteKeuzedeel($teacher, $keuzedeel){
    if($_SESSION['teacher'] == $teacher){
        $conn = dbConnect();

        $sql = "DELETE FROM `kz_keuzedelen` WHERE `kz_keuzedelen`.`keuzedeel_ID` = $keuzedeel";

        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($conn->query($sql) === TRUE) {
            $conn -> close();
            return array("statusCode"=>200);
          } else {
            return array("statusCode"=>404, "error"=>$conn->error);
          }
        
    }else{
		return array("statusCode"=>403);
	}
};

function DeleteOpleiding($teacher, $opleiding){
    if($_SESSION['teacher'] == $teacher){
        $conn = dbConnect();

        $sql = "DELETE FROM `kz_opleiding` WHERE `kz_opleiding`.`opleiding_ID` = $opleiding";

        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($conn->query($sql) === TRUE) {
            $conn -> close();
            return array("statusCode"=>200);
          } else {
            return array("statusCode"=>404, "error"=>$conn->error);
          }
        
    }else{
		return array("statusCode"=>403);
	}
};

function DeleteStudent($teacher, $student){
    if($_SESSION['teacher'] == $teacher){
        $conn = dbConnect();

        $sql = "DELETE FROM `kz_studenten` WHERE `kz_studenten`.`studenten_nummer` = $student";

        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($conn->query($sql) === TRUE) {
            $conn -> close();
            return array("statusCode"=>200);
          } else {
            return array("statusCode"=>404, "error"=>$conn->error);
          }
        
    }else{
		return array("statusCode"=>403);
	}
};

function DeleteKlas($teacher, $klas){
    if($_SESSION['teacher'] == $teacher){
        $conn = dbConnect();

        $sql = "DELETE FROM `kz_klas` WHERE `kz_klas`.`klas_naam` = '$klas'";

        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($conn->query($sql) === TRUE) {
            $conn -> close();
            return array("statusCode"=>200);
          } else {
            return array("statusCode"=>404, "error"=>$conn->error);
          }
        
    }else{
		return array("statusCode"=>403);
	}
};

function DeleteResultaat($teacher, $resultaat){
    if($_SESSION['teacher'] == $teacher){
        $conn = dbConnect();

        $sql = "DELETE FROM `kz_resultaten` WHERE `kz_resultaten`.`resultaat_id` = $resultaat";

        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($conn->query($sql) === TRUE) {
            $conn -> close();
            return array("statusCode"=>200);
          } else {
            return array("statusCode"=>404, "error"=>$conn->error);
          }
        
    }else{
		return array("statusCode"=>403);
	}
};

function AddChosenKeuzedeel($studentNummer, $keuzedeel, $keuzedeelVoorkeur){
    $result = GetKeuzedelen($studentNummer);
    $checkKeuzedeelVoorkeur = false;
    $checkKeuzedeel = false;

    if($result["statusCode"] == 200){
        $checkKeuzedeel = false;
        foreach ($result as $key => $val){
            if($key != "statusCode" || $key != "gekozen"){
                foreach ($val as $item){
                if($val["keuzedeelNummer"] == $keuzedeel){
                    if($val["keuzedeel_count"] != NULL){
                        $keuzedeelPlaats = $val["plaatsen"] - $val["keuzedeel_count"];
                        if($keuzedeelPlaats > 0){
                        $checkKeuzedeel = true;
                        }
                    }else{
                        $keuzedeelPlaats = $val["plaatsen"] - 0;
                        if($keuzedeelPlaats > 0){
                            $checkKeuzedeel = true;
                        }
                    }
                }
                if($val["keuzedeelNummer"] == $keuzedeelVoorkeur){
                    $checkKeuzedeelVoorkeur = true;
                }
            }
        }
    }

        if($result["gekozen"] == null && $checkKeuzedeelVoorkeur == true && $checkKeuzedeel == true){
            $conn = dbConnect();
            $sqlKeuzedeel = "INSERT INTO `kz_resultaten` (`resultaat_id`, `studenten_nummer`, `keuzedeel_nummer`, `prioriteit`, `gekozen_op`) VALUES (NULL, '$studentNummer', '$keuzedeel', '1', current_timestamp());";
    
            $sqlKeuzedeelVoorkeur = "INSERT INTO `kz_resultaten` (`resultaat_id`, `studenten_nummer`, `keuzedeel_nummer`, `prioriteit`, `gekozen_op`) VALUES (NULL, '$studentNummer', '$keuzedeelVoorkeur', '2', current_timestamp());";
    
            $result = $conn->query($sqlKeuzedeel) or die($conn->error);
            $result2 = $conn->query($sqlKeuzedeelVoorkeur) or die($conn->error);
    
            $conn -> close();
            return array("statusCode"=>200);
        }else{
            return array("statusCode"=>403);
        }
    }else{
        return array("statusCode"=>403);
    }
};

?>
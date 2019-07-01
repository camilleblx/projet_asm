<?php include("../../0-config/config-genos.php"); 

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {

		case 'statistiques-types-pubs':
		echo "salut";
			echo json_encode(pubs::StatistiquesCountType());
			break;	
	}
}
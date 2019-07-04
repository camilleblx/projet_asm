<?php include("../0-config/config-genos.php"); 

$id_participantcompetition = (isset($_POST['id_participantcompetition']) && !empty($_POST['id_participantcompetition'])) ? $_POST['id_participantcompetition'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {
		case 'check-presence':
			echo json_encode(participantcompetition::CheckPresence($id_participantcompetition));
			break;	
	}
}
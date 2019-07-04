<?php include("../0-config/config-genos.php"); 

$code = (isset($_POST['code']) && !empty($_POST['code'])) ? $_POST['code'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {
		case 'check-code':
			echo json_encode(connexion::CheckCode($code));
			break;	
			
		case 'liste-competition':
			echo json_encode(participantcompetition::ListeCompetitionParticipant());
			break;				
	}
}
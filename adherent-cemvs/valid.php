<?php include("../0-config/config-genos.php"); 

$id_entrainement = (isset($_POST['id_entrainement']) && !empty($_POST['id_entrainement'])) ? $_POST['id_entrainement'] : 0;
$id_utilisateur = (isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])) ? $_POST['id_utilisateur'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {
		case 'check-presence':
			echo json_encode(participantentrainement::CheckPresence($id_entrainement,$id_utilisateur));
			break;	
	}
}
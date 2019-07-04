<?php include("../0-config/config-genos.php"); 

$id_planningentrainement = (isset($_POST['id_planningentrainement']) && !empty($_POST['id_planningentrainement'])) ? $_POST['id_planningentrainement'] : 0;
$id_utilisateur = (isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])) ? $_POST['id_utilisateur'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {
		case 'check-presence':
			echo json_encode(participantentrainement::CheckPresence($id_planningentrainement,$id_utilisateur));
			break;	
	}
}
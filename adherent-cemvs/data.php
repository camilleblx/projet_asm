<?php include("../0-config/config-genos.php"); 

$code = (isset($_POST['code']) && !empty($_POST['code'])) ? $_POST['code'] : 0;
$id_typeentrainement = (isset($_POST['id_typeentrainement']) && !empty($_POST['id_typeentrainement'])) ? $_POST['id_typeentrainement'] : 0;
$id_entrainement = (isset($_POST['id_entrainement']) && !empty($_POST['id_entrainement'])) ? $_POST['id_entrainement'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {
		case 'entrainement-jour':
			echo json_encode(entrainement::GetEntrainementDuJour());
			break;			

		case 'check-code':
			echo json_encode(connexion::CheckCode($code));
			break;	
			
		case 'liste-participant-entrainement':
			echo json_encode(utilisateur::ListeUtilisateurEntrainement($id_entrainement,$id_typeentrainement));
			break;				
	}
}
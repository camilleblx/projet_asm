<?php include("../../../0-config/config-genos.php"); 

$id_utilisateur = (isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])) ? $_POST['id_utilisateur'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {
		case 'liste-objectif-commentaire':
			echo json_encode(commentaire::Listecommentaire());
			break;				

		case 'liste-objectif':
			echo json_encode(objectif::Listeobjectif());
			break;		
	}
}
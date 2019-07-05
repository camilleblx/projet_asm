<?php include("../../0-config/config-genos.php"); 

$id_utilisateur = (isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])) ? $_POST['id_utilisateur'] : 0;
filter_input(INPUT_POST, 'data', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {
		case 'liste-utilisateur-administrateur':
			echo json_encode(utilisateur::ListeUtilisateurAdministrateur());
			break;				

		case 'liste-utilisateur-maitrearme':
			echo json_encode(utilisateur::ListeUtilisateurMaitrearme());
			break;		

		case 'liste-utilisateur':
			echo json_encode(utilisateur::ListeUtilisateurUtilisateur());
			break;		
	}
}
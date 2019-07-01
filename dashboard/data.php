<?php include("../0-config/config-genos.php"); 

$id_utilisateur = (isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])) ? $_POST['id_utilisateur'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {
		case 'liste-utilisateur-entreprise':
			echo json_encode(utilisateur::ListeUtilisateurEntreprise());
			break;				

		case 'liste-utilisateur-magasin':
			echo json_encode(utilisateur::ListeUtilisateurMagasin());
			break;	

		case 'liste-pubs-visuels':
			echo json_encode(pubs::ListePubs(1));
			break;		

		case 'liste-pubs-sonores':
			echo json_encode(pubs::ListePubs(2));
			break;	

		case 'liste-pubs-olfactives':
			echo json_encode(pubs::ListePubs(3));
			break;	

		case 'statistiques-types-pubs':
			echo json_encode(pubs::StatistiquesCountType());
			break;	
	}
}
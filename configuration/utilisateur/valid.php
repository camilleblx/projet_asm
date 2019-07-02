<?php include("../../0-config/config-genos.php"); 

$id_utilisateur = (isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])) ? $_POST['id_utilisateur'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {

		case 'ajouter-utilisateur':
			$u = new utilisateur;
			$u->LoadForm();
			$u->mdp = sha1($u->mdp);
			$u->Add();
			header("location:index.php");
			break;		

		case 'supprimer-utilisateur':
			$u = new utilisateur;
			$u->id = $id_utilisateur;
			if($u->Delete() > 0) echo "1";
			else echo "0";
			break;		
	}
}
<?php include("../../0-config/config-genos.php"); 

$id_utilisateur = (isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])) ? $_POST['id_utilisateur'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {

		case 'ajouter-utilisateur':
			$u = new utilisateur;
			$u->LoadForm();
			// nouveau mot de passe
			$u->mdp = sha1($u->mdp);
			$u->Add();
			header("location:index.php");
			break;		

		case 'modifier-utilisateur':
			$u = new utilisateur;
			// nouveau mot de pase ?
			if(empty($_POST["mdp"])) unset($_POST["mdp"]);
			$u->id = intval($id_utilisateur);
			$u->Load();
			$u->LoadForm();
			// nouveau mot de passe ?
			if(isset($_POST["mdp"])) $u->mdp = sha1($u->mdp);
			$u->Update();
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
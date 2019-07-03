<?php include("../../0-config/config-genos.php"); 

$id_entrainement = (isset($_POST['id_entrainement']) && !empty($_POST['id_entrainement'])) ? $_POST['id_entrainement'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {

		case 'ajouter-entrainement':
			$e = new entrainement;
			$e->LoadForm();
			$e->Add();
			header("location:index.php");
			break;		

		case 'modifier-entrainement':
			$e = new entrainement;
			$e->id = intval($id_entrainement);
			$e->Load();
			$e->LoadForm();
			$e->Update();
			header("location:index.php");
			break;		

		case 'supprimer-entrainement':
			$u = new entrainement;
			$u->id = $id_utilisateur;
			if($u->Delete() > 0) echo "1";
			else echo "0";
			break;		
	}
}
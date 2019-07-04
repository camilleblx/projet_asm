<?php include("../../0-config/config-genos.php"); 

$id_annee = (isset($_POST['id_annee']) && !empty($_POST['id_annee'])) ? $_POST['id_annee'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {

		case 'ajouter-annee':
			$a = new annee;
			$a->LoadForm();
			$a->Add();
			header("location:index.php");
			break;		

		case 'modifier-annee':
			$a = new annee;
			$a->id = intval($id_annee);
			$a->Load();
			$a->LoadForm();
			$a->Update();
			header("location:index.php");
			break;		

		case 'supprimer-annee':
			$a = new annee;
			$a->id = $id_annee;
			if($a->Delete() > 0) echo "1";
			else echo "0";
			break;		
	}
}
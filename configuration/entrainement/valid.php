<?php include("../../0-config/config-genos.php"); 

$id_magasin = (isset($_POST['id_magasin']) && !empty($_POST['id_magasin'])) ? $_POST['id_magasin'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {

		case 'ajouter-magasin':
			$m = new magasin;
			$m->LoadForm();
			if($m->Add() > 0) echo "1";
			else echo "0";
			break;		

		case 'supprimer-magasin':
			$m = new magasin;
			$m->id = $id_magasin;
			if($m->Delete() > 0) echo "1";
			else echo "0";
			break;		
	}
}
<?php include("../../../0-config/config-genos.php"); 

$id_utilisateur = (isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])) ? $_POST['id_utilisateur'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {

		case 'ajouter-commentaire':
			$c = new commentaire;
			$c->LoadForm();
			if($c->Add() > 0) echo "1";
			else echo "0";
			break;

		case 'ajouter-objectif':
			$o = new objectif;
			$o->LoadForm();
			if($o->Add() > 0) echo "1";
			else echo "0";
			break;		

		case 'supprimer-commentaire':
			$c = new commentaire;
			$c->id = $id_utilisateur;
			if($c->Delete() > 0) echo "1";
			else echo "0";
			break;

		case 'supprimer-objectif':
			$o = new commentaire;
			$o->id = $id_utilisateur;
			if($o->Delete() > 0) echo "1";
			else echo "0";
			break;	
	}
}
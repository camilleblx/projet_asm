<?php include("../0-config/config-genos.php"); 

$id_utilisateur = (isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])) ? $_POST['id_utilisateur'] : 0;
$id_pub = (isset($_POST['id_pub']) && !empty($_POST['id_pub'])) ? $_POST['id_pub'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {
		case 'ajouter-utilisateur':
			$u = new utilisateur;
			$u->LoadForm();
			if(isset($_POST["admin"])) $u->admin = 1;
			$u->mdp = md5($u->mdp);
			if($u->Add() > 0) echo "1";
			else echo "0";
			break;			

		case 'ajouter-pub':
			$p = new pubs;
			$p->LoadForm();
			if($p->Add() > 0) echo "1";
			else echo "0";
			break;		

		case 'modifier-utilisateur':
			$u = new utilisateur;
			$u->id = $_SESSION["utilisateur"]["id_utilisateur"];
			$u->Load();
			$u->LoadForm();
			if(isset($_POST["admin"])) $u->admin = 1;
			$u->mdp = md5($u->mdp);
			if($u->Update() > 0) echo "1";
			else echo "0";
			break;		

		case 'supprimer-utilisateur':
			$u = new utilisateur;
			$u->id = $id_utilisateur;
			if($u->Delete() > 0) echo "1";
			else echo "0";
			break;	

		case 'supprimer-pub':
			$p = new pubs;
			$p->id = $id_pub;
			if($p->Delete() > 0) echo "1";
			else echo "0";
			break;		
	}
}
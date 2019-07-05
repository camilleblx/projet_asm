<?php include("../../0-config/config-genos.php"); 

$id_utilisateur = (isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])) ? $_POST['id_utilisateur'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {

		case 'ajouter-news':
			$n = new news;
			$n->LoadForm();
			$n->Add();
			header("location:index.php");
			break;		

		case 'modifier-news':
			$n = new news;
			$n->id = intval($id_news);
			$n->Load();
			$n->LoadForm();
			$n->Update();
			header("location:index.php");
			break;		

		case 'supprimer-news':
			$n = new news;
			$n->id = $id_news;
			if($n->Delete() > 0) echo "1";
			else echo "0";
			break;		
	}
}
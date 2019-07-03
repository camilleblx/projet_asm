<?php include("../../0-config/config-genos.php"); 

$id_competition = (isset($_POST['id_competition']) && !empty($_POST['id_competition'])) ? $_POST['id_competition'] : 0;

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {

		case 'ajouter-competition':
			$c = new competition;
			$c->LoadForm();
			$c->Add();
			header("location:index.php");
			break;		

		case 'modifier-competition':
			$c = new competition;
			$c->id = intval($id_competition);
			$c->Load();
			$c->LoadForm();
			$c->Update();
			header("location:index.php");
			break;		

		case 'supprimer-competition':
			$c = new competition;
			$c->id = $id_competition;
			if($c->Delete() > 0) echo "1";
			else echo "0";
			break;		
	}
}
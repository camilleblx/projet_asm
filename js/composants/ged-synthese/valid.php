<?php include("../../../0-config/config-genos.php");
if(isset($_GET["cas"])) $cas = $_GET["cas"];

$id_magasin     = (isset($_POST['id_magasin']) 	&& !empty($_POST['id_magasin'])) ? $_POST['id_magasin'] : 0;
$id_utilisateur = (isset($_POST['id_utilisateur']) 	&& !empty($_POST['id_utilisateur'])) ? $_POST['id_utilisateur'] : 0;
$id_categorie = (isset($_POST['id_categorie']) 	&& !empty($_POST['id_categorie'])) ? $_POST['id_categorie'] : 0;


switch ($cas) {
	case 'AjoutGed':
		$g = new ged;
		if(isset($_FILES)){ //Si je ne me suis pas chier dessus en envoyant le fichier
			$g->id_categorie   = intval($_POST["id_categorie"]);
			$g->id_magasin     = intval($_POST["id_magasin"]);
			$g->id_utilisateur = intval($_SESSION["utilisateur"]["id_utilisateur"]);
			$g->intitule       = ($_POST["intitule"] == "")?$_FILES["fichier"]["name"] : $_POST["intitule"];
			$g->commentaire    = $_POST["commentaire"];
			$g->extension      = ged::GetExtension($_FILES["fichier"]["name"]);
			$g->filename       = $_FILES["fichier"]["name"];
			$g->poids          = intval($_FILES["fichier"]["size"]) / 1024;
			$g->path           = ged::GetPath($id_magasin,$g->filename);
			$res               = move_uploaded_file($_FILES["fichier"]['tmp_name'],"../../../".$g->path);
			if($res === TRUE){
				$g->Add();
			}
		}
		break;
		
		// case 'ModifGed':
		// 	$g 					= new ged;
		// 	$g->id 				= $_POST["id"];
		// 	$g->Load();
		// 	$g->id_categorie 	= $_POST["id_categorie"];
		// 	$g->nom 			= $_POST["nom"];
		// 	$g->commentaire 	= $_POST["commentaire"];
		// 	$g->expiration 		= $_POST["expiration"];
		// 	if($g->expiration == 1) $g->date_expiration = $_POST["date_expiration"];
		// 	$g->Update();
		// 	break;

		// case 'SupprGed':
		// 	$g 				= new ged;
		// 	$g->id 			= $_POST["id"];
		// 	$g->Load();
		// 	$g->suppr 		= 1;
		// 	$g->Update();
		// 	unlink("../../../".$g->path);
		// 	break;
	
	default:
		# code...
		break;
}
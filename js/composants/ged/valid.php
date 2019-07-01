<?php include("../../../0-config/config-genos.php");
if(isset($_GET["cas"])) $cas = $_GET["cas"];
switch ($cas) {
	case 'AjoutGed':
		$g = new ged;
		if(isset($_FILES)){ //Si je ne me suis pas chier dessus en envoyant le fichier
			// var_dump($_FILES);
			// var_dump($_POST);
			$module_id 			= $_POST["module_id"];

			$g->module 			= $_POST["module"];
			$g->id_categorie 	= intval($_POST["id_categorie"]);
			$g->nom 			= ($_POST["nom"] == "")?$_FILES["fichier"]["name"] : $_POST["nom"];
			$g->commentaire 	= $_POST["commentaire"];
			$g->extension 		= ged::GetExtension($_FILES["fichier"]["name"]);
			$g->filename 		= $_FILES["fichier"]["name"];
			$g->poids 			= intval($_FILES["fichier"]["size"]) / 1024;
			$g->path 			= ged::GetPath($g->module,$module_id,$g->filename);
			$g->expiration 		= $_POST["expiration"];
			if($g->expiration == 1) $g->date_expiration = $_POST["date_expiration"];
			$attribut 			= "id_".$g->module;
			$g->$attribut 		= $module_id;
			$res = move_uploaded_file($_FILES["fichier"]['tmp_name'],"../../../".$g->path);
			if($res === TRUE){
				$g->Add();
			}
		}
		break;
		
		case 'ModifGed':
			$g 					= new ged;
			$g->id 				= $_POST["id"];
			$g->Load();
			$g->id_categorie 	= $_POST["id_categorie"];
			$g->nom 			= $_POST["nom"];
			$g->commentaire 	= $_POST["commentaire"];
			$g->expiration 		= $_POST["expiration"];
			if($g->expiration == 1) $g->date_expiration = $_POST["date_expiration"];
			$g->Update();
			break;

		case 'SupprGed':
			$g 				= new ged;
			$g->id 			= $_POST["id"];
			$g->Load();
			$g->suppr 		= 1;
			$g->Update();

			unlink("../../../".$g->path);
			break;
	default:
		# code...
		break;
}
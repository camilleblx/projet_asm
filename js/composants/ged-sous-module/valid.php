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

			if($_POST["sous_module"] == 'undefined') break;
			else $g->ss_module = $_POST["sous_module"];

			if($_POST["sous_module_id"] == 'undefined') break;
			else $g->ss_module_id = $_POST["sous_module_id"];

			if($_POST["sous_module2"] == 'undefined') $g->ss_module2 = "";
			else $g->ss_module2 = $_POST["sous_module2"];

			if($_POST["sous_module2_id"] == 'undefined') $g->ss_module2_id = 0;
			else $g->ss_module2_id = $_POST["sous_module2_id"];


			$g->id_categorie 	= intval($_POST["id_categorie"]);
			$g->nom 			= ($_POST["nom"] == "")?$_FILES["fichier"]["name"] : $_POST["nom"];
			$g->commentaire 	= $_POST["commentaire"];
			$g->extension 		= ged::GetExtension($_FILES["fichier"]["name"]);
			$g->filename 		= $_FILES["fichier"]["name"];
			$g->poids 			= intval($_FILES["fichier"]["size"]) / 1024;
			
			if($g->ss_module2 == "") $g->path = ged::GetPathSousModule($g->module,$module_id,$g->ss_module, $g->ss_module_id, $g->filename);
			else $g->path = ged::GetPathSousModule2($g->module,$module_id,$g->ss_module, $g->ss_module_id,$g->ss_module2, $g->ss_module2_id, $g->filename);
			
			$g->path 			= LinkRel2Data($g->path);
			$g->expiration 		= $_POST["expiration"];
			if($g->expiration == 1) $g->date_expiration = $_POST["date_expiration"];
			$attribut 			= "id_".$g->module;
			$g->$attribut 		= $module_id;
			$res = move_uploaded_file($_FILES["fichier"]['tmp_name'],"../../../".$g->path);
			if($res === TRUE){
				if($g->Add() > 0) echo "1";
				else echo "0";
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
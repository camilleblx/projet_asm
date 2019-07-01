<?php include("../../../0-config/config-genos.php");
if(isset($_GET["cas"])) $cas = $_GET["cas"];
switch ($cas) {
	case 'liste':
		$g 			= new ged;
		$module 	= $_POST["module"];
		$module_id 	= $_POST["module_id"];

		if($module == "client") 	client::DirClientStatic($module_id);
		if($module == "smo") 		smo::DirSmo($module_id);
		if($module == "projet") 	projet::DirProjet($module_id);
		if($module == "entreprise") entreprise::DirEntreprise($module_id);

		// $rech 		= array("module"=>$module, "id_".$module=>$module_id, "suppr"=>0);
		$rech 		= array("module"=>$module, "id_".$module=>$module_id, "ss_module"=>"","ss_module2"=>"", "suppr"=>0);
		$res 		= json_encode($g->Find($rech));
		echo $res;
		break;	

	case 'liste-categorie':
		$gc 	= new ged_categorie;
		$rech 	= array("suppr"=>0);
		$res 	= json_encode($gc->Find($rech));
		echo $res;
		break;
}
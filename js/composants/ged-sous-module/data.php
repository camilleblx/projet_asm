<?php include("../../../0-config/config-genos.php");
if(isset($_GET["cas"])) $cas = $_GET["cas"];
switch ($cas) {
	case 'liste':
		$g 					= new ged;
		$module 			= $_POST["module"];
		$module_id 			= $_POST["module_id"];
		if(isset($_POST["sous_module"])) 		$ss_module 		= $_POST["sous_module"];
		if(isset($_POST["sous_module_id"])) 	$ss_module_id 	= $_POST["sous_module_id"];
		if(isset($_POST["sous_module2"])) 		$ss_module2 	= $_POST["sous_module2"];
		if(isset($_POST["sous_module2_id"])) 	$ss_module2_id 	= $_POST["sous_module2_id"];

		$rech = array("module"=>$module, "id_".$module=>$module_id, "suppr"=>0);
		if(!empty($ss_module) && is_numeric($ss_module_id)){ //is_numeric et donc != ''. car !empty returne FALSE avec un id 0
			$rech['ss_module'] 		= $ss_module ;
			$rech['ss_module_id'] 	= $ss_module_id ;
		} 	
		if(!empty($ss_module2) && is_numeric($ss_module2_id)){
			$rech['ss_module2'] 	= $ss_module2 ;
			$rech['ss_module2_id'] 	= $ss_module2_id ;
		} 	

		$res = json_encode($g->Find($rech));
		echo $res;
		break;

	case 'liste-categorie':
		$gc 	= new ged_categorie;
		$rech 	= array("suppr"=>0);
		$res 	= json_encode($gc->Find($rech));
		echo $res;
		break;
}
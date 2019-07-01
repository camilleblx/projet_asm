<?php include("../../0-config/config-genos.php"); 

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {
		case 'liste-sondage':
			$s = new sondage();
			$s->id = intval($_POST['id']);
			$s->Load();
			echo json_decode($s);
			break;
		
		default:
			# code...
			break;
	}
}
<?php include("../../../0-config/config-genos.php"); 

if(isset($_GET["cas"])){
	$cas = $_GET["cas"];
	switch ($cas) {

		case 'reponse-sondage':
			// $liste_question_choix       = (isset($_POST['liste_question_choix'])) ? json_decode($_POST['liste_question_choix'],true) : null;                  
			$res = "1";
			
			// if(empty($liste_question_choix)){
			// 	$res = "0";
			// }

			if($res != "0"){
				$s           = new sondage();
				$s->id       = intval($_POST['id_sondage']);
				$s->Load();
				$id_sondage  = $_POST['id_sondage'];
				// $res         = $id_sondage;
				// var_dump($s);
								
				foreach($_POST as $key => $value) {
					$form = explode("-", $key);
					if(!empty($form[0]) && $form[0] == 'question'){
						$uc = new utilisateur_choix;
						$arr = array ();
						$arr[ "id_utilisateur" ] = $_SESSION["utilisateur"]['id'] ;
						$arr[ "id_question" ]    = $form[1];
						$find = $uc->Find($arr);

						$uc = new utilisateur_choix;
						if(sizeof($find) > 0){
							$value = explode("-", $value);
							$uc->id       = intval($find[0]['id']);
							$uc->Load();
							$uc->id_choix = $value[0];
							$uc->valeur   = $value[1];
							$uc->Update();	
						}else{
							$value = explode("-", $value);
							$uc->id_utilisateur = $_SESSION["utilisateur"]['id'];
							$uc->id_question    = $form[1];
							$uc->id_choix       = $value[0];
							$uc->valeur         = $value[1];
							$uc->Add();	
						}
					}
				}

				// foreach ($liste_question_choix as $key => $question) {
				// 	$q = new question();
				// 	if($question['id_question'] == 0){
				// 		$q->intitule   = $question['intitule'];
				// 		$q->id_sondage = $id_sondage;
				// 		$id_question   = $q->Add();
				// 	}else{
				// 		$q->id   	   = $question['id_question'];
				// 		$q->Load();
				// 		$q->intitule   = $question['intitule'];
				// 		$q->Update();
				// 		$id_question   = $question['id_question'];
				// 	}
				// 	if(sizeof($question['liste_choix']) > 0){
				// 		foreach ($question['liste_choix'] as $key => $choix) {
				// 			$c = new choix();
				// 			if($choix['id_choix'] == 0){
				// 				$c->intitule    = $choix['intitule'];
				// 				$c->type        = "varchar";
				// 				$c->id_question = $id_question;
				// 				$c->Add();
				// 			}else{
				// 				$c = new choix();
				// 				$c->Load();
				// 				$c->id    		= $choix['id_choix'];
				// 				$c->intitule    = $choix['intitule'];
				// 				$c->Update();
				// 			}
				// 		}
				// 	}
				// }

				// // foreach ($source_sondage_selectionne as $key => $ligne) {
				// // 	# code...
				// // }
				
				// if($res > 0){

				// }	
			}

			echo $res;
			break;
		
		default:
			# code...
			break;
	}
}
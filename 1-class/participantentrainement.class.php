<?php
class participantentrainement extends config_genos {
    public $id;
    public $id_utilisateur;
    public $id_entrainement;
    public $presence;
 
    public function __construct (){
        parent::__construct();
		$this->id             = 0;
		$this->id_utilisateur = 0;
		$this->id_entrainement = 0;
		$this->presence = 0;
    } 

    public static function ListeParticipantEntrainement($id_entrainement){
    	// Load entrainement
    	$e = new entrainement;
    	$e->id = $id_entrainement;
    	$e->Load();
    	// Liste participant
		$pe = new participantentrainement;
    	$req = "SELECT pe.*,u.nom,u.prenom
                FROM participantentrainement pe
                INNER JOIN utilisateur u ON u.id = pe.id_utilisateur
                WHERE pe.id_entrainement = :id_entrainement";
	    $champs = $pe->FieldList();
	    $champs[] = "nom";
	    $champs[] = "prenom";
	    $binds = array("id_entrainement" => $id_entrainement);
	    $liste_participant = $pe->StructList($req,$champs,$binds);
	    return $liste_participant;
    }  

    public static function CheckPresence($id_entrainement,$id_utilisateur){
    	$pe = new participantentrainement;
        $search_participantentrainement          = array();
        $search_participantentrainement["id_entrainement"] = $id_entrainement;
        $search_participantentrainement["id_utilisateur"] = $id_utilisateur;
        $search_participantentrainement = $pe->Find($search_participantentrainement);   
        if(empty($search_participantentrainement)){
            $pe->id_entrainement = $id_entrainement;
            $pe->id_utilisateur = $id_utilisateur;
            $pe->presence = 1;
            $pe->Add();
        }else{
            $pe->id = $search_participantentrainement[0]["id"];
            $pe->Load();
            if($pe->presence == 1) $pe->presence = 0;
            else $pe->presence = 1;
            $pe->Update();
        }
    }
}
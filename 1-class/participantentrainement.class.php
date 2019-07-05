<?php
class participantentrainement extends config_genos {
    public $id;
    public $id_utilisateur;
    public $id_planningentrainement;
    public $presence;
    public $id_entrainement;
 
    public function __construct (){
        parent::__construct();
  		$this->id             = 0;
  		$this->id_utilisateur = 0;
  		$this->id_planningentrainement = 0;
      $this->presence = 0;
  		$this->id_entrainement = 0;
    } 

    public static function ListePresence(){
        $p = new participantentrainement;
        $u = new utilisateur;
        $e = new entrainement;

        $req = "SELECT p.*, e.nom
                FROM participantentrainement p
                LEFT JOIN utilisateur u ON u.id = p.id_utilisateur
                LEFT JOIN entrainement e ON e.id = p.id_entrainement
                WHERE id_utilisateur = 1";
        $champs = $p->FieldList();
        $champs[] = "nom";
        $liste_presence = $p->StructList($req,$champs);
        return $liste_presence;
    }

    public static function CheckPresence($id_planningentrainement,$id_utilisateur){
    	$pe = new participantentrainement;
        $search_participantentrainement          = array();
        $search_participantentrainement["id_planningentrainement"] = $id_planningentrainement;
        $search_participantentrainement["id_utilisateur"] = $id_utilisateur;
        $search_participantentrainement = $pe->Find($search_participantentrainement);   
        if(empty($search_participantentrainement)){
            $pe->id_planningentrainement = $id_planningentrainement;
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
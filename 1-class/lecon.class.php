<?php
class lecon extends config_genos {
    public $id;
    public $nom;
    public $details;
    public $id_utilisateur;
    public $id_utilisateur_crea;
 
    public function __construct (){
        parent::__construct();
		$this->id                  = 0;
		$this->nom                 = "";
		$this->details             = "";
		$this->id_utilisateur      = 0;
		$this->id_utilisateur_crea = 0;
    } 

public static function ListeLeconUtilisateur($id_utilisateur){
      $l = new lecon;
      $req = "SELECT l.*
              FROM lecon l
              WHERE l.id_utilisateur = :id_utilisateur";
      $champs = $l->FieldList();
      $binds  = array("id_utilisateur" => $id_utilisateur);
      return $l->StructList($req,$champs,$binds);
    }
}
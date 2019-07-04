<?php
class objectif extends config_genos {
    public $id;
    public $nom;
    public $details;


    public function construct (){
        parent::construct();
        $this->id                      = 0;
        $this->nom                     = 0;
        $this->details                 = 0;

    }

    public static function ListeObjectif(){
      $o = new objectif;
      $req = "SELECT * 
              FROM objectif o";
      $champs            = $o->FieldList();
      //$binds             = array("nom" => "Tireur");
      //$liste_utilisateur = $u->StructList($req,$champs,$binds);
      $liste_objectif = $o->StructList($req,$champs);
      return $liste_objectif;
    }
}
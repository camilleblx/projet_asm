<?php
class objectif extends config_genos {
    public $id;
    public $nom;
    public $details;
  

    public function __construct (){
        parent::__construct();
        $this->id                      = 0;
        $this->nom                     = 0;
        $this->details                 = 0;
       
    }

    public static function Listeobjectif(){
      
      $req = "SELECT *
              FROM objectif";
      $liste_ojectif = StructList($req);
      return $liste_objectif;
    }
}
class commentaire extends config_genos {
    public $id;
    public $commentaire;
    public $id_objectif;
    public $id_utilisateur;

    public function __construct (){
        parent::__construct();
        $this->id                      = 0;
        $this->commentaire             = 0;
        $this->id_objectif             = 0;
        $this->id_utilisateur          = 0;
       
    }


    public static function liste_commentaire(){
      $u = new utilisateur;
      $req = "SELECT u.*
              FROM utilisateur u, objectif o, commentaire c
              INNER JOIN type_utilisateur tu ON u.id_type = tu.id
              WHERE tu.intitule = :intitule
              AND u.suppr = 0";
      $champs            = $u->FieldList();
      $binds             = array("intitule" => "commentaire");
      $liste_utilisateur = $u->StructList($req,$champs,$binds);
      return $liste_commentaire;
    }  


    public static function Listeobjectif(){
      
      $req = "SELECT *
              FROM objectif";
      $liste_ojectif = StructList($req);
      return $liste_objectif;
    }
}
<?php

class commentaire extends config_genos {
    public $id;
    public $commentaire;
    public $id_objectif;
    public $id_utilisateur;

    public function __construct (){
        parent::__construct();
        $this->id                      = 0;
        $this->commentaire             = "";
        $this->id_objectif             = 0;
        $this->id_utilisateur          = 0;
       
    }

    public static function liste_commentaire(){
      $u = new utilisateur;
      $req = "SELECT u.*
              FROM utilisateur u, objectif o, commentaire c
              INNER JOIN type_utilisateur tu ON u.id = tu.id
              INNER JOIN commentaire c ON u.id = c.id
              INNER JOIN objectif o ON u.id = o.id
              WHERE tu.intitule = :intitule
              AND u.suppr = 0";
      $champs            = $u->FieldList();
      $binds             = array("intitule" => "commentaire");
      $liste_commentaire = $u->StructList($req,$champs,$binds);
      return $liste_commentaire;
    }  
}
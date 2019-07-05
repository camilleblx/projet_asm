<?php

class commentaires extends config_genos {
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

    public static function ListeCommentaires(){
      $c = new commentaires;
      $req = "SELECT c.* 
              FROM commentaires c
              WHERE c.id_utilisateur = :id_utilisateur
              AND c.id_objectif = :id_objectif";
      $champs            = $c->FieldList();
      $binds             = array("id_utilisateur" => 1, "id_objectif" => 2);
      $liste_commentaires = $c->StructList($req,$champs, $binds);
      return $liste_commentaires;
    }
}
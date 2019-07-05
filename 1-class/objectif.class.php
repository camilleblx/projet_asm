<?php
class objectif extends config_genos {
    public $id;
    public $nom;
    public $details;


    public function __construct () {
        parent::__construct();
        $this->id                      = 0;
        $this->nom                     = 0;
        $this->details                 = 0;

    }

    public static function ListeObjectif(){
      $o = new objectif;
      $req = "SELECT o.* 
              FROM objectif o 
              INNER JOIN utilisateur u ON u.id = o.id_utilisateur
              WHERE o.id_utilisateur = :id_utilisateur";
      $champs            = $o->FieldList();
      $binds             = array("id_utilisateur" => 1);
      $liste_objectif = $o->StructList($req,$champs,$binds);
      return $liste_objectif;
    }

    public static function ListeObjectifsCommentaires(){
      $c = new commentaires;
      $o = new objectif;
      $req = "SELECT o.*, c.id_utilisateur AS id_utilisateur_com,
              c.commentaires, c.id_objectif
              FROM objectif o
              LEFT JOIN commentaires c ON c.id_objectif = o.id
              WHERE o.id_utilisateur = :id_utilisateur";
      $champs_commentaire            = $c->FieldList();
      $champs_objectif               = $o->FieldList();
      $champs[] = "id_utilisateur_com";
      $champs = array_merge($champs_objectif,$champs_commentaire);
      $binds             = array("id_utilisateur" => 1);
      $liste_objectif = $o->StructList($req,$champs,$binds);
      return $liste_objectif;
    }
}
<?php
class competition extends config_genos {

    public $id;
    public $nom;
    public $datecompete;
    public $lieu;
    public $niveau;
    public $type;
    public $date_debut_engagement;
    public $date_fin_engagement;
    public function construct (){
      parent::construct();
      $this->id             = 0;
      $this->nom            = 0;
      $this->datecompete    = "0000-00-00";
      $this->lieu           = "";
      $this->niveau         = "";
      $this->type           = "";
      $this->date_debut_engagement = "0000-00-00";
      $this->date_fin_engagement = "0000-00-00";
    } 

    public static function ListeCompetition(){
      $c = new competition;
      $g = new groupe;
      $req = "SELECT c.*, g.nom AS nom_groupe, g.details
              FROM competition c INNER JOIN groupe g 
              ON c.id_groupe = g.id
              ORDER BY c.datecompete ASC";
      $champs_competition = $c->FieldList();
      $champs_groupe      = $g->FieldList();
      $champs[] = "nom_groupe";
      $champs = array_merge($champs_competition,$champs_groupe);
      $liste_competition = $c->StructList($req,$champs);
      return $liste_competition;
    }
  }
    
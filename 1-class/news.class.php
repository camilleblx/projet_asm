<?php
class news extends config_genos {
    public $id;
    public $objet;
    public $texte;
    public $date_creation;  
    public $img;
 
    public function __construct (){
      parent::__construct();
      $this->id                  = 0;
      $this->objet               = "";
      $this->texte               = "";
      $this->date_creation       = "";
      $this->img				         = "";
    } 

    public static function ListeNews(){
      $n = new news;
      $req = "SELECT n.*
              FROM news n           
              ORDER BY n.date_creation ASC";
      $champs            = $n->FieldList();
      $liste_news = $n->StructList($req,$champs);
      return $liste_news;
    }   
  }
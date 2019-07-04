<?php
class planningentrainement extends config_genos {
    public $id;
    public $id_entrainement;
    public $date;
    public $heure_debut;
    public $heure_fin;
    public $id_type_entrainement;
 
    public function __construct (){
      parent::__construct();
      $this->id                   = 0;
      $this->id_entrainement      = 0;
      $this->date                 = "0000-00-00";
      $this->heure_debut          = "";
      $this->heure_fin            = "";
      $this->id_type_entrainement = "";
    } 

    public static function GetEntrainementDuJour(){
      // $e = new planningentrainement;
      // $search_entrainement            = array();
      // $search_entrainement["date"] = date("Y-m-d");
      // return $e->Find($search_entrainement);

      $pe = new planningentrainement;
      $req = "SELECT pe.*, e.nom AS nom, e.details AS details
              FROM planningentrainement pe
              INNER JOIN entrainement e ON e.id = pe.id_entrainement
              WHERE pe.date = :date";
      $champs   = $pe->FieldList();
      $champs[] = "nom";
      $champs[] = "details";
      $binds    = array("date" => date("Y-m-d"));
      return $pe->StructList($req,$champs,$binds);
    }  
}
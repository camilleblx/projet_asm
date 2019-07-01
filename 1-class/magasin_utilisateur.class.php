<?php
class magasin_utilisateur extends config_genos {
    public $id;
    public $id_magasin;
    public $id_utilisateur;
 
    public function __construct (){
        parent::__construct();
		$this->id             = 0;
		$this->id_magasin     = 0;
		$this->id_utilisateur = 0;
    } 

    public static function AffecterMagasinUtilisateur($id_magasin,$id_utilisateur){
      $mu                 = new magasin_utilisateur;
      $mu->id_magasin     = $id_magasin;
      $mu->id_utilisateur = $id_utilisateur;
      $mu->Add();
    }    

    public static function ListeMagasinUtilisateur($id_utilisateur){
      $m = new magasin;
      $req = "SELECT m.*
              FROM magasin m 
              INNER JOIN magasin_utilisateur mu ON m.id = mu.id_magasin
              INNER JOIN utilisateur u ON u.id = mu.id_utilisateur
              WHERE u.id = :id_utilisateur
              AND m.suppr = 0
              AND mu.suppr = 0";
      $champs        = $m->FieldList();
      $binds         = array("id_utilisateur" => $id_utilisateur);
      $liste_magasin = $m->StructList($req,$champs,$binds);
      return $liste_magasin;
    }
}
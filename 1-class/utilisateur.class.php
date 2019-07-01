<?php
class utilisateur extends config_genos {
    public $id;
    public $id_type;
    public $login;
    public $mdp;
    public $nom;
    public $prenom;
    public $email;
    public $admin;
 
    public function __construct (){
        parent::__construct();
        $this->id      = 0;
        $this->id_type = 0;
        $this->login   = "";
        $this->mdp     = "";
        $this->nom     = "";
        $this->prenom  = "";
        $this->email   = "";
        $this->admin   = 0;
    } 


    public static function ListeUtilisateurEntreprise(){
      $u = new utilisateur;
      $req = "SELECT u.*
              FROM utilisateur u
              INNER JOIN type_utilisateur tu ON u.id_type = tu.id
              WHERE tu.intitule = :intitule
              AND u.suppr = 0";
      $champs            = $u->FieldList();
      $binds             = array("intitule" => "entreprise");
      $liste_utilisateur = $u->StructList($req,$champs,$binds);
      return $liste_utilisateur;
    }    

    public static function ListeUtilisateurMagasin(){
      $u = new utilisateur;
      $req = "SELECT u.*
              FROM utilisateur u
              INNER JOIN type_utilisateur tu ON u.id_type = tu.id
              WHERE tu.intitule = :intitule
              AND u.suppr = 0";
      $champs            = $u->FieldList();
      $binds             = array("intitule" => "magasin");
      $liste_utilisateur = $u->StructList($req,$champs,$binds);
      return $liste_utilisateur;
    }
}
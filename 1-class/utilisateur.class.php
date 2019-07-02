<?php
class utilisateur extends config_genos {
    public $id;
    public $nom;
    public $prenom;
    public $dateAnniversaire;
    public $login;
    public $mdp;
    public $img;
    public $telephone;
    public $mail;
    public $adresse;
    public $telephoneurgent;
    public $nomurgent;
    public $prenomurgent;
    public $id_categorie;
    public $id_typeutilisateur;
    public $id_typearbitre;

    public function __construct (){
        parent::__construct();
        $this->id                      = 0;
        $this->nom                     = 0;
        $this->prenom                  = 0;
        $this->dateAnniversaire        = 0;
        $this->login                   = 0;
        $this->mdp                     = 0;
        $this->img                     = 0;
        $this->telephone               = 0;
        $this->mail                    = 0;
        $this->adresse                 = 0;
        $this->telephoneurgent         = 0;
        $this->nomurgent               = 0;
        $this->prenomurgent            = 0;
        $this->id_categorie            = 0;
        $this->id_typeutilisateur      = 0;
        $this->id_typearbitre          = 0;
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
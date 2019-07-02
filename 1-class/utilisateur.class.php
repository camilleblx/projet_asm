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


    public static function ListeUtilisateurAdministrateur(){
      $u = new utilisateur;
      $req = "SELECT u.*, ta.nom AS nom_type_arbitre, c.nom AS nom_categorie
              FROM utilisateur u
              INNER JOIN typeutilisateur tu ON u.id_typeutilisateur = tu.id
              LEFT JOIN typearbitre ta ON u.id_typearbitre = ta.id
              LEFT JOIN categorie c ON u.id_categorie = c.id
              WHERE tu.nom = :nom
              AND u.suppr = 0";
      $champs            = $u->FieldList();
      $champs[]          = "nom_type_arbitre";
      $champs[]          = "nom_categorie";
      $binds             = array("nom" => "administrateur");
      $liste_utilisateur = $u->StructList($req,$champs,$binds);
      return $liste_utilisateur;
    }    

    public static function ListeUtilisateurMaitrearme(){
      $u = new utilisateur;
      $req = "SELECT u.*, ta.nom AS nom_type_arbitre, c.nom AS nom_categorie
              FROM utilisateur u
              INNER JOIN typeutilisateur tu ON u.id_typeutilisateur = tu.id
              LEFT JOIN typearbitre ta ON u.id_typearbitre = ta.id
              LEFT JOIN categorie c ON u.id_categorie = c.id
              WHERE tu.nom = :nom
              AND u.suppr = 0";
      $champs            = $u->FieldList();
      $champs[]          = "nom_type_arbitre";
      $champs[]          = "nom_categorie";
      $binds             = array("nom" => "maitrearme");
      $liste_utilisateur = $u->StructList($req,$champs,$binds);
      return $liste_utilisateur;
    }    

    public static function ListeUtilisateurUtilisateur(){
      $u = new utilisateur;
      $req = "SELECT u.*, ta.nom AS nom_type_arbitre, c.nom AS nom_categorie
              FROM utilisateur u
              INNER JOIN typeutilisateur tu ON u.id_typeutilisateur = tu.id
              LEFT JOIN typearbitre ta ON u.id_typearbitre = ta.id
              LEFT JOIN categorie c ON u.id_categorie = c.id
              WHERE tu.nom = :nom
              AND u.suppr = 0";
      $champs            = $u->FieldList();
      $champs[]          = "nom_type_arbitre";
      $champs[]          = "nom_categorie";
      $binds             = array("nom" => "utilisateur");
      $liste_utilisateur = $u->StructList($req,$champs,$binds);
      return $liste_utilisateur;
    }

    public static function FormAjout(){ ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Utilisateur</span>
            <h3 class="page-title">Ajouter un utilisateur</h3>
          </div>
        </div>
        <!-- End Page Header -->            
        <div class="card card-small mb-4 col-md-6 ">
          <div class="card-header border-bottom">
            <h6 class="m-0">Formulaire <span class="badge badge-success text-right">Ajout</span></h6>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
              <strong class="text-muted d-block mb-2">Informations</strong>
              <form id="form-ajout-utilisateur">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="login" placeholder="login" aria-label="login" aria-describedby="basic-addon1"> 
                  </div>                           
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control" name="mdp" placeholder="mot de passe">
                  </div>                        
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="nom" placeholder="nom" aria-label="nom" aria-describedby="basic-addon1"> 
                  </div>                        
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="prenom" placeholder="prenom" aria-label="prenom" aria-describedby="basic-addon1"> 
                  </div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="commentaire"  rows="3" placeholder="Commentaire..."></textarea> 
                </div>
                <div class="form-group">
                  <?php 
                    $tu = new typeutilisateur;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM typeutilisateur WHERE suppr = 0";
                    $conf["class"] = "form-control";
                    $tu->SelectList("id_type","id","nom",$conf); 
                  ?>
                </div>
                <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                  <input type="checkbox" id="input-admin" name="admin" class="custom-control-input">
                  <label class="custom-control-label" for="input-admin">Admin</label>
                </div>
                <br>
                <div v-on:click="AjouterUtilisateur()" class="btn bg-success rounded text-white text-center" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Ajouter</div>
              </form>
            </li>
          </ul>
        </div>
    <?php }    

    public static function FormModif(){ 
      $u = new utilisateur;
      $u->id = $_GET["id"];
      $u->Load();
      var_dump($u);
      ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Utilisateur</span>
            <h3 class="page-title">Modifier un utilisateur</h3>
          </div>
        </div>
        <!-- End Page Header -->            
        <div class="card card-small mb-4 col-md-6 ">
          <div class="card-header border-bottom">
            <h6 class="m-0">Formulaire <span class="badge badge-info text-right">Modification</span></h6>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
              <strong class="text-muted d-block mb-2">Informations</strong>
              <form id="form-ajout-utilisateur">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="login" placeholder="login" aria-label="login" aria-describedby="basic-addon1"> 
                  </div>                           
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control" name="mdp" placeholder="mot de passe">
                  </div>                        
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="nom" placeholder="nom" aria-label="nom" aria-describedby="basic-addon1"> 
                  </div>                        
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="prenom" placeholder="prenom" aria-label="prenom" aria-describedby="basic-addon1"> 
                  </div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="commentaire"  rows="3" placeholder="Commentaire..."></textarea> 
                </div>
                <div class="form-group">
                  <?php 
                    $tu = new typeutilisateur;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM typeutilisateur WHERE suppr = 0";
                    $conf["class"] = "form-control";
                    $tu->SelectList("id_type","id","nom",$conf); 
                  ?>
                </div>
                <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                  <input type="checkbox" id="input-admin" name="admin" class="custom-control-input">
                  <label class="custom-control-label" for="input-admin">Admin</label>
                </div>
                <br>
                <div v-on:click="AjouterUtilisateur()" class="btn bg-success rounded text-white text-center" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Ajouter</div>
              </form>
            </li>
          </ul>
        </div>
    <?php }
}
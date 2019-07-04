<?php
class utilisateur extends config_genos {
    public $id;
    public $nom;
    public $prenom;
    public $dateAnniversaire;
    public $login;
    public $mdp;
    public $img;
    public $id_groupe;
    public $id_typeutilisateur;
    public $id_typearbitre;
    public $id_typeentrainement;
    public $commentaire;

    public function __construct (){
        parent::__construct();
        $this->id                  = 0;
        $this->nom                 = "";
        $this->prenom              = "";
        $this->dateAnniversaire    = "0000-00-00";
        $this->login               = "";
        $this->mdp                 = "";
        $this->img                 = "";
        $this->id_groupe           = 0;
        $this->id_typeutilisateur  = 0;
        $this->id_typearbitre      = 0;
        $this->id_typeentrainement = 0;
        $this->commentaire         = "";
    } 

    public static function ListeUtilisateurEntrainement($id_entrainement,$id_typeentrainement){
      // Liste participant
      $u = new utilisateur;
      $req = "SELECT u.*, COALESCE(pe.presence,0) AS presence
              FROM utilisateur u
              INNER JOIN typeentrainement te ON u.id_typeentrainement = te.id
              LEFT JOIN participantentrainement pe ON pe.id_utilisateur = u.id AND pe.id_entrainement = :id_entrainement
              WHERE te.id = :id_typeentrainement";
      $champs = $u->FieldList();
      $champs[] = "nom";
      $champs[] = "prenom";
      $champs[] = "presence";
      $binds = array("id_entrainement" => $id_entrainement, "id_typeentrainement" => $id_typeentrainement);
      $liste_participant = $u->StructList($req,$champs,$binds);
      return $liste_participant;
    }  


    public static function ListeUtilisateurAdministrateur(){
      $u = new utilisateur;
      $req = "SELECT u.*, ta.nom AS nom_type_arbitre, g.nom AS nom_groupe
              FROM utilisateur u
              INNER JOIN typeutilisateur tu ON u.id_typeutilisateur = tu.id
              LEFT JOIN typearbitre ta ON u.id_typearbitre = ta.id
              LEFT JOIN groupe g ON u.id_groupe = g.id
              WHERE tu.nom = :nom
              ORDER BY u.nom ASC";
      $champs            = $u->FieldList();
      $champs[]          = "nom_type_arbitre";
      $champs[]          = "nom_groupe";
      $binds             = array("nom" => "administrateur");
      $liste_utilisateur = $u->StructList($req,$champs,$binds);
      return $liste_utilisateur;
    }    

    public static function ListeUtilisateurMaitrearme(){
      $u = new utilisateur;
      $req = "SELECT u.*, ta.nom AS nom_type_arbitre, g.nom AS nom_groupe
              FROM utilisateur u
              INNER JOIN typeutilisateur tu ON u.id_typeutilisateur = tu.id
              LEFT JOIN typearbitre ta ON u.id_typearbitre = ta.id
              LEFT JOIN groupe g ON u.id_groupe = g.id
              WHERE tu.nom = :nom
              ORDER BY u.nom ASC";
      $champs            = $u->FieldList();
      $champs[]          = "nom_type_arbitre";
      $champs[]          = "nom_groupe";
      $binds             = array("nom" => "maitrearme");
      $liste_utilisateur = $u->StructList($req,$champs,$binds);
      return $liste_utilisateur;
    }    

    public static function ListeUtilisateurUtilisateur(){
      $u = new utilisateur;
      $req = "SELECT u.*, ta.nom AS nom_type_arbitre, g.nom AS nom_groupe
              FROM utilisateur u
              INNER JOIN typeutilisateur tu ON u.id_typeutilisateur = tu.id
              LEFT JOIN typearbitre ta ON u.id_typearbitre = ta.id
              LEFT JOIN groupe g ON u.id_groupe = g.id
              WHERE tu.nom = :nom
              ORDER BY u.nom ASC";
      $champs            = $u->FieldList();
      $champs[]          = "nom_type_arbitre";
      $champs[]          = "nom_groupe";
      $binds             = array("nom" => "tireur");
      $liste_utilisateur = $u->StructList($req,$champs,$binds);
      return $liste_utilisateur;
    }

    public static function ListeTireurs(){
      $u = new utilisateur;
      $req = "SELECT u.* 
              FROM utilisateur u
              INNER JOIN typeutilisateur tu ON u.id_typeutilisateur = tu.id
              WHERE tu.nom = :nom
              ORDER BY u.nom ASC";
      $champs            = $u->FieldList();
      $binds             = array("nom" => "Tireur");
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
              <form id="form-ajout-utilisateur" action="valid.php?cas=ajouter-utilisateur" method="POST">
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
                    <input type="text" class="form-control" name="nom" placeholder="nom"> 
                  </div>                        
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="prenom" placeholder="prenom"> 
                  </div>                                
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="commentaire"  rows="3" placeholder="Commentaire..."></textarea> 
                </div>
                <div class="form-group">
                  <?php 
                    $tu = new typeutilisateur;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM typeutilisateur";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez un type d'utilisateur";
                    $conf["preselectval"] = 0;
                    $tu->SelectList("id_typeutilisateur","id","nom",$conf); 
                  ?>
                </div>                
                <div class="form-group">
                  <?php 
                    $te = new typeentrainement;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM typeentrainement";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez un type d'entrainement";
                    $conf["preselectval"] = 0;
                    $te->SelectList("id_typeentrainement","id","nom",$conf); 
                  ?>
                </div>                
                <div class="form-group">
                  <?php 
                    $ta = new typearbitre;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM typearbitre";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez un type d'entrainement";
                    $conf["preselectval"] = 0;
                    $ta->SelectList("id_typearbitre","id","nom",$conf); 
                  ?>
                </div>                
                <div class="form-group">
                  <?php 
                    $g = new groupe;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM groupe";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez une catégorie";
                    $conf["preselectval"] = 0;
                    $g->SelectList("id_groupe","id","nom",$conf); 
                  ?>
                </div>
<!--                 <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                  <input type="checkbox" id="input-admin" name="admin" class="custom-control-input">
                  <label class="custom-control-label" for="input-admin">Admin</label>
                </div> -->
                <br>
                <button type="submit" class="btn bg-success rounded text-white text-center" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Ajouter</button>
              </form>
            </li>
          </ul>
        </div>
    <?php }    

    public static function FormModif(){ 
      $u = new utilisateur;
      $u->id = $_GET["id"];
      $u->Load();
      ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Utilisateur</span>
            <h3 class="page-title">modifier un utilisateur</h3>
          </div>
        </div>
        <!-- End Page Header -->            
        <div class="card card-small mb-4 col-md-6 ">
          <div class="card-header border-bottom">
            <h6 class="m-0">Formulaire <span class="badge badge-info text-right">Modifier</span></h6>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
              <strong class="text-muted d-block mb-2">Informations</strong>
              <form id="form-modif-utilisateur" action="valid.php?cas=modifier-utilisateur" method="POST">
                <input type="hidden" name="id_utilisateur" value="<?php echo $u->id ?>">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="login" value="<?php echo $u->login ?>" placeholder="login" aria-label="login" aria-describedby="basic-addon1"> 
                  </div>  
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control" name="mdp" placeholder="nouveau mot de passe">
                  </div>                                            
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="nom" value="<?php echo $u->nom ?>" placeholder="nom"> 
                  </div>                        
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="prenom" value="<?php echo $u->prenom ?>" placeholder="prenom"> 
                  </div>                                   
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="commentaire" rows="3" placeholder="Commentaire..."><?php echo $u->commentaire ?></textarea> 
                </div>
                <div class="form-group">
                  <?php 
                    $tu = new typeutilisateur;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM typeutilisateur ";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez un type d'utilisateur";
                    $conf["preselectval"] = 0;
                    $tu->SelectList("id_typeutilisateur","id","nom",$conf,intval($u->id_typeutilisateur)); 
                  ?>
                </div>                
                <div class="form-group">
                  <?php 
                    $te = new typeentrainement;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM typeentrainement ";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez un type d'entrainement";
                    $conf["preselectval"] = 0;
                    $te->SelectList("id_typeentrainement","id","nom",$conf,intval($u->id_typeentrainement)); 
                  ?>
                </div>                
                <div class="form-group">
                  <?php 
                    $ta = new typearbitre;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM typearbitre ";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez un type d'entrainement";
                    $conf["preselectval"] = 0;
                    $ta->SelectList("id_typearbitre","id","nom",$conf,intval($u->id_typearbitre)); 
                  ?>
                </div>                
                <div class="form-group">
                  <?php 
                    $g = new groupe;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM groupe ";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez une catégorie";
                    $conf["preselectval"] = 0;
                    $g->SelectList("id_groupe","id","nom",$conf,intval($u->id_groupe)); 
                  ?>
                </div>
<!--                 <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                  <input type="checkbox" id="input-admin" name="admin" class="custom-control-input">
                  <label class="custom-control-label" for="input-admin">Admin</label>
                </div> -->
                <br>
                <button type="submit" class="btn bg-info rounded text-white text-center" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Modifier</button>
              </form>
            </li>
          </ul>
        </div>
    <?php }
}
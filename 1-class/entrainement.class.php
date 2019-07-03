<?php
class entrainement extends config_genos {
    public $id;
    public $nom;
    public $details;
    public $dateEnt;
    public $heureDebEnt;
    public $heureFinEnt;
    public $id_typeentrainement;
    public $id_categorie;
 
    public function __construct (){
        parent::__construct();
		$this->id                  = 0;
		$this->nom                 = 0;
		$this->details             = "";
		$this->dateEnt             = "";
		$this->heureDebEnt         = "";
		$this->heureFinEnt         = "";
		$this->id_typeentrainement = "";
		$this->id_categorie        = "";
    } 

    public static function ListeEntrainement(){
      $e = new entrainement;
      $req = "SELECT e.*, te.nom AS nom_type_entrainement, c.nom AS nom_categorie
              FROM entrainement e
              LEFT JOIN typeentrainement te ON e.id_typeentrainement = te.id
              LEFT JOIN categorie c ON e.id_categorie = c.id
              ORDER BY e.nom ASC";
      $champs            = $e->FieldList();
      $champs[]          = "nom_type_entrainement";
      $champs[]          = "nom_categorie";
      return $e->StructList($req,$champs);
    }   

    public static function FormAjout(){ ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Entrainement</span>
            <h3 class="page-title">Ajouter un entrainement</h3>
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
              <form id="form-ajout-entrainement" action="valid.php?cas=ajouter-entrainement" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="nom" placeholder="nom"> 
                  </div>                    
                  <div class="form-group col-md-6">
                    <input type="date" class="form-control" name="dateEnt" placeholder="date"> 
                  </div>                    
                  <div class="form-group col-md-6">
                    <input type="time" class="form-control" name="heureDebEnt" placeholder="Heure de début"> 
                  </div>                      
                  <div class="form-group col-md-6">
                    <input type="time" class="form-control" name="heureFinEnt" placeholder="Heure de fin"> 
                  </div>                           
                  <div class="form-group col-md-6">
                    <textarea class="form-control" name="details" rows="3" placeholder="Détail..."></textarea> 
                  </div>                           
                </div>
                <div class="form-group">
                  <?php 
                    $te = new typeentrainement;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM typeentrainement WHERE suppr = 0";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez un type d'entrainement";
                    $conf["preselectval"] = 0;
                    $te->SelectList("id_typeentrainement","id","nom",$conf); 
                  ?>
                </div>                            
                <div class="form-group">
                  <?php 
                    $c = new categorie;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM categorie WHERE suppr = 0";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez une catégorie";
                    $conf["preselectval"] = 0;
                    $c->SelectList("id_categorie","id","nom",$conf); 
                  ?>
                </div>
                <br>
                <button type="submit" class="btn bg-success rounded text-white text-center" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Ajouter</button>
              </form>
            </li>
          </ul>
        </div>
    <?php }    

    public static function FormModif(){ 
      $e = new entrainement;
      $e->id = $_GET["id"];
      $e->Load();
      ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Entrainement</span>
            <h3 class="page-title">Modifier un entrainement</h3>
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
              <form id="form-modifier-entrainement" action="valid.php?cas=modifier-entrainement" method="POST">
                <input type="hidden" class="form-control" name="id_entrainement" value="<?php echo $e->id ?>"> 
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="nom" value="<?php echo $e->nom ?>" placeholder="nom"> 
                  </div>                    
                  <div class="form-group col-md-6">
                    <input type="date" class="form-control" name="dateEnt" value="<?php echo $e->DateDatabase($e->dateEnt) ?>" placeholder="date"> 
                  </div>                    
                  <div class="form-group col-md-6">
                    <input type="time" class="form-control" name="heureDebEnt" value="<?php echo $e->heureDebEnt ?>" placeholder="Heure de début"> 
                  </div>                      
                  <div class="form-group col-md-6">
                    <input type="time" class="form-control" name="heureFinEnt" value="<?php echo $e->heureFinEnt ?>" placeholder="Heure de fin"> 
                  </div>                           
                  <div class="form-group col-md-6">
                    <textarea class="form-control" name="details" rows="3" placeholder="Détail..."><?php echo $e->details ?></textarea> 
                  </div>                           
                </div>
                <div class="form-group">
                  <?php 
                    $te = new typeentrainement;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM typeentrainement WHERE suppr = 0";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez un type d'entrainement";
                    $conf["preselectval"] = 0;
                    $te->SelectList("id_typeentrainement","id","nom",$conf,intval($e->id_typeentrainement)); 
                  ?>
                </div>                            
                <div class="form-group">
                  <?php 
                    $c = new categorie;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM categorie WHERE suppr = 0";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez une catégorie";
                    $conf["preselectval"] = 0;
                    $c->SelectList("id_categorie","id","nom",$conf,intval($e->id_categorie)); 
                  ?>
                </div>
                <br>
                <button type="submit" class="btn bg-info rounded text-white text-center" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Modifier</button>
              </form>
            </li>
          </ul>
        </div>
    <?php }

}
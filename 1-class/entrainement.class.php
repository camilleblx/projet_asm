<?php
class entrainement extends config_genos {
    public $id;
    public $nom;
    public $details;
    public $jour;
    public $heureDebEnt;
    public $heureFinEnt;
    public $id_typeentrainement;
    public $id_groupe;
 
    public function __construct (){
      parent::__construct();
      $this->id                  = 0;
      $this->nom                 = 0;
      $this->details             = "";
      $this->jour             = "";
      $this->heureDebEnt         = "";
      $this->heureFinEnt         = "";
      $this->id_typeentrainement = "";
      $this->id_groupe           = "";
    } 

    public static function GetEntrainementDuJour(){
      $e = new entrainement;
      $search_entrainement            = array();
      $search_entrainement["dateEnt"] = date("Y-m-d");
      return $e->Find($search_entrainement);
    }   

    public static function ListeEntrainement(){
      $e = new entrainement;
      $req = "SELECT e.*, te.nom AS nom_type_entrainement, g.nom AS nom_groupe
              FROM entrainement e
              LEFT JOIN typeentrainement te ON e.id_typeentrainement = te.id
              LEFT JOIN groupe g ON e.id_groupe = g.id
              ORDER BY e.nom ASC";
      $champs            = $e->FieldList();
      $champs[]          = "nom_type_entrainement";
      $champs[]          = "nom_groupe";
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
                  <select name="jour" class="form-control">
                    <option value="1">Lundi</option>
                    <option value="2">Mardi</option>
                    <option value="3">Mercredi</option>
                    <option value="4">Jeudi</option>
                    <option value="5">Vendredi</option>
                  </select>
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
                    $conf["sql"] = "SELECT * FROM typeentrainement ";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez un type d'entrainement";
                    $conf["preselectval"] = 0;
                    $te->SelectList("id_typeentrainement","id","nom",$conf); 
                  ?>
                </div>                            
                <div class="form-group">
                  <?php 
                    $g = new groupe;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM groupe ";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez un groupe";
                    $conf["preselectval"] = 0;
                    $g->SelectList("id_groupe","id","nom",$conf); 
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
                    $conf["sql"] = "SELECT * FROM typeentrainement ";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez un type d'entrainement";
                    $conf["preselectval"] = 0;
                    $te->SelectList("id_typeentrainement","id","nom",$conf,intval($e->id_typeentrainement)); 
                  ?>
                </div>                            
                <div class="form-group">
                  <?php 
                    $g = new groupe;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM groupe ";
                    $conf["class"] = "form-control col-6";
                    $conf["preselect"] = "Sélectionnez un groupe";
                    $conf["preselectval"] = 0;
                    $g->SelectList("id_groupe","id","nom",$conf,intval($e->id_groupe)); 
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
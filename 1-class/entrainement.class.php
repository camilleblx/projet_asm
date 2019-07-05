<?php
class entrainement extends config_genos {
    public $id;
    public $nom;
    public $details;
    public $jour;
    public $id_annee;
    public $heureDebEnt;
    public $heureFinEnt;
    public $id_typeentrainement;
    public $id_groupe;
 
    public function __construct (){
      parent::__construct();
      $this->id                  = 0;
      $this->nom                 = 0;
      $this->details             = "";
      $this->jour                = "";
      $this->id_annee            = 0;
      $this->heureDebEnt         = "";
      $this->heureFinEnt         = "";
      $this->id_typeentrainement = "";
      $this->id_groupe           = "";
    } 

    public function Add(){
      $id_entrainement = parent::Add();
      // Charger l'année
      $a = new annee;
      $a->id = $this->id_annee;
      $a->Load();
      // Créer les entrainements du planing
      // $date_debut = strtotime($a->annee.'-01-01');
      $date_debut = strtotime("first ".$this->jour." of ".$a->annee);
      $date_fin = strtotime($a->annee.'-12-31');
      while($date_debut <= $date_fin)
      {
        $pe                       = new planningentrainement;
        $pe->id_entrainement      = $id_entrainement;
        $pe->date                 = date('Y-m-d',$date_debut);
        $pe->heure_debut          = $this->heureDebEnt;
        $pe->heure_fin            = $this->heureFinEnt;
        $pe->id_type_entrainement = $this->id_typeentrainement;
        $pe->Add();
        $date_debut = strtotime("+7 day", $date_debut);
      }
    }  
    
    public function Update(){
      parent::Update();
      $req = "UPDATE planningentrainement pe
              SET pe.heure_debut = :heure_debut
              AND pe.heure_fin = :heure_fin
              AND pe.id_type_entrainement = :id_typeentrainement
              WHERE pe.id_entrainement = :id_entrainement";
      $binds = array(
                      "id_entrainement" => $this->id,
                      "heure_debut" => $this->heureDebEnt,
                      "heure_fin" => $this->heureFinEnt,
                      "id_typeentrainement" => $this->id_typeentrainement,
                    );
      var_dump($req);
      var_dump($binds);
      $this->Sql($req,$binds);
    }

    public function Delete(){
      $req = "DELETE FROM planningentrainement WHERE id_entrainement = :id_entrainement";
      $binds = array("id_entrainement" => $this->id);
      $this->Sql($req,$binds);
      parent::Delete();
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
                    <option value="monday">Lundi</option>
                    <option value="tuesday">Mardi</option>
                    <option value="wednesday">Mercredi</option>
                    <option value="thursday">Jeudi</option>
                    <option value="friday">Vendredi</option>
                  </select>
                </div>  
                <div class="form-group col-md-6">
                  <?php 
                    $a = new annee;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM annee ";
                    $conf["class"] = "form-control";
                    $conf["preselect"] = "Sélectionnez une année";
                    $conf["preselectval"] = 0;
                    $a->SelectList("id_annee","id","annee",$conf); 
                  ?>
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
                  <select name="jour" class="form-control">
                    <option <?php if($e->jour == 'monday') echo 'selected'?> value="monday">Lundi</option>
                    <option <?php if($e->jour == 'tuesday') echo 'selected'?> value="tuesday">Mardi</option>
                    <option <?php if($e->jour == 'wednesday') echo 'selected'?> value="wednesday">Mercredi</option>
                    <option <?php if($e->jour == 'thursday') echo 'selected'?> value="thursday">Jeudi</option>
                    <option <?php if($e->jour == 'friday') echo 'selected'?> value="friday">Vendredi</option>
                  </select>
                </div>  
                <div class="form-group col-md-6">
                  <?php 
                    $a = new annee;
                    $conf = array();
                    $conf["sql"] = "SELECT * FROM annee ";
                    $conf["class"] = "form-control";
                    $conf["preselect"] = "Sélectionnez une année";
                    $conf["preselectval"] = 0;
                    $a->SelectList("id_annee","id","annee",$conf,intval($e->id_annee)); 
                  ?>
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
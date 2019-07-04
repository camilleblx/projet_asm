<?php
class competition extends config_genos {
    public $id;
    public $nom;
    public $datecompete;
    public $heurecompete;
    public $lieux;
    public function __construct (){
      parent::__construct();
      $this->id             = 0;
      $this->nom            = 0;
      $this->datecompete    = "0000-00-00";
      $this->heurecompete   = "00-00";
      $this->lieux          = "";
    } 

    public static function ListeCompetition(){
      $c = new competition;
      $req = "SELECT c.*
              FROM competition c
              ORDER BY c.nom ASC";
      $champs = $c->FieldList();
      return $c->StructList($req,$champs);
    }       

    public static function FormAjout(){ ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Competition</span>
            <h3 class="page-title">Ajouter une competition</h3>
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
              <form id="form-ajout-competition" action="valid.php?cas=ajouter-competition" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="nom" placeholder="nom"> 
                  </div>                    
                  <div class="form-group col-md-6">
                    <input type="date" class="form-control" name="datecompete" placeholder="date"> 
                  </div>                    
                  <div class="form-group col-md-6">
                    <input type="time" class="form-control" name="heurecompete" placeholder="Heure de début"> 
                  </div>                                              
                  <div class="form-group col-md-6">
                    <textarea class="form-control" name="lieux" rows="3" placeholder="Lieux..."></textarea> 
                  </div>                           
                </div>
                <br>
                <button type="submit" class="btn bg-success rounded text-white text-center" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Ajouter</button>
              </form>
            </li>
          </ul>
        </div>
    <?php }    

    public static function FormModif(){ 
      $c = new competition;
      $c->id = $_GET["id"];
      $c->Load();
      ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Compétition</span>
            <h3 class="page-title">Modifier une compétition</h3>
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
              <form id="form-ajout-competition" action="valid.php?cas=modifier-competition" method="POST">
                <input type="hidden" name="id_competition" value="<?php echo $_GET["id"]?>">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="nom" value="<?php echo $c->nom ?>" placeholder="nom"> 
                  </div>                    
                  <div class="form-group col-md-6">
                    <input type="date" class="form-control" name="datecompete" value="<?php echo $c->DateDatabase($c->datecompete) ?>" placeholder="date"> 
                  </div>                    
                  <div class="form-group col-md-6">
                    <input type="time" class="form-control" name="heurecompete" value="<?php echo $c->heurecompete ?>" placeholder="Heure de début"> 
                  </div>                                              
                  <div class="form-group col-md-6">
                    <textarea class="form-control" name="lieux" rows="3" placeholder="Lieux..."><?php echo $c->lieux ?></textarea> 
                  </div>                           
                </div>
                <br>
                <button type="submit" class="btn bg-info rounded text-white text-center" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Modifier</button>
              </form>
            </li>
          </ul>
        </div>
    <?php }

}
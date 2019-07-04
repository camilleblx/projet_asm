<?php
class annee extends config_genos {
    public $id;
    public $annee;
 
    public function __construct (){
        parent::__construct();
		$this->id   = 0;
		$this->annee = "";
    } 

    public static function ListeAnnee(){
      $a = new annee;
      $req = "SELECT a.*
              FROM annee a
              ORDER BY a.annee ASC";
      $champs = $a->FieldList();
      return $a->StructList($req,$champs);
    }   


    public static function FormAjout(){ ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Annee</span>
            <h3 class="page-title">Ajouter une année</h3>
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
              <form id="form-ajout-annee" action="valid.php?cas=ajouter-annee" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="annee" placeholder="annee"> 
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
      $a = new annee;
      $a->id = $_GET["id"];
      $a->Load();
      ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Annee</span>
            <h3 class="page-title">Modifier une annee</h3>
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
              <form id="form-modifier-annee" action="valid.php?cas=modifier-annee" method="POST">
                <input type="hidden" class="form-control" name="id_annee" value="<?php echo $a->id ?>"> 
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="annee" value="<?php echo $a->annee ?>" placeholder="annee"> 
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
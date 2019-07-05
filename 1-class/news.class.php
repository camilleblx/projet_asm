<?php
class news extends config_genos {
    public $id;
    public $objet;
    public $texte;
    public $date_creation;  
    public $img;
    public $lien;
 
    public function __construct (){
      parent::__construct();
      $this->id                  = 0;
      $this->objet               = "";
      $this->texte               = "";
      $this->date_creation       = "";
      $this->img                 = "";
      $this->lien                = "";
    }
 
    public static function ListeNews(){
      $n = new news;
      $req = "SELECT n.*
             FROM news n          
             ORDER BY n.date_creation ASC";
      $champs            = $n->FieldList();
      $liste_news = $n->StructList($req,$champs);
      return $liste_news;
    }
 
 
        public static function FormAjout(){ ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Actualités</span>
            <h3 class="page-title">Ajouter une actualité</h3>
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
              <form id="form-ajout-news" action="valid.php?cas=ajouter-news" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="objet" placeholder="Objet">
                  </div>                          
                  <div class="form-group col-md-6">
                    <input type="date" class="form-control" name="date_creation" >
                  </div>
                  <div class="form-group col-md-6">
                    <input type="file" class="form-control" name="img" >
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="lien" placeholder="Lien">
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
      $n = new news;
      $n->id = $_GET["id"];
      $n->Load();
      ?>
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Actualité</span>
            <h3 class="page-title">Modifier une actualité</h3>
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
              <form id="form-modif-news" action="valid.php?cas=modifier-news" method="POST">
                <input type="hidden" name="id_news" value="<?php echo $n->id ?>">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="objet" value="<?php echo $n->objet ?>" placeholder="Objet" >
                  </div>  
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="date" value="<?php echo $n->date_creation ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="img" value="<?php echo $n->img ?>" placeholder="img">
                  </div>
                  <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="lien" value="<?php echo $n->lien ?>" placeholder="Lien" >
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
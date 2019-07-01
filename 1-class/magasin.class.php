<?php
class magasin extends config_genos {
    public $id;
    public $intitule;
    public $commentaire;
 
    public function __construct (){
        parent::__construct();
        $this->id      = 0;
        $this->intitule = "Magasin ";
        $this->commentaire = "";
    } 

    public static function ListeMagasin(){
      $m = new magasin;
      $req = "SELECT m.*
              FROM magasin m
              WHERE m.suppr = 0";
      $champs        = $m->FieldList();
      $liste_magasin = $m->StructList($req,$champs);
      return $liste_magasin;
    }   
   
    public static function ListeRecherche($recherche){
      $m = new magasin;
      $req = "SELECT m.intitule AS intitule_magasin,
                     g.intitule AS intitule_ged,
                     p.intitule AS intitule_pub
              FROM magasin m
              LEFT JOIN ged g ON g.id_magasin = m.id
              LEFT JOIN pubs p ON p.id_magasin = m.id
              WHERE m.suppr = 0 
              AND g.suppr = 0
              AND p.suppr = 0
              AND m.intitule LIKE '%".$recherche."%'
              OR g.intitule LIKE '%".$recherche."%'
              OR p.intitule LIKE '%".$recherche."%'";
      $champs        = array("intitule_magasin","intitule_ged","intitule_pub");
      $liste_recherche = $m->StructList($req,$champs);
      return $liste_recherche;
    }    

    public static function VerifMagasin(){
      if(isset($_GET["magasin"])) $id_magasin = $_GET["magasin"];
      else header("location:".URL_HOME."index.php");

      $m = new magasin;
      $m->id = $id_magasin;
      $m->Load();

      if($m->id == null){
        if($_SESSION["utilisateur"]["id_type"] == 1) header("location:".URL_HOME."dashboard/entreprise.php");
        else header("location:".URL_HOME."index.php");
      } 
      return $m->id;
    }

    public static function FormAjout(){ ?>
        <div class="row">
          <div class="col-6">
            <div class="card card-small mb-4">
              <div class="card-header border-bottom">
                <h6 class="m-0">Formulaire <span class="badge badge-success text-right">Ajout</span></h6>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <strong class="text-muted d-block mb-2">Informations</strong>
                      <form action="entreprise.php?action=1" method="POST">
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Magasin</span>
                            </div>
                            <input type="text" class="form-control" name="intitule" placeholder="intitule" aria-label="intitule" aria-describedby="basic-addon1"> </div>
                        </div>
                        <div class="form-group">
                          <textarea class="form-control" name="commentaire" cols="30" rows="10" placeholder="Commentaire..."></textarea> 
                        </div>
                        <button type="submit" class="btn bg-success rounded text-white text-center" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Ajouter</button>
                      </form>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
    <?php }
}
<?php
class pubs extends config_genos {
    public $id;
    public $intitule;
    public $id_type;
    public $id_magasin;
    public $id_utilisateur;
    public $id_ged;
    public $commentaire;
 
    public function __construct (){
        parent::__construct();
        $this->id             = 0;
        $this->intitule       = "";
        $this->id_type        = 0;
        $this->id_magasin     = 0;
        $this->id_utilisateur = 0;
        $this->id_ged         = 0;
        $this->commentaire    = "";
    } 

    public static function ModalAjoutPubsVisuels(){ ?>
            <div class="modal fade" tabindex="-1" role="dialog" id="tpl-modal-pubs-visuels-ajout">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title text-white">Ajouter une pub visuel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="tpl-form-pubs-visuels-ajout" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Intitulé</label>  
                        <input type="text" class="form-control" name="intitule" placeholder="intitule" aria-label="intitule" aria-describedby="basic-addon1"> 
                      </div>   

                        <div class="form-group">
                            <label>Choisir un fichier</label>  
                            <?php 
                                $g = new ged;
                                $conf = array();
                                $conf["sql"] = "SELECT * FROM ged WHERE id_categorie = 1 AND suppr = 0";
                                $conf["class"] = "form-control";
                                $g->SelectList("id_ged","id","intitule",$conf); 
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Commentaire</label>
                            <textarea cols="30" rows="10" class="form-control" name="commentaire" v-model="addCom"></textarea>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="AjouterPubsVisuel()">Enregistrer</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
    <?php }
    
    public static function ModalAjoutPubsSonore(){ ?>
            <div class="modal fade" tabindex="-1" role="dialog" id="tpl-modal-pubs-sonore-ajout">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title text-white">Ajouter une pub sonore</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="tpl-form-pubs-sonore-ajout" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Intitulé</label>  
                        <input type="text" class="form-control" name="intitule" placeholder="intitule" aria-label="intitule" aria-describedby="basic-addon1"> 
                      </div>   

                        <div class="form-group">
                            <label>Choisir un fichier</label>  
                            <?php 
                                $g = new ged;
                                $conf = array();
                                $conf["sql"] = "SELECT * FROM ged WHERE id_categorie = 2 AND suppr = 0";
                                $conf["class"] = "form-control";
                                $g->SelectList("id_ged","id","intitule",$conf); 
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Commentaire</label>
                            <textarea cols="30" rows="10" class="form-control" name="commentaire" v-model="addCom"></textarea>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="AjouterPubsSonore()">Enregistrer</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
    <?php }    

    public static function ModalAjoutPubsOlfactif(){ ?>
            <div class="modal fade" tabindex="-1" role="dialog" id="tpl-modal-pubs-olfactif-ajout">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title text-white">Ajouter une pub olfactif</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="tpl-form-pubs-olfactif-ajout" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Intitulé</label>  
                        <input type="text" class="form-control" name="intitule" placeholder="intitule" aria-label="intitule" aria-describedby="basic-addon1"> 
                      </div>   

                        <div class="form-group">
                            <label>Choisir un fichier</label>  
                            <?php 
                                $g = new ged;
                                $conf = array();
                                $conf["sql"] = "SELECT * FROM ged WHERE id_categorie = 3 AND suppr = 0";
                                $conf["class"] = "form-control";
                                $g->SelectList("id_ged","id","intitule",$conf); 
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Commentaire</label>
                            <textarea cols="30" rows="10" class="form-control" name="commentaire" v-model="addCom"></textarea>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="AjouterPubsOlfactif()">Enregistrer</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
    <?php }

    public static function ListePubs($id_type){
        $p = new pubs;
        $req = "SELECT p.*, g.intitule AS intitule_ged
                FROM pubs p
                INNER JOIN type_pubs tp ON tp.id = p.id_type
                LEFT JOIN ged g ON g.id = p.id_ged
                WHERE p.id_type = :id_type 
                AND p.suppr = 0";
        $champs     = $p->FieldList();
        $champs[]   = "intitule_ged";
        $binds      = array("id_type" => $id_type);
        $liste_pubs = $p->StructList($req,$champs,$binds);
        return $liste_pubs;
    }     

    public static function StatistiquesCountType(){
        $p = new pubs;
        $req = "SELECT COUNT(*) AS count
                FROM pubs p
                INNER JOIN type_pubs tp ON tp.id = p.id_type
                WHERE p.suppr = 0
                GROUP BY p.id_type";
        $champs = array("count");
        $liste_count = $p->StructList($req,$champs);
        return $liste_count;
    }    
}
<?php 
class ged extends config_genos{
	public $id;
	public $id_categorie;
	public $id_utilisateur;
	public $id_magasin;
	public $intitule;
	public $commentaire;
	public $filename;
	public $extension;
	public $poids;
	public $path;

	public function __construct (){
		parent::__construct();
		$this->id             = 0 ;
		$this->id_categorie   = 0 ;
		$this->id_utilisateur = 0 ;
		$this->id_magasin     = 0 ;
		$this->intitule       = "" ;
		$this->commentaire    = "" ;
		$this->filename       = "" ;
		$this->extension      = "" ;
		$this->poids          = 0 ;
		$this->path           = "" ;

	}	

	public static function TplGed(){ ?>
		<template id="tpl-ged">
			<div class="col-md-12 bloc">
				<h5>Ged <span class="badge badge-pill badge-info">{{liste.length}}</span></h5>
				<br>

				<button v-show="$root.$refs.droits_onglet_ged && $root.$refs.droits_onglet_ged.droits_ajouter == 1 || $root.$refs.droits_onglet_ged == undefined" class="btn btn-primary btn-sm" @click="ModalAjout"><i class="fa fa-plus"></i> Ajouter</button>
				<br>
				<br>
				
				<div v-if="liste.length > 0">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Nom Fichier</th>
									<th>Poids(Ko)</th>
									<th v-show="$root.$refs.droits_onglet_ged && $root.$refs.droits_onglet_ged.droits_modifier == 1 || $root.$refs.droits_onglet_ged == undefined"></th>
									<th v-show="$root.$refs.droits_onglet_ged && $root.$refs.droits_onglet_ged.droits_telecharger== 1 || $root.$refs.droits_onglet_ged == undefined"></th>
									<th v-show="$root.$refs.droits_onglet_ged && $root.$refs.droits_onglet_ged.droits_supprimer== 1 || $root.$refs.droits_onglet_ged == undefined"></th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="e in liste">
									<td>{{$index + 1}}</td>
									<td>{{e.nom}} <sup v-if="e.commentaire.length > 0"><i class="fa fa-comment text-primary"></i></sup></td>
									<td>{{e.poids | ko}}</td>
									<td v-show="$root.$refs.droits_onglet_ged && $root.$refs.droits_onglet_ged.droits_modifier == 1 || $root.$refs.droits_onglet_ged == undefined"><button class="btn btn-info btn-sm" @click="ModalModif(e)"><i class="fa fa-edit"></i></button></td>
									<td v-show="$root.$refs.droits_onglet_ged && $root.$refs.droits_onglet_ged.droits_telecharger== 1 || $root.$refs.droits_onglet_ged == undefined"><a class="btn btn-primary btn-sm" href="{{url_home + e.path}}" download><i class="lnr lnr-download"></i></button></td>
									<td v-show="$root.$refs.droits_onglet_ged && $root.$refs.droits_onglet_ged.droits_supprimer== 1 || $root.$refs.droits_onglet_ged == undefined"><button class="btn btn-danger btn-sm" @click="Supprimer(e)"><i class="lnr lnr-trash"></i></button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div> <!-- Fin bloc et col md 12 -->

			<div class="modal" tabindex="-1" role="dialog" id="tpl-modal-ged-ajout-{{id}}">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header bg-primary text-white">
			        <h4 class="modal-title">Ajouter un Document</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form id="tpl-ged-form-ajout-{{id}}" enctype="multipart/form-data">
				        <div class="form-group">
				        	<label>Catégorie du fichier</label>
    						<select name="id_pat" class="form-control select-ged-categorie custom-select" data-live-search="true" v-model="addCategorie">
								<option value="0">Sélectionner la catégorie</option>
								<option v-for="elem in listeCategorie" value="{{elem.id}}">{{elem.intitule}}</option>
							</select>
				        </div>

			        	<div class="form-group">
			        		<label>Nom du fichier</label>	
			        		<input type="text" class="form-control" name="intitule" v-model="addIntitule">
			        	</div>
						
						<div class="form-group">
			        		<div class="input-group">
			        		 <!--  <div class="custom-file">
			        		    <input type="file" class="custom-file-input" name="fichier" id="add-fichier">
			        		    <label class="custom-file-label" for="add-fichier">Sélectionnez un fichier</label>
			        		  </div> -->
			        		  <!-- <div class="input-group-append">
			        		    <button class="btn btn-primary" type="button">Uploader</button>
			        		  </div> -->
			        		</div>
			        		<label for="add-fichier">Sélectionner un fichier</label><br>
			        		<input type="file" name="fichier" id="ged-add-fichier-{{id}}">
						</div>

						<div class="form-group">
							<label>Commentaire</label>
							<textarea name="" id="" cols="30" rows="10" class="form-control" name="commentaire" v-model="addCom"></textarea>
						</div>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary" @click="Ajouter()">Enregistrer</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			      </div>
			    </div>
			  </div>
			</div>
			

			<!-- Modal Modif/infos -->
			<div class="modal" tabindex="-1" role="dialog" id="tpl-modal-ged-modif-{{id}}">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header bg-info text-white">
			        <h4 class="modal-title">Information Document</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form id="tpl-ged-form-modif-{{id}}" enctype="multipart/form-data">
				        <div class="form-group">
				        	<label>Categorie du fichier</label>
    						<select name="id_pat" class="form-control select-ged-categorie custom-select" data-live-search="true" v-model="modifCategorie">
								<option value="0">Sélectionner la catégorie</option>
								<option v-for="elem in listeCategorie" value="{{elem.id}}">{{elem.intitule}}</option>
							</select>
				        </div>
			        	<div class="form-group">
			        		<label>Nom du fichier</label>	
			        		<input type="text" class="form-control" name="nom" v-model="modiIntitule">
			        	</div>

						<div class="form-group">
							<label>Commentaire</label>
							<textarea name="" id="" cols="30" rows="10" class="form-control" name="commentaire" v-model="modifCom"></textarea>
						</div>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary" @click="Modifier()">Enregistrer</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			      </div>
			    </div>
			  </div>
			</div>
		</template>
	<?php }

	public static function TplGedSousModule(){ ?>
		<template id="tpl-ged-sous-module">
			<input type="hidden" value="{{}}">
			<div class="col-md-12 bloc">
				<h5>
					<template v-if="sous_module == 'logos'">Liste des logos</template>
					<template v-else>Ged</template>
					<span class="badge badge-pill badge-info">{{liste.length}}</span>
				</h5>
				<br>

				<button v-show="$root.$refs.droits_onglet_logo && $root.$refs.droits_onglet_logo.droits_ajouter == 1 || $root.$refs.droits_onglet_logo == undefined" class="btn btn-primary btn-sm" @click="ModalAjout"><i class="fa fa-plus"></i> Ajouter</button>
				<br>
				<br>
				
				<div v-if="liste.length > 0">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th v-if="sous_module == 'logos'">Logo</th>
									<th>Nom Fichier</th>
									<th>Poids(Ko)</th>
									<th v-show="$root.$refs.droits_onglet_logo && $root.$refs.droits_onglet_logo.droits_modifier == 1 || $root.$refs.droits_onglet_logo == undefined"></th>
									<th v-show="$root.$refs.droits_onglet_logo && $root.$refs.droits_onglet_logo.droits_telecharger== 1 || $root.$refs.droits_onglet_logo == undefined"></th>
									<th v-show="$root.$refs.droits_onglet_logo && $root.$refs.droits_onglet_logo.droits_supprimer == 1 || $root.$refs.droits_onglet_logo == undefined"></th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="e in liste">
									<td>{{$index + 1}}</td>
									<td v-if="sous_module == 'logos'"><img :src="'<?php echo URL_HOME ?>'+e.path" class="img-fluid" width="100" height="100" alt="logo"></td>
									<td>{{e.nom}} <sup v-if="e.commentaire.length > 0"><i class="fa fa-comment text-primary"></i></sup></td>
									<td>{{e.poids | ko}}</td>
									<td v-show="$root.$refs.droits_onglet_logo && $root.$refs.droits_onglet_logo.droits_modifier == 1 || $root.$refs.droits_onglet_logo == undefined"><button class="btn btn-info btn-sm" @click="ModalModif(e)"><i class="fa fa-edit"></i></button></td>
									<td v-show="$root.$refs.droits_onglet_logo && $root.$refs.droits_onglet_logo.droits_telecharger== 1 || $root.$refs.droits_onglet_logo == undefined"><a class="btn btn-primary btn-sm" href="{{url_home + e.path}}" download><i class="lnr lnr-download"></i></button></td>
									<td v-show="$root.$refs.droits_onglet_logo && $root.$refs.droits_onglet_logo.droits_supprimer == 1 || $root.$refs.droits_onglet_logo == undefined"><button class="btn btn-danger btn-sm" @click="Supprimer(e)"><i class="lnr lnr-trash"></i></button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div> <!-- Fin bloc et col md 12 -->

			<div class="modal" tabindex="-1" role="dialog" id="tpl-modal-ged-sous-module-ajout-{{id}}">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header bg-primary text-white">
			        <h4 class="modal-title">Ajouter un Document</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form id="tpl-ged-form-ajout" enctype="multipart/form-data">
				        <div class="form-group">
				        	<label>Catégorie du fichier</label>
    						<select name="id_pat" class="form-control select-ged-sous-module-categorie  custom-select" data-live-search="true" v-model="addCategorie">
								<option value="0">Sélectionner la catégorie</option>
								<option v-for="elem in listeCategorie" value="{{elem.id}}">{{elem.intitule}}</option>
							</select>
				        </div>

			        	<div class="form-group">
			        		<label>Intitulé du fichier</label>	
			        		<input type="text" class="form-control" name="nom" v-model="addIntitule">
			        	</div>
						
						<div class="form-group">
			        		<div class="input-group">
			        		 <!--  <div class="custom-file">
			        		    <input type="file" class="custom-file-input" name="fichier" id="add-fichier">
			        		    <label class="custom-file-label" for="add-fichier">Sélectionnez un fichier</label>
			        		  </div> -->
			        		  <!-- <div class="input-group-append">
			        		    <button class="btn btn-primary" type="button">Uploader</button>
			        		  </div> -->
			        		</div>
			        		<label for="add-fichier">Sélectionner un fichier</label><br>
			        		<input type="file" name="fichier" id="add-fichier-{{id}}">
						</div>

						<div class="form-group">
							<label>Commentaire</label>
							<textarea name="" id="" cols="30" rows="10" class="form-control" name="commentaire" v-model="addCom"></textarea>
						</div>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary" @click="Ajouter()">Enregistrer</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			      </div>
			    </div>
			  </div>
			</div>
			

			<!-- Modal Modif/infos -->
			<div class="modal" tabindex="-1" role="dialog" id="tpl-modal-ged-sous-module-modif-{{id}}">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header bg-info text-white">
			        <h4 class="modal-title">Information Document</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form id="tpl-ged-form-ajout" enctype="multipart/form-data">
				        <div class="form-group">
				        	<label>Catégorie du fichier</label>
    						<select name="id_pat" class="form-control select-ged-sous-module-categorie  custom-select" data-live-search="true" v-model="modifCategorie">
								<option value="0">Sélectionner la catégorie</option>
								<option v-for="elem in listeCategorie" value="{{elem.id}}">{{elem.intitule}}</option>
							</select>
				        </div>

			        	<div class="form-group">
			        		<label>Intitulé du fichier</label>	
			        		<input type="text" class="form-control" name="intitule" v-model="modiIntitule">
			        	</div>
						
						<div class="form-group">
							<label>Commentaire</label>
							<textarea name="" id="" cols="30" rows="10" class="form-control" name="commentaire" v-model="modifCom"></textarea>
						</div>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary" @click="Modifier()">Enregistrer</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			      </div>
			    </div>
			  </div>
			</div>
		</template>
	<?php }



	public static function TplGedSynthese(){ ?>
		<template id="tpl-ged-synthese">
			<div class="card card-small mb-4">
          		<div class="card-header border-bottom">
					<h6 class="m-0">Ged Synthèse <span class="badge badge-info text-right">{{listeGed.length}}</span></h6>
	      		</div>
              	<ul class="list-group list-group-flush">
                	<li class="list-group-item p-3">
						<div class="row">
							<div class="col-12">
								<button class="btn btn-primary btn-sm" @click="ModalAjout"><i class="fa fa-plus"></i> Ajouter</button>
							</div>
							<br>
							<br>
							<div class="col">
								<select class="select-ged-synthese-extension form-control form-control-sm" v-model="selectExtension" data-live-search="true">
									<option value="0">Toutes les extensions</option>
									<option v-for="extension in listeExtension" value="{{extension}}">{{extension}}</option>
								</select>
							</div> <!-- Fin col md 2 -->

							<div class="col">
								<select class="select-ged-synthese form-control form-control-sm" v-model="selectCategorie" data-live-search="true">
									<option value="0">Toutes les catégories</option>
									<option v-for="categorie in listeCategorie" value="{{categorie.id}}">{{categorie.intitule}}</option>
								</select>
							</div> <!-- Fin col md 2 -->
							<br>
							<br>
							<div class="col-md-6">
						  		<input type="text" class="form-control form-control-sm" v-model="rech" placeholder="Rechercher une GED ..." aria-label="" aria-describedby="basic-addon1">
							</div>
						</div> <!-- Fin du row -->

						<br>
						<div v-if="listeGed.length > 0">
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Catégorie</th>
											<th>Intitulé</th>
											<th>Extension</th>
											<th>Poids(Ko)</th>
											<th>Télécharger</th>
											<th>Visualiser</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="ged in listeGed | orderBy selectTri order | filterBy rech | limitBy selectAffichage" >
											<td>{{$index + 1}}</td>
											<td>{{ged.intitule_categorie}}</td>
											<td>{{ged.intitule}}</td>
											<td>{{ged.extension}}</td>
											<td>{{ged.poids | ko}}</td>
											<td class="text-center"><a class="btn btn-primary btn-sm" href="{{url_home + ged.path}}" download><i class="fas fa-download"></i></button></td>													
											<td class="text-center"><a class="btn btn-outline-info btn-sm" href="{{url_home + ged.path}}" target="_blank">Voir</i></a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
                	</li>
                </ul>
			</div> <!-- Fin bloc et col md 12 -->


			<div class="modal fade" tabindex="-1" role="dialog" id="tpl-modal-ged-ajout-{{id}}">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header bg-primary text-white">
			        <h4 class="modal-title text-white">Ajouter un Document</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form id="tpl-ged-form-ajout-{{id}}" enctype="multipart/form-data">
				        <div class="form-group">
				        	<label>Catégorie du fichier</label>
    						<select name="id_pat" class="form-control select-ged-categorie custom-select" data-live-search="true" v-model="addCategorie">
								<option value="0">Sélectionner la catégorie</option>
								<option v-for="elem in listeCategorie" value="{{elem.id}}">{{elem.intitule}}</option>
							</select>
				        </div>

			        	<div class="form-group">
			        		<label>Nom du fichier</label>	
			        		<input type="text" class="form-control" name="intitule" v-model="addIntitule">
			        	</div>
						
						<div class="form-group">
			        		<div class="input-group">
			        		 <!--  <div class="custom-file">
			        		    <input type="file" class="custom-file-input" name="fichier" id="add-fichier">
			        		    <label class="custom-file-label" for="add-fichier">Sélectionnez un fichier</label>
			        		  </div> -->
			        		  <!-- <div class="input-group-append">
			        		    <button class="btn btn-primary" type="button">Uploader</button>
			        		  </div> -->
			        		</div>
			        		<label for="add-fichier">Sélectionner un fichier</label><br>
			        		<input type="file" name="fichier" id="ged-add-fichier-{{id}}">
						</div>

						<div class="form-group">
							<label>Commentaire</label>
							<textarea name="" id="" cols="30" rows="10" class="form-control" name="commentaire" v-model="addCom"></textarea>
						</div>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary" @click="Ajouter()">Enregistrer</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			      </div>
			    </div>
			  </div>
			</div>
			

			<!-- Modal Modif/infos -->
			<div class="modal fade" tabindex="-1" role="dialog" id="tpl-modal-ged-modif-{{id}}">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header bg-info text-white">
			        <h4 class="modal-title">Information Document</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form id="tpl-ged-form-modif-{{id}}" enctype="multipart/form-data">
				        <div class="form-group">
				        	<label>Categorie du fichier</label>
    						<select name="id_pat" class="form-control select-ged-categorie custom-select" data-live-search="true" v-model="modifCategorie">
								<option value="0">Sélectionner la catégorie</option>
								<option v-for="elem in listeCategorie" value="{{elem.id}}">{{elem.intitule}}</option>
							</select>
				        </div>
			        	<div class="form-group">
			        		<label>Nom du fichier</label>	
			        		<input type="text" class="form-control" name="nom" v-model="modiIntitule">
			        	</div>

						<div class="form-group">
							<label>Commentaire</label>
							<textarea name="" id="" cols="30" rows="10" class="form-control" name="commentaire" v-model="modifCom"></textarea>
						</div>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary" @click="Modifier()">Enregistrer</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			      </div>
			    </div>
			  </div>
			</div>
		</template>
	<?php }

	/**
	 * Insertion dans la table Ged
	 * @param type $module 
	 * @param type $ss_module 
	 * @param type $liste_fichier (int) Module_id => (array) fichiers
	 */
	public static function InsertLogosSousModule($module,$ss_module,$liste_fichier){

		$g = new ged;

		$attribut = "id_".$module;

		if(!empty((array)$liste_fichier)){

			$bind              = array();
			$bind["module"]    = $module;
			$bind["ss_module"] = $ss_module;
			$bind["date_crea"] = date('Y-m-d H:i:s');
			$bind["session"]   = $_SESSION["id_utilisateur"]."|".$_SESSION["login"];

			$req =" INSERT INTO Ged ( `module`,
									  `$attribut`,
									  `ss_module`,
									  `ss_module_id`,
									  `nom`,
									  `filename`,
									  `extension`,
									  `poids`,
									  `path`,
									  `actif`,
									  `suppr`,
									  `auteur_crea`,
									  `auteur_modif`,
									  `date_crea`,
									  `date_modif`)
								VALUES ";

			# boucle sur les fichiers
			$iteration_f = 0;
			foreach ($liste_fichier as $module_id => $fichiers){
				foreach ($fichiers as $fichier => $filename) {
					var_dump($filename);
					$req .= "(:module,
					          :id_module_".$iteration_f.",
					          :ss_module,
					          '0',
					          :nom".$iteration_f.",
					          :filename_".$iteration_f.",
					          :extension_".$iteration_f.",
					          :poids_".$iteration_f.",
					          :path_".$iteration_f.",
					          '1',
					          '0',
					          :session,
					          '',
					          :date_crea,
					          '0000-00-00 00:00:00.000000'),";
					$file_path = ged::GetPathSousModule($module,$module_id,$ss_module,0,$filename);
					$file_path = LinkRel2Data($file_path);
					$bind["id_module_".$iteration_f] = $module_id;
					$bind["nom".$iteration_f]        = $filename;
					$bind["filename_".$iteration_f]  = $filename;
					$bind["extension_".$iteration_f] = ged::GetExtension($filename);
					$bind["poids_".$iteration_f]     = intval(filesize(URL_HOME.$file_path)) / 1024; // a besoin de 777
					$bind["path_".$iteration_f]      = $file_path;
					$iteration_f ++;
				}
			}
			$req = substr($req, 0,-1); // Suppr la derniere virgule de la requete insert
			$g->Sql($req,$bind);
		}			
	}

	public static function InputAjoutGedSousModule($fichier,$module,$module_id,$sous_module, $sous_module_id){
		$g = new ged;
		$g->module 			= $module;

		if(empty($sous_module)) return;
		else $g->ss_module = $sous_module;

		if(empty($sous_module_id)) return;
		else $g->ss_module_id = $sous_module_id;

		$g->id_categorie = 0;
		$g->nom          = $_FILES["fichier"]["name"];
		$g->extension    = ged::GetExtension($_FILES["fichier"]["name"]);
		$g->filename     = $_FILES["fichier"]["name"];
		$g->poids        = intval($_FILES["fichier"]["size"]) / 1024;
		$g->path         = ged::GetPathSousModule($g->module,$module_id,$g->ss_module, $g->ss_module_id, $g->filename);
		$g->path         = LinkRel2Data($g->path);
		$attribut        = "id_".$g->module;
		$g->$attribut    = $module_id;
		// var_dump($g);
		$res = move_uploaded_file($_FILES["fichier"]['tmp_name'],"./".strtoupper($sous_module)."/".$sous_module_id."/GED/".$_FILES["fichier"]["name"]);
		if($res === TRUE){
			$g->Add();
			// if($g->Add() > 0) echo "1";
			// else echo "0";
		}
	}	

	public static function GetExtension($fichier){
		$tab = explode(".", $fichier);
		$tab = array_reverse($tab);
		if(isset($tab[0])) return $tab[0];
	}

	public static function GetPath($id_magasin,$fichier){
		$m = new magasin;
		$m->id = $id_magasin;
		$m->Load();
		ged::ExistePath(DIR."DATAS/".$m->id);
		// $path = DIR."DATAS/".$m->id."/".$fichier;
		$path = "DATAS/".$m->id."/".$fichier;
		return $path;	
	}

	public static function GetPathSousModule($module,$module_id,$sous_module, $sous_module_id, $fichier=""){
		/* Liste des modules
			-- projet
			-- client
			-- entreprise
			-- mission
			-- mission_etape
			-- contact
		*/
		switch ($module) {
			case 'mission_etape':
				$path = Mission_Etape::GetDossier($module_id);
				$path = GED::DirSousModule($path, $sous_module, $sous_module_id);
				if($fichier != "") $path.= $fichier;
				return $path;	
			break;

			case 'entreprise':
				$path = Entreprise::DirEntreprise($module_id);
				$path = GED::DirSousModule($path, $sous_module, $sous_module_id);
				if($fichier != "") $path.= $fichier;
				return $path;	
			break;

			case 'smo':
				$path = SMO::DirSmo($module_id);
				$path = GED::DirSousModule($path, $sous_module, $sous_module_id);
				if($fichier != "") $path.= $fichier;
				return $path;	
			break;			

			case 'client':
				$path = Client::DirClientStatic($module_id);
				$path = GED::DirSousModule($path, $sous_module, $sous_module_id);
				if($fichier != "") $path.= $fichier;
				return $path;	
			break;
			
		}
	}

	public static function GetPathSousModule2($module,$module_id,$sous_module, $sous_module_id, $sous_module2, $sous_module2_id, $fichier=""){
		$path = Ged::GetPathSousModule($module,$module_id,$sous_module,$sous_module_id);
		$path = str_replace("GED/", "",$path);
		$path = GED::DirSousModule($path, $sous_module2, $sous_module2_id);

		if($fichier != "") $path.= $fichier;
		return $path;	
	}

	public static function DirSousModule($path,$module,$module_id,$ged = true){
		if(!file_exists($path)) mkdir($path,0777, true);
		$path.= ''.strtoupper($module).'/';
		if(!file_exists($path)) mkdir($path,0777, true);

		switch ($module) {
			case 'logos':
				$tmp = $path;
				break;
			
			default:
				$path.= ''.strtoupper($module_id).'/';
				if(!file_exists($path)) mkdir($path,0777, true);
				$tmp = $path;
				$path.= 'GED/';
				if(!file_exists($path)) mkdir($path,0777, true);
				break;
		}
		
		return ($ged === true)?$path : $tmp;
		// return $tmp;
	}

	// Supprime le dossier d'un sous module (fichiers inclus) /ss_module/ss_module_id.
	// lié à une mission_etape
	public static function RmdirDossierSousModule($id_mission_etape,$ss_module,$ss_module_id){
		$g = new ged;
		// Liste source des ged a supprimer
		$liste_ged = $g->Find(array('id_mission_etape' => $id_mission_etape, 'ss_module' => $ss_module, 'ss_module_id' => $ss_module_id, 'suppr' => 0));

		// Supression BDD
		// $req = "UPDATE Ged SET suppr = 1 WHERE id_mission_etape = :id_mission_etape AND ss_module = :ss_module AND ss_module_id = :ss_module_id";
		$req = "DELETE FROM Ged WHERE id_mission_etape = :id_mission_etape AND ss_module = :ss_module AND ss_module_id = :ss_module_id";
		$bind = array(	"id_mission_etape" 	=> $id_mission_etape,
						"ss_module" 		=> $ss_module,
						"ss_module_id" 		=> $ss_module_id );
		$g->Sql($req,$bind);

		// Supression physique
		if(sizeof($liste_ged) > 0){
			$path = $liste_ged[0]['path'];
			$path = explode("/", $path,-2);
			$path = implode("/", $path);
			$path = DIR.$path;
			SupprimerDossier($path);
		}
	}	

	public static function RmdirDossierSousModule2($id_projet,$id_mission_etape,$ss_module,$ss_module_id,$ss_module2,$ss_module2_id){
		$g = new ged;
		// Liste source des ged a supprimer
		$liste_ged = $g->Find(array(
			'id_projet'        => $id_projet, 
			'id_mission_etape' => $id_mission_etape, 
			'ss_module'        => $ss_module, 
			'ss_module_id'     => $ss_module_id, 			
			'ss_module2'       => $ss_module2, 
			'ss_module2_id'    => $ss_module2_id, 
			'suppr' 		   => 0)
			);

		// Supression BDD
		$req = "DELETE FROM Ged 
				WHERE id_projet      = :id_projet
				AND id_mission_etape = :id_mission_etape 
				AND ss_module        = :ss_module 
				AND ss_module_id     = :ss_module_id			
				AND ss_module2       = :ss_module2 
				AND ss_module2_id    = :ss_module2_id";

		$bind = array(	"id_projet" 		=> $id_projet,
						"id_mission_etape" 	=> $id_mission_etape,
						"ss_module" 		=> $ss_module,
						"ss_module_id" 		=> $ss_module_id,			
						"ss_module2" 		=> $ss_module2,
						"ss_module2_id" 	=> $ss_module2_id );
		$g->Sql($req,$bind);

		// Supression physique
		if(sizeof($liste_ged) > 0){
			$path = $liste_ged[0]['path'];
			$path = explode("/", $path,-2);
			$path = implode("/", $path);
			$path = DIR.$path;
			SupprimerDossier($path);
		}
	}

	//Verifie si tous les dossiers du chemins existent bien sinon il les créés en 0777
	public static function ExistePath($chemin){
		$tab 	= explode("/", $chemin);
		$path 	= "";
		foreach ($tab as $key => $dossier) {
			$path.= $dossier."/";
			if(!file_exists($path)) mkdir($path,0777, true);
		}
	}

}

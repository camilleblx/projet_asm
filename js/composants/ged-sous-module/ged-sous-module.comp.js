Vue.component("gedSousModule",{
	template:"#tpl-ged-sous-module",
	props:['id','module','module_id', 'sous_module', 'sous_module_id', 'sous_module2', 'sous_module2_id','expiration'],
	data:function(){
		return{
			liste:[],
			listeCategorie:[],
			addCategorie:0,
			addNom:"",
			addCom:"",
			addDateExpi:"",
			url_home:URL_HOME,
			elemModif:{},
			modifCategorie:0,
			modifNom:"",
			modifDateExpi:"",
			modifCom:"",
			trigger: 0,
		}
	},
	ready:function(){
		if(this.expiration != 1) this.expiration = 0;
		this.GetListe();
		this.GetListeCategorie();
	},
	methods:{
		GetListe:function(){
			var scope = this;
			$.ajax({
			    url:URL_HOME+"js/composant/ged-sous-module/data.php?cas=liste",
			    type:"POST",
			    data:{	module: scope.module, 
				    	module_id:scope.module_id, 
				    	sous_module:scope.sous_module, 
				    	sous_module_id:scope.sous_module_id, 
				    	sous_module2:scope.sous_module2, 
				    	sous_module2_id:scope.sous_module2_id },
			    success:function(res){
					scope.liste = JSON.parse(res);
			    },
			    error:function(){
					
			    }
			});
		},
		GetListeCategorie:function(){
			var scope = this;
			$.ajax({
			    url:URL_HOME+"js/composant/ged/data.php?cas=liste-categorie",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.listeCategorie = JSON.parse(res);
			    },
			    error:function(){
					
			    }
			});
		},
		ModalAjout:function(){
			$("#tpl-modal-ged-sous-module-ajout-"+this.id).modal("show");
			setTimeout(function(){
				$('.select-ged-sous-module-categorie').selectpicker('refresh');
			}, 10);
		},
		ModalModif:function(elem){
			$("#tpl-modal-ged-sous-module-modif-"+this.id).modal("show");
			this.elemModif 	= elem;
			this.modifCategorie 	= this.elemModif.id_categorie;
			setTimeout(function(){
				$('.select-ged-sous-module-categorie').selectpicker('refresh');
			}, 10);
			this.modifNom 	= this.elemModif.nom;
			this.modifDateExpi	= this.elemModif.date_expiration;
			this.modifCom 	= this.elemModif.commentaire;
		},
		Ajouter:function(){
			// alert();
			$("#tpl-modal-ged-sous-module-ajout-"+this.id).modal("hide");
				var scope 	 = this;
				var fichier  = $("#add-fichier-"+scope.id)[0].files[0];
				
				var fd = new FormData();
				fd.append("module", scope.module);
				fd.append("module_id", scope.module_id);
				fd.append("sous_module", scope.sous_module);
				fd.append("sous_module_id", scope.sous_module_id);
				fd.append("sous_module2", scope.sous_module2);
				fd.append("sous_module2_id", scope.sous_module2_id);
				fd.append("id_categorie", scope.addCategorie);
				fd.append("nom", scope.addNom);
				fd.append("expiration", scope.expiration);

				if(scope.expiration == 1) fd.append("date_expiration", scope.addDateExpi);

				fd.append("commentaire", scope.addCom);
				fd.append("fichier", fichier);
				// console.log(fd);
				scope.addNom = "";
				scope.addCom = "";
			    $.ajax({
			    	url:URL_HOME + "js/composant/ged-sous-module/valid.php?cas=AjoutGed",
			    	type:"POST",
			    	data:fd,
			    	processData: false,
			    	contentType: false,
			    	success:function(res){
			    		res = JSON.parse(res);
				    	if(res == "1") Notify("success","Fichier ajouté");
			    		else Notify("danger","Le fichier n'a pas été ajouté");
						scope.GetListe();
						scope.trigger ++;
			    	},
			    	error:function(){
						// $.loading("close");
						Notify("danger","Erreur Ajax");
			    	}
			    });
		},
		Modifier:function(){
			var scope 		= this;
			var id 			= scope.elemModif.id;
			var id_categorie 	= scope.modifCategorie;
			var nom 		= scope.modifNom;
			var date_expiration	= scope.modifDateExpi;
			var commentaire = scope.modifCom;

			var datas = {id:id, nom:nom, id_categorie:id_categorie, commentaire:commentaire, expiration:scope.expiration };
			if(scope.expiration == 1) datas["date_expiration"] = date_expiration;

			$.ajax({
			    url:URL_HOME + "js/composant/ged-sous-module/valid.php?cas=ModifGed",
			    type:"POST",
			    data:datas,
			    success:function(res){
					scope.GetListe();
					$("#tpl-modal-ged-sous-module-modif-"+scope.id).modal("hide");
			    },
			    error:function(){
			
			    }
			});
		},
		Supprimer:function(elem){
			var scope 		= this;
			var id 			= elem.id;
			var rep = confirm("Etes-vous sur de vouloir supprimer le fichier : "+elem.nom+" ?");
			if(rep === true){
				$.ajax({
				    url:URL_HOME + "js/composant/ged/valid.php?cas=SupprGed",
				    type:"POST",
				    data:{id:id},
				    success:function(res){
						scope.GetListe();
						scope.trigger ++;
				    },
				    error:function(){
				
				    }
				});
			}
		},
	},
	filters:{
		ko:function(data){
			return parseFloat(data).toFixed(2);
		},
	},
	watch:{
		module:function(){
			this.GetListe();
		},
		module_id:function(){
			this.GetListe();
		},
		sous_module:function(){
			this.GetListe();
		},
		sous_module_id:function(){
			this.GetListe();
		},
		sous_module2:function(){
			this.GetListe();
		},
		sous_module2_id:function(){
			this.GetListe();
		},
	},
});
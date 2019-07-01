Vue.component("ged",{
	template:"#tpl-ged",
	props:['id','module','module_id','expiration'],
	data:function(){
		return{
			liste:[],
			listeCategorie:[],
			addCategorie:0,
			addNom:"",
			addDateExpi:"",
			addCom:"",
			url_home:URL_HOME,
			elemModif:{},
			modifCategorie:0,
			modifNom:"",
			modifDateExpi:"",
			modifCom:"",
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
			    url:URL_HOME+"js/composant/ged/data.php?cas=liste",
			    type:"POST",
			    data:{module: scope.module, module_id:scope.module_id},
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
			$("#tpl-modal-ged-ajout-"+this.id).modal("show");
			setTimeout(function(){
				$('.select-ged-categorie').selectpicker('refresh');
			}, 10);
		},
		ModalModif:function(elem){
			$("#tpl-modal-ged-modif-"+this.id).modal("show");
			this.elemModif 	= elem;
			this.modifCategorie 	= this.elemModif.id_categorie;
			setTimeout(function(){
				$('.select-ged-categorie').selectpicker('refresh');
			}, 10);
			this.modifNom 	= this.elemModif.nom;
			this.modifDateExpi	= this.elemModif.date_expiration;
			this.modifCom 	= this.elemModif.commentaire;
		},
		Ajouter:function(){
			// alert();
			$("#tpl-modal-ged-ajout-"+this.id).modal("hide");
				var scope 	 = this;
				var fichier  = $("#ged-add-fichier-"+scope.id)[0].files[0];
				
				var fd = new FormData();
				fd.append("module", scope.module);
				fd.append("module_id", scope.module_id);
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
			    	url:URL_HOME + "js/composant/ged/valid.php?cas=AjoutGed",
			    	type:"POST",
			    	data:fd,
			    	processData: false,
			    	contentType: false,
			    	success:function(res){
						scope.GetListe();
			    	},
			    	error:function(){
						// $.loading("close");
			
			    	}
			    });
		},
		Modifier:function(){
			var scope 			= this;
			var id 				= scope.elemModif.id;
			var id_categorie 	= scope.modifCategorie;
			var nom 			= scope.modifNom;
			var date_expiration	= scope.modifDateExpi;
			var commentaire 	= scope.modifCom;

			var datas = {id:id, id_categorie:id_categorie, nom:nom, commentaire:commentaire, expiration:scope.expiration };
			if(scope.expiration == 1) datas["date_expiration"] = date_expiration;

			$.ajax({
			    url:URL_HOME + "js/composant/ged/valid.php?cas=ModifGed",
			    type:"POST",
			    data:datas,
			    success:function(res){
					scope.GetListe();
					$("#tpl-modal-ged-modif-"+scope.id).modal("hide");
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
	},
});
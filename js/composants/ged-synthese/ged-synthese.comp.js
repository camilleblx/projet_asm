Vue.component("gedSynthese",{
	template:"#tpl-ged-synthese",
	props:['id_magasin','id_utilisateur'],
	data:function(){
		return{
			listeGed: [],
			originListeGed: [],
			datasListeGed: {},
			listeModule: [],
			selectModule: "0",
			listeExtension: [],
			selectExtension: "0",			
			listeCategorie: [],
			selectCategorie: "0",
			listeProjet: [],
			selectProjet: "0",			
			listeTri: [],
			selectTri: "0",
			rech: "",
			recherche: "",
			order: 1,
			listeAffichage: ["100","200"],
			selectAffichage: "50",
			url_home:URL_HOME,
			configColors:[
				{
					jours:15,
					color:'cambodge',
				},
				{
					jours:7,
					color:'ectasy',
				},
				{
					jours:1,
					color:'radicalRed',
				},
				{
					jours:-1,
					color:'indigoColor',
				},
			],
		}
	},
	ready:function(){
		var scope = this;
		$.when(this.GetListeCategorie()).done(function(){scope.RefreshSelect()});
		this.GetListeGed(true);
		this.listeTri.push({"intitule":"Catégorie","champ":"intitule_categorie"});
		this.listeTri.push({"intitule":"Intitulé","champ":"nom"});
		this.listeTri.push({"intitule":"Poids","champ":"poids"});
	},
	methods:{
		GetListeGed:function(flag){
			var scope = this;
			scope.datasListeGed.id_magasin = scope.id_magasin;
			$.ajax({
			    url:URL_HOME+"js/composants/ged-synthese/data.php?cas=liste-ged",
			    type:"POST",
			    data:scope.datasListeGed,
			    success:function(res){
					scope.listeGed = JSON.parse(res);
					if(flag == true) scope.originListeGed = scope.listeGed;
			    },
			    error:function(){
					Notify("danger","Erreur Ajax");
			    }
			});
		},	
		GetListeCategorie:function(){
			var scope = this;
			var datas = {};
			var defer = $.Deferred();
			$.ajax({
			    url:URL_HOME+"js/composants/ged-synthese/data.php?cas=liste-categorie",
			    type:"POST",
			    data:datas,
			    success:function(res){
					scope.listeCategorie = JSON.parse(res);
					defer.resolve(true);
			    },
			    error:function(){
					Notify("danger","Erreur Ajax");
					defer.resolve(false);
			    }
			});
			return defer.promise();
		},		
		ModalAjout:function(){
			$("#tpl-modal-ged-ajout-"+this.id).modal("show");
		},
		ModalModif:function(elem){
			$("#tpl-modal-ged-modif-"+this.id).modal("show");
			this.elemModif 	= elem;
			this.modifCategorie 	= this.elemModif.id_categorie;
			this.modifNom 	= this.elemModif.nom;
			this.modifCom 	= this.elemModif.commentaire;
		},
		Ajouter:function(){
			$("#tpl-modal-ged-ajout-"+this.id).modal("hide");
				var scope 	 = this;
				var fichier  = $("#ged-add-fichier-"+scope.id)[0].files[0];
				var fd = new FormData();
				fd.append("id_magasin", scope.id_magasin);
				fd.append("id_categorie", scope.addCategorie);
				fd.append("intitule", scope.addIntitule);
				fd.append("commentaire", scope.addCom);
				fd.append("fichier", fichier);
				scope.addIntitule = "";
				scope.addCom = "";
			    $.ajax({
			    	url:URL_HOME + "js/composants/ged-synthese/valid.php?cas=AjoutGed",
			    	type:"POST",
			    	data:fd,
			    	processData: false,
			    	contentType: false,
			    	success:function(res){
						scope.GetListeGed();
			    	},
			    	error:function(){

			    	}
			    });
		},
		Modifier:function(){
			var scope 			= this;
			var id 				= scope.elemModif.id;
			var id_categorie 	= scope.modifCategorie;
			var nom 			= scope.modifNom;
			var commentaire 	= scope.modifCom;
			var datas = {id:id, id_categorie:id_categorie, nom:nom, commentaire:commentaire };
			$.ajax({
			    url:URL_HOME + "js/composants/ged-synthese/valid.php?cas=ModifGed",
			    type:"POST",
			    data:datas,
			    success:function(res){
					scope.GetListeGed();
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
				    url:URL_HOME + "js/composants/ged-synthese/valid.php?cas=SupprGed",
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
		ChangerAffichage:function(affichage){
			this.selectAffichage = affichage;
		},		
		ChangerTri:function(tri){
			this.selectTri = tri;
		},
	},
	filters:{
		zero:function(data){
			if (data == 0 || data == undefined) return "";
			else return data;
		},	
	},
	watch:{
		selectExtension:function(){
			if(this.selectExtension == 0) delete this.datasListeGed.extension; // Réinitialiser
			else this.datasListeGed.extension = this.selectExtension;
			this.GetListeGed();
		},
		selectCategorie:function(){
			if(this.selectCategorie == 0) delete this.datasListeGed.id_categorie; // Réinitialiser
			else this.datasListeGed.id_categorie = this.selectCategorie;
			this.GetListeGed();
		},	
		listeGed:function(){
			this.listeExtension = [];
			for(var i=0; i<this.originListeGed.length; i++){
				if(this.listeExtension.indexOf(this.originListeGed[i].extension.toLowerCase()) == -1 && this.originListeGed[i].extension.toLowerCase() != '') this.listeExtension.push(this.originListeGed[i].extension);
			}
		},
	},
});
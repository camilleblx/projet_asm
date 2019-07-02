new Vue({
	el:"#dashboard",
	data:{
		liste_utilisateur_entreprise:[],
		liste_utilisateur_magasin:[],
		liste_pubs_visuels:[],
		liste_pubs_sonores:[],
		liste_pubs_olfactives:[],
		rech_utilisateur_entreprise:'',
		rech_utilisateur_magasin:'',
		rech_pubs_visuels:'',
		rech_pubs_olfactives:'',
		rech_pubs_sonores:'',
		enregistrement_user:false,
	},
	computed:{
		listeUtilisateurEntrepriseFiltre:function(){
			var elems = this.liste_utilisateur_entreprise;
			return elems.filter(elem =>{
				return (elem.nom.toLowerCase().indexOf(this.rech_utilisateur_entreprise.toLowerCase()) > -1) ||
				(elem.prenom.toLowerCase().indexOf(this.rech_utilisateur_entreprise.toLowerCase()) > -1) ||
				(elem.login.toLowerCase().indexOf(this.rech_utilisateur_entreprise.toLowerCase()) > -1) ||
				(elem.admin.toLowerCase().indexOf(this.rech_utilisateur_entreprise.toLowerCase()) > -1)
			});
		},		
		listeUtilisateurMagasinFiltre:function(){
			var elems = this.liste_utilisateur_magasin;
			return elems.filter(elem =>{
				return (elem.nom.toLowerCase().indexOf(this.rech_utilisateur_magasin.toLowerCase()) > -1) ||
				(elem.prenom.toLowerCase().indexOf(this.rech_utilisateur_magasin.toLowerCase()) > -1) ||
				(elem.login.toLowerCase().indexOf(this.rech_utilisateur_magasin.toLowerCase()) > -1) ||
				(elem.admin.toLowerCase().indexOf(this.rech_utilisateur_magasin.toLowerCase()) > -1)
			});
		},		
		listePubsVisuelsFiltre:function(){
			var elems = this.liste_pubs_visuels;
			return elems.filter(elem =>{
				return (elem.intitule.toLowerCase().indexOf(this.rech_pubs_visuels.toLowerCase()) > -1) ||
				(elem.intitule_ged.toLowerCase().indexOf(this.rech_pubs_visuels.toLowerCase()) > -1)
			});
		},		
		listePubsOlfactivesFiltre:function(){
			var elems = this.liste_pubs_olfactives;
			return elems.filter(elem =>{
				return (elem.intitule.toLowerCase().indexOf(this.rech_pubs_olfactives.toLowerCase()) > -1) ||
				(elem.intitule_ged.toLowerCase().indexOf(this.rech_pubs_olfactives.toLowerCase()) > -1)
			});
		},		
		listePubsSonoresFiltre:function(){
			var elems = this.liste_pubs_sonores;
			return elems.filter(elem =>{
				return (elem.intitule.toLowerCase().indexOf(this.rech_pubs_sonores.toLowerCase()) > -1) ||
				(elem.intitule_ged.toLowerCase().indexOf(this.rech_pubs_sonores.toLowerCase()) > -1)
			});
		},
	},
	ready:function(){
		this.GetListeUtilisateurEntreprise();
		this.GetListeUtilisateurMagasin();
		this.GetListePubsVisuels();
		this.GetListePubsSonores();
		this.GetListePubsOlfactives();
		var scope = this;
	},
	methods:{
		GetListeUtilisateurEntreprise:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-utilisateur-entreprise",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_utilisateur_entreprise = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},		
		GetListeUtilisateurMagasin:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-utilisateur-magasin",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_utilisateur_magasin = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},		
		GetListePubsVisuels:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-pubs-visuels",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_pubs_visuels = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},		
		GetListePubsSonores:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-pubs-sonores",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_pubs_sonores = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},		
		GetListePubsOlfactives:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-pubs-olfactives",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_pubs_olfactives = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},
		AjouterUtilisateur:function(){
			var scope = this;
			var datas = $("#form-ajout-utilisateur").serialize();
			$.ajax({
			    url:"valid.php?cas=ajouter-utilisateur",
			    type:"POST",
			    data:datas,
			    success:function(res){
			    	if(res == "1") Notify("success","L'utilisateur à été ajouté");
			    	else Notify("danger","L'utilisateur n'a pas été ajouté");
					scope.GetListeUtilisateurEntreprise();
					scope.GetListeUtilisateurMagasin();
					$("#form-ajout-utilisateur").trigger("reset");
			    },
			    error:function(){
			
			    }
			});
		},
		ModalAjoutPubsVisuel:function(){
			$("#tpl-modal-pubs-visuels-ajout").modal("show");
		},
		AjouterPubsVisuel:function(){
			var scope 	 = this;
			$("#tpl-modal-pubs-visuels-ajout").modal("hide");
			var datas = $("#tpl-form-pubs-visuels-ajout").serialize();
			datas += "&id_type=1";
		    $.ajax({
		    	url:"valid.php?cas=ajouter-pub",
		    	type:"POST",
		    	data:datas,
		    	success:function(res){
		    		res = JSON.parse(res);
			    	if(res == "1") Notify("success","La pub à été ajoutée");
			    	else Notify("danger","La pub n'a pas été ajoutée");
					scope.GetListePubsVisuels();
					$("#tpl-form-pubs-visuels-ajout").trigger("reset");
		    	},
		    	error:function(){
	
		    	}
		    });
		},		
		ModalAjoutPubsSonore:function(){
			$("#tpl-modal-pubs-sonore-ajout").modal("show");
		},
		AjouterPubsSonore:function(){
			var scope 	 = this;
			$("#tpl-modal-pubs-sonore-ajout").modal("hide");
			var datas = $("#tpl-form-pubs-sonore-ajout").serialize();
			datas += "&id_type=2";
		    $.ajax({
		    	url:"valid.php?cas=ajouter-pub",
		    	type:"POST",
		    	data:datas,
		    	success:function(res){
		    		res = JSON.parse(res);
			    	if(res == "1") Notify("success","La pub à été ajoutée");
			    	else Notify("danger","La pub n'a pas été ajoutée");
					scope.GetListePubsSonores();
					$("#tpl-form-pubs-sonore-ajout").trigger("reset");
		    	},
		    	error:function(){
	
		    	}
		    });
		},		
		ModalAjoutPubsOlfactif:function(){
			$("#tpl-modal-pubs-olfactif-ajout").modal("show");
		},
		AjouterPubsOlfactif:function(){
			var scope 	 = this;
			$("#tpl-modal-pubs-olfactif-ajout").modal("hide");
			var datas = $("#tpl-form-pubs-olfactif-ajout").serialize();
			datas += "&id_type=3";
		    $.ajax({
		    	url:"valid.php?cas=ajouter-pub",
		    	type:"POST",
		    	data:datas,
		    	success:function(res){
		    		res = JSON.parse(res);
			    	if(res == "1") Notify("success","La pub à été ajoutée");
			    	else Notify("danger","La pub n'a pas été ajoutée");
					scope.GetListePubsOlfactives();
					$("#tpl-form-pubs-olfactif-ajout").trigger("reset");
		    	},
		    	error:function(){
	
		    	}
		    });
		},		
		ModifierUtilisateur:function(){
			var scope 	 = this;
			var datas = $("#form-compte-utilisateur").serialize();
		    $.ajax({
		    	url:"valid.php?cas=modifier-utilisateur",
		    	type:"POST",
		    	data:datas,
		    	success:function(res){
		    		res = JSON.parse(res);
			    	scope.enregistrement_user = true;
		    	},
		    	error:function(){
	
		    	}
		    });
		},
		SupprimerUtilisateur:function(elem){
			var scope = this;
			var rep = confirm("Etes-vous sur de vouloir supprimer l'utilisateur ?");
			if(rep === true){
				var id_utilisateur = elem.id;
				$.ajax({
				    url:"valid.php?cas=supprimer-utilisateur",
				    type:"POST",
				    data:{id_utilisateur:id_utilisateur},
				    success:function(res){
				    	res = JSON.parse(res);
				    	if(res == "1") Notify("success","L'utilisateur à été supprimé");
				    	else Notify("danger","L'utilisateur n'a pas été supprimé");
						scope.GetListeUtilisateurEntreprise();
						scope.GetListeUtilisateurMagasin();
				    },
				    error:function(){
						Notify("danger","Erreur Ajax");
				    }
				});
			}
		},		
		SupprimerPub:function(elem){
			var scope = this;
			var rep = confirm("Etes-vous sur de vouloir supprimer la pub ?");
			if(rep === true){
				var id_pub = elem.id;
				$.ajax({
				    url:"valid.php?cas=supprimer-pub",
				    type:"POST",
				    data:{id_pub:id_pub},
				    success:function(res){
				    	res = JSON.parse(res);
				    	if(res == "1") Notify("success","La pub à été supprimé");
				    	else Notify("danger","La pub n'a pas été supprimé");
		    			scope.GetListePubsVisuels();
						scope.GetListePubsSonores();
						scope.GetListePubsOlfactives();
				    },
				    error:function(){
						Notify("danger","Erreur Ajax");
				    }
				});
			}
		},
	},
	watch:{

	},
});
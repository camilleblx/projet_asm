new Vue({
	el:"#app",
	data:{
		liste_utilisateur_administrateur:[],
		liste_utilisateur_maitrearme:[],
		liste_utilisateur:[],
		rech_utilisateur_administrateur:'',
		rech_utilisateur_maitrearme:'',
		rech_utilisateur:'',
	},
	computed:{
		listeUtilisateurAdministrateurFiltre:function(){
			var elems = this.liste_utilisateur_administrateur;
			return elems.filter(elem =>{
				return (elem.nom.toLowerCase().indexOf(this.rech_utilisateur_administrateur.toLowerCase()) > -1) ||
				(elem.prenom.toLowerCase().indexOf(this.rech_utilisateur_administrateur.toLowerCase()) > -1) ||
				(elem.login.toLowerCase().indexOf(this.rech_utilisateur_administrateur.toLowerCase()) > -1) ||
				(elem.admin.toLowerCase().indexOf(this.rech_utilisateur_administrateur.toLowerCase()) > -1)
			});
		},		
		listeUtilisateurMaitrearmeFiltre:function(){
			var elems = this.liste_utilisateur_maitrearme;
			return elems.filter(elem =>{
				return (elem.nom.toLowerCase().indexOf(this.rech_utilisateur_maitrearme.toLowerCase()) > -1) ||
				(elem.prenom.toLowerCase().indexOf(this.rech_utilisateur_maitrearme.toLowerCase()) > -1) ||
				(elem.login.toLowerCase().indexOf(this.rech_utilisateur_maitrearme.toLowerCase()) > -1) ||
				(elem.admin.toLowerCase().indexOf(this.rech_utilisateur_maitrearme.toLowerCase()) > -1)
			});
		},		
		listeUtilisateurFiltre:function(){
			var elems = this.liste_utilisateur;
			return elems.filter(elem =>{
				return (elem.nom.toLowerCase().indexOf(this.rech_utilisateur.toLowerCase()) > -1) ||
				(elem.prenom.toLowerCase().indexOf(this.rech_utilisateur.toLowerCase()) > -1) ||
				(elem.login.toLowerCase().indexOf(this.rech_utilisateur.toLowerCase()) > -1) ||
				(elem.admin.toLowerCase().indexOf(this.rech_utilisateur.toLowerCase()) > -1)
			});
		},
	},
	ready:function(){
		this.GetListeUtilisateurAdministrateur();
		this.GetListeUtilisateurMaitrearme();
		this.GetListeUtilisateur();
		var scope = this;
	},
	methods:{
		GetListeUtilisateurAdministrateur:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-utilisateur-administrateur",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_utilisateur_administrateur = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},		
		GetListeUtilisateurMaitrearme:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-utilisateur-maitrearme",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_utilisateur_maitrearme = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},		
		GetListeUtilisateur:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-utilisateur",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_utilisateur = JSON.parse(res);
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
					scope.GetListeUtilisateurAdministrateur();
					scope.GetListeUtilisateurMaitrearme();
					$("#form-ajout-utilisateur").trigger("reset");
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
						scope.GetListeUtilisateurAdministrateur();
						scope.GetListeUtilisateurMaitrearme();
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
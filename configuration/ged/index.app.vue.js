new Vue({
	el:"#app",
	data:{
		liste_utilisateur_entreprise:[],
		liste_utilisateur_magasin:[],
		rech_utilisateur_entreprise:'',
		rech_utilisateur_magasin:'',
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
	},
	ready:function(){
		this.GetListeUtilisateurEntreprise();
		this.GetListeUtilisateurMagasin();
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
	},
	watch:{

	},
});
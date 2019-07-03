new Vue({
	el:"#app",
	data:{
		liste_commentaire:[],
		liste_objectif:[],
		rech_commentaire:'',
		rech_objectif:'',
	},
	computed:{
		listeCommentaireFiltre:function(){
			var elems = this.liste_commentaire;
			return elems.filter(elem =>{
				return (elem.commentaire.toLowerCase().indexOf(this.rech_commentaire.toLowerCase()) > -1)
			});
		},		
		listeObjectifFiltre:function(){
			var elems = this.liste_objectif;
			return elems.filter(elem =>{
				return (elem.nom.toLowerCase().indexOf(this.rech_objectif.toLowerCase()) > -1) ||
				(elem.details.toLowerCase().indexOf(this.rech_objectif.toLowerCase()) > -1)
				
			});
		},
	},
	ready:function(){
		this.GetListeCommentaire();
		this.GetListeObjectif();
		var scope = this;
	},
	methods:{
		GetListeCommentaire:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-commentaire",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_commentaire = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},		
		GetListeObjectif:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-objectif",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_objectif = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},
		AjouterCommentaire:function(){
			var scope = this;
			var datas = $("#form-ajout-commentaire").serialize();
			$.ajax({
			    url:"valid.php?cas=ajouter-commentaire",
			    type:"POST",
			    data:datas,
			    success:function(res){
			    	if(res == "1") Notify("success","Le commentaire à été ajouté");
			    	else Notify("danger","Le commentaire n'a pas été ajouté");
					scope.GetListeObjectif();
					scope.GetListeCommentaire();
					$("#form-ajout-commentaire").trigger("reset");
			    },
			    error:function(){
			
			    }
			});
		},
		AjouterObjectif:function(){
			var scope = this;
			var datas = $("#form-ajout-objectif").serialize();
			$.ajax({
			    url:"valid.php?cas=ajouter-objectif",
			    type:"POST",
			    data:datas,
			    success:function(res){
			    	if(res == "1") Notify("success","L'objectif à été ajouté");
			    	else Notify("danger","L'objectif n'a pas été ajouté");
					scope.GetListeCommentaire();
					scope.GetListeObjectif();
					$("#form-ajout-objectif").trigger("reset");
			    },
			    error:function(){
			
			    }
			});
		},	
		SupprimerCommentaire:function(elem){
			var scope = this;
			var rep = confirm("Etes-vous sur de vouloir supprimer ce commentaire ?");
			if(rep === true){
				var id_utilisateur = elem.id;
				var id_commentaire = elem.id;
				$.ajax({
				    url:"valid.php?cas=supprimer-commentaire",
				    type:"POST",
				    data:{id_utilisateur:id_utilisateur},{id_commentaire:id_commentaire},
				    success:function(res){
				    	res = JSON.parse(res);
				    	if(res == "1") Notify("success","Le commentaire à été supprimé");
				    	else Notify("danger","Le commentaire n'a pas été supprimé");
						scope.GetListeCommentaire();
						scope.GetListeObjectif();
				    },
				    error:function(){
						Notify("danger","Erreur Ajax");
				    }
				};
			}
		},
		SupprimerObjectif:function(elem){
			var scope = this;
			var rep = confirm("Etes-vous sur de vouloir supprimer cette objectif ?");
			if(rep === true){
				var id_utilisateur = elem.id;
				var id_objectif =elem.id;
				$.ajax({
				    url:"valid.php?cas=supprimer-objectif",
				    type:"POST",
				    data:{id_utilisateur:id_utilisateur},{id_objectif:id_objectif},
				    success:function(res){
				    	res = JSON.parse(res);
				    	if(res == "1") Notify("success","L'objectif' à été supprimé");
				    	else Notify("danger","L'objectif n'a pas été supprimé");
						scope.GetListeCommentaire();
						scope.GetListeObjectif();
				    },
				    error:function(){
						Notify("danger","Erreur Ajax");
				    }
				};
			}
		},
	watch:{

	},
);
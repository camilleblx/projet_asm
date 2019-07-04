new Vue({
	el:"#app",
	data:{
		liste_commentaire:[],
		liste_tireurs:[],
		liste_objectif:[],
		rech_commentaire:'',
		rech_tireurs:'',
		rech_objectif:'',
	},
	ready:function(){
		alert();
		this.GetListeCommentaire();
		this.GetListeObjectif();
		this.GetListeTireurs();
		var scope = this;
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
                return (elem.nom.toLowerCase().indexOf(this.rech_objectif.toLowerCase()) > -1) 
            });
        },
		listeTireursFiltre:function(){
			var elems = this.liste_tireurs;
			return elems.filter(elem =>{
				return (elem.nom.toLowerCase().indexOf(this.rech_tireurs.toLowerCase()) > -1) 
			});
		},
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
		GetListeTireurs:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-tireurs",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_tireurs = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},

	},
	watch:{

	},
});
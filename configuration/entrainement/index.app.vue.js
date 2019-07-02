new Vue({
	el:"#app",
	data:{
		liste_magasin:[],
		rech_magasin:'',
	},
	computed:{
		listeMagasinFiltre:function(){
			var elems = this.liste_magasin;
			return elems.filter(elem =>{
				return (elem.intitule.toLowerCase().indexOf(this.rech_magasin.toLowerCase()) > -1) ||
				(elem.commentaire.toLowerCase().indexOf(this.rech_magasin.toLowerCase()) > -1)
			});
		},		
	},
	ready:function(){
		this.GetListeMagasin();
		var scope = this;
	},
	methods:{
		GetListeMagasin:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-magasin",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_magasin = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},		
		AjouterMagasin:function(){
			var scope = this;
			var datas = $("#form-ajout-magasin").serialize();
			$.ajax({
			    url:"valid.php?cas=ajouter-magasin",
			    type:"POST",
			    data:datas,
			    success:function(res){
			    	if(res == "1") Notify("success","Le magasin à été ajouté");
			    	else Notify("danger","Le magasin n'a pas été ajouté");
					scope.GetListeMagasin();
					$("#form-ajout-magasin").trigger("reset");
			    },
			    error:function(){
			
			    }
			});
		},	
		SupprimerMagasin:function(magasin){
			var scope = this;
			var rep = confirm("Etes-vous sur de vouloir supprimer le magasin ?");
			if(rep === true){
				var id_magasin = magasin.id;
				$.ajax({
				    url:"valid.php?cas=supprimer-magasin",
				    type:"POST",
				    data:{id_magasin:id_magasin},
				    success:function(res){
				    	res = JSON.parse(res);
				    	if(res == "1") Notify("success","Le magasin à été supprimé");
				    	else Notify("danger","Le magasin n'a pas été supprimé");
						scope.GetListeMagasin();
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
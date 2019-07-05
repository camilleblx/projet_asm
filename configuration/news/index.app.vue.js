new Vue({
	el:"#app",
	data:{
		liste_news:[],
		rech_news:'',
	},
	ready:function(){
		this.GetListeNews();
		var scope = this;
	},
	computed:{		
		listeNewsFiltre:function(){
			var elems = this.liste_news;
			return elems.filter(elem =>{
				return (elem.objet.toLowerCase().indexOf(this.rech_news.toLowerCase()) > -1) 
			});
		},
	},
	methods:{	
		GetListeNews:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-news",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_news = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},

		AjouterNews:function(){
			var scope = this;
			var datas = $("#form-ajout-news").serialize();
			$.ajax({
			    url:"valid.php?cas=ajouter-news",
			    type:"POST",
			    data:datas,
			    success:function(res){
			    	if(res == "1") Notify("success","L'actualité à été ajouté");
			    	else Notify("danger","L'actualité n'a pas été ajouté");
					$("#form-ajout-news").trigger("reset");
			    },
			    error:function(){
			
			    }
			});
		},
		SupprimerNews:function(elem){
			var scope = this;
			var rep = confirm("Etes-vous sur de vouloir supprimer l'actualité ?");
			if(rep === true){
				var id_news = elem.id;
				$.ajax({
				    url:"valid.php?cas=supprimer-news",
				    type:"POST",
				    data:{id_news:id_news},
				    success:function(res){
				    	res = JSON.parse(res);
				    	if(res == "1") Notify("success","L'actualité à été supprimé");
				    	else Notify("danger","L'actualité n'a pas été supprimé");
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
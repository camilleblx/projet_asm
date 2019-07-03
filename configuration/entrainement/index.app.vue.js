new Vue({
	el:"#app",
	data:{
		liste_entrainement:[],
		rech_entrainement:'',
	},
	computed:{
		listeEntrainementFiltre:function(){
			var elems = this.liste_entrainement;
			return elems.filter(elem =>{
				return (elem.nom.toLowerCase().indexOf(this.rech_entrainement.toLowerCase()) > -1) ||
				(elem.details.toLowerCase().indexOf(this.rech_entrainement.toLowerCase()) > -1)
			});
		},		
	},
	ready:function(){
		this.GetListeEntrainement();
	},
	methods:{
		GetListeEntrainement:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-entrainement",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_entrainement = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},	
		SupprimerEntrainement:function(elem){
			var scope = this;
			var rep = confirm("Etes-vous sur de vouloir supprimer l'entrainement ?");
			if(rep === true){
				var id_entrainement = elem.id;
				$.ajax({
				    url:"valid.php?cas=supprimer-entrainement",
				    type:"POST",
				    data:{id_entrainement:id_entrainement},
				    success:function(res){
				    	res = JSON.parse(res);
				    	if(res == "1") Notify("success","La compétition à été supprimé");
				    	else Notify("danger","La compétition n'a pas été supprimé");
		    			scope.GetListeEntrainement();
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
new Vue({
	el:"#app",
	data:{
		liste_annee:[],
		rech_annee:'',
	},
	computed:{
		listeAnneeFiltre:function(){
			var elems = this.liste_annee;
			return elems.filter(elem =>{
				return (elem.annee.toLowerCase().indexOf(this.rech_annee.toLowerCase()) > -1)
			});
		},		
	},
	ready:function(){
		this.GetListeAnnee();
	},
	methods:{
		GetListeAnnee:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-annee",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_annee = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},	
		SupprimerAnnee:function(elem){
			var scope = this;
			var rep = confirm("Etes-vous sur de vouloir supprimer l'année ?");
			if(rep === true){
				var id_annee = elem.id;
				$.ajax({
				    url:"valid.php?cas=supprimer-annee",
				    type:"POST",
				    data:{id_annee:id_annee},
				    success:function(res){
				    	res = JSON.parse(res);
				    	if(res == "1") Notify("success","L'année à été supprimé");
				    	else Notify("danger","L'année n'a pas été supprimé");
		    			scope.GetListeAnnee();
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
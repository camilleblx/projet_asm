new Vue({
	el:"#app",
	data:{
		liste_competition:[],
		rech_competition:'',
	},
	computed:{
		listeCompetitionFiltre:function(){
			var elems = this.liste_competition;
			return elems.filter(elem =>{
				return (elem.nom.toLowerCase().indexOf(this.rech_competition.toLowerCase()) > -1) ||
				(elem.lieux.toLowerCase().indexOf(this.rech_competition.toLowerCase()) > -1)
			});
		},		
	},
	ready:function(){
		this.GetListeCompetition();
	},
	methods:{
		GetListeCompetition:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-competition",
			    type:"POST",
			    data:{},
			    success:function(res){
					scope.liste_competition = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},
		SupprimerCompetition:function(elem){
			var scope = this;
			var rep = confirm("Etes-vous sur de vouloir supprimer la compétition ?");
			if(rep === true){
				var id_pub = elem.id;
				$.ajax({
				    url:"valid.php?cas=supprimer-competition",
				    type:"POST",
				    data:{id_pub:id_pub},
				    success:function(res){
				    	res = JSON.parse(res);
				    	if(res == "1") Notify("success","La compétition à été supprimé");
				    	else Notify("danger","La compétition n'a pas été supprimé");
		    			scope.GetListeCompetition();
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
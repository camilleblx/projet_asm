new Vue({
	el:"#app",
	data:{
		planningentrainement:[],
		// liste_competition:[],
		liste_utilisateur:[],
		code:"",
		check_code: 0,
		rech_competition: "",
		rech_participant: "",
	},
	computed:{	
		listeUtilisateurFiltre:function(){
			var elems = this.liste_utilisateur;
			return elems.filter(elem =>{
				return (elem.nom.toLowerCase().indexOf(this.rech_participant.toLowerCase()) > -1) ||
				(elem.prenom.toLowerCase().indexOf(this.rech_participant.toLowerCase()) > -1)
			});
		},
	},
	ready:function(){
		this.GetEntrainement();
	},
	methods:{
		GetListeParticipantEntrainement:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=liste-participant-entrainement",
			    type:"POST",
			    data:{id_planningentrainement:scope.planningentrainement.id,id_typeentrainement:scope.planningentrainement.id_type_entrainement},
			    success:function(res){
					scope.liste_utilisateur = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},		
		GetEntrainement:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=entrainement-jour",
			    type:"POST",
			    data:{},
			    success:function(res){
					var res = JSON.parse(res);
					scope.planningentrainement = res[0];
			    },
			    error:function(){
			
			    }
			});
		},
		CheckCode:function(){
			var scope = this;
			$.ajax({
			    url:"data.php?cas=check-code",
			    type:"POST",
			    data:{code:scope.code},
			    success:function(res){
					scope.check_code = JSON.parse(res);
			    },
			    error:function(){
			
			    }
			});
		},				
		CheckPresence:function(id_utilisateur){
			var scope = this;
			$.ajax({
			    url:"valid.php?cas=check-presence",
			    type:"POST",
			    data:{id_planningentrainement:scope.planningentrainement.id,id_utilisateur:id_utilisateur},
			    success:function(res){
					scope.GetEntrainement();
			    },
			    error:function(){
			
			    }
			});
		},		
	},
	watch:{
		check_code:function(){
			if(this.check_code == 1) this.GetListeParticipantEntrainement();
		}
	},
});
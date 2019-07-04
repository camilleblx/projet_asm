new Vue({
	el:"#app",
	data:{
		liste_competition:[],
		liste_participant:[],
		code:"",
		check_code: 0,
		rech_competition: "",
		rech_participant: "",
	},
	computed:{
		listeCompetitionFiltre:function(){
			var elems = this.liste_competition;
			return elems.filter(elem =>{
				return (elem.nom.toLowerCase().indexOf(this.rech_competition.toLowerCase()) > -1) ||
				(elem.lieux.toLowerCase().indexOf(this.rech_competition.toLowerCase()) > -1)
			});
		},		
		listeParticipantFiltre:function(){
			var elems = this.liste_participant;
			return elems.filter(elem =>{
				return (elem.nom.toLowerCase().indexOf(this.rech_participant.toLowerCase()) > -1) ||
				(elem.prenom.toLowerCase().indexOf(this.rech_participant.toLowerCase()) > -1)
			});
		},
	},
	ready:function(){
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
		ModalParticipant:function(liste_participant){
			var scope = this;
			this.liste_participant = liste_participant;
		},			
		CheckPresence:function(id_participantcompetition){
			var scope = this;
			$.ajax({
			    url:"valid.php?cas=check-presence",
			    type:"POST",
			    data:{id_participantcompetition:id_participantcompetition},
			    success:function(res){
					scope.GetListeCompetition();
			    },
			    error:function(){
			
			    }
			});
		},		
	},
	watch:{
		check_code:function(){
			if(this.check_code == 1) this.GetListeCompetition();
		}
	},
});
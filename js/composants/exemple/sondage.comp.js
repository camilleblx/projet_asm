Vue.component('sondage', { 
    template: "#sondage",
    props:['id','type','datas','choix','modif'],
    data:function(){
        return {
            rechercher: '',
            sondage: {},
        }
    },
	mounted:function(){
		if(this.datas != undefined) this.sondage = this.datas;
		else this.GetSondage();
	},
    methods:{
		GetSondage:function(){
			var scope = this;
			if(this.id == undefined) return;
			var datas = {};
			datas.id = this.id;
			$.ajax({
			    url:"data.php?cas=sondage",
			    type:"POST",
			    data:datas,
			    success:function(res){
			    	scope.sondage = JSON.parse(res);
			    },
			    error:function(){

			    }
			});
		},
		ReponseSondage:function(){
			var scope = this;
			var datas = $("#form-reponse-sondage-"+scope.sondage.id_sondage).serializeArray();
			// datas += "&liste_question_reponse="+scope.liste_question_reponse;
			// datas.push({name:"liste_question_reponse",value:JSON.stringify(scope.liste_question_reponse)});
			
			$.ajax({
			    url:URL_HOME+"js/composants/sondage/valid.php?cas=reponse-sondage",
			    type:"POST",
			    data:datas,
			    success:function(res){
			    	if(res == 1) Notify("success","Votre participation a bien été prise en compte");
			    	else Notify("danger","Une erreur est survenue, votre participation n'a pas été pris en compte");
			    },
			    error:function(){
			
			    }
			});
		},		
		ParentSupprimerSondage:function(sondage){
			this.$parent.SupprimerSondage(sondage);
		},	
		ParentAfficherModifierSondage:function(sondage){
			this.$parent.AfficherModifierSondage(sondage);
		}
    }
})
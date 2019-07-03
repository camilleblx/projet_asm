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
	},
	watch:{

	},
});
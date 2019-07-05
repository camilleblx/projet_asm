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
	},
	watch:{

	},
});
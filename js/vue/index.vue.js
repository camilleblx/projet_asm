new Vue({
	el: '#index',
	data: {
		titre: 'Vue.js',
		recherche: '',
		liste_utilisateurs: []
	},
	mounted :function(){
		this.listeUtilisateurs();
	},
    methods:{
    	listeUtilisateurs:function(){
    		var scope = this;
	        $.ajax({
	            url:"data.php?action=listeUtilisateurs",
	            type:"JSON",
	            success:function(data){
	                scope.liste_utilisateurs = JSON.parse(data);
	            },
	            error:function(data){
	                alert("Erreur ajax");
	            },
	        });
    	}
    },
	filters: {
		recherche: function (value) {
			if (!value) return ''
			value = value.toString()
			return value.charAt(0).toUpperCase() + value.slice(1)
		}
	}
})
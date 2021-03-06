new Vue({
    el:"#app",
    data:{
        liste_commentaires:[],
        liste_tireurs:[],
        liste_objectif:[],
        liste_objectif_utilisateur:[],
        liste_objectifs_commentaires:[],
        liste_lecon_utilisateur:[],
        liste_news:[],
        liste_compet:[],
        liste_presence:[],
        liste_count:[],
        rech_commentaires:'',
        rech_tireurs:'',
        rech_objectif:'',
        rech_objectif_utilisateur:'',
        rech_lecon_utilisateur:'',
        rech_objectifs_commentaires:'',
        rech_news:'',
        rech_compet:'',
        rech_presence:'',
    },
    ready:function(){
        // this.GetListePrescence();
        this.GetListeCommentaires();
        this.GetListeCompet();
        this.GetListeLeconUtilisateur();
        this.GetListeNews();
        this.GetListeObjectif();
        this.GetListeObjectifsCommentaires();
        this.GetListeObjectifUtilisateur();
        this.GetListeTireurs();
        this.GetStatistiqueCountPrescence();
        this.GetListePresence();
        var scope = this;
    },
    computed:{
        listeCommentairesFiltre:function(){
            var elems = this.liste_commentaires;
            return elems.filter(elem =>{
                return (elem.commentaires.toLowerCase().indexOf(this.rech_commentaires.toLowerCase()) > -1)
            });
        },
        listeObjectifFiltre:function(){
            var elems = this.liste_objectif;
            return elems.filter(elem =>{
                return (elem.nom.toLowerCase().indexOf(this.rech_objectif.toLowerCase()) > -1)
            });
        },           
        listeLeconUtilisateurFiltre:function(){
            var elems = this.liste_lecon_utilisateur;
            return elems.filter(elem =>{
                return (elem.nom.toLowerCase().indexOf(this.rech_objectif.toLowerCase()) > -1)
            });
        },        
        listeObjectifsUtilisateurFiltre:function(){
            var elems = this.liste_objectif_utilisateur;
            return elems.filter(elem =>{
                return (elem.nom.toLowerCase().indexOf(this.rech_objectif_utilisateur.toLowerCase()) > -1)
            });
        },
        listeObjectifsCommentairesFiltre:function(){
            var elems = this.liste_objectifs_commentaires;
            return elems.filter(elem =>{
                return (elem.nom.toLowerCase().indexOf(this.rech_objectifs_commentaires.toLowerCase()) > -1)
            });
        },
        listeTireursFiltre:function(){
            var elems = this.liste_tireurs;
            return elems.filter(elem =>{
                return (elem.nom.toLowerCase().indexOf(this.rech_tireurs.toLowerCase()) > -1)
            });
        },
        listeNewsFiltre:function(){
            var elems = this.liste_news;
            return elems.filter(elem =>{
                return (elem.objet.toLowerCase().indexOf(this.rech_news.toLowerCase()) > -1)
            });
        },
 
        listeCompetFiltre:function(){
            var elems = this.liste_compet;
            return elems.filter(elem =>{
                return (elem.nom.toLowerCase().indexOf(this.rech_compet.toLowerCase()) > -1)
            });
        },
        listePresenceFiltre:function(){
            var elems = this.liste_presence;
            return elems.filter(elem =>{
                return (elem.presence.toLowerCase().indexOf(this.rech_presence.toLowerCase()) > -1)
            });
        },
    },
    methods:{
        GetListePresence:function(){
            var scope = this;
            $.ajax({
                url:"data.php?cas=liste-presence",
                type:"POST",
                data:{},
                success:function(res){
                    scope.liste_presence = JSON.parse(res);
                },
                error:function(){

                }
            });
        },
        GetListeCommentaires:function(){
            var scope = this;
            $.ajax({
                url:"data.php?cas=liste-count",
                type:"POST",
                data:{},
                success:function(res){
                    scope.liste_count = JSON.parse(res);
                },
                error:function(){
           
                }
            });
        }, 
         GetStatistiqueCountPrescence:function(){
            var scope = this;
            $.ajax({
                url:"data.php?cas=liste-commentaires",
                type:"POST",
                data:{},
                success:function(res){
                    scope.liste_commentaires = JSON.parse(res);
                },
                error:function(){
           
                }
            });
        },         
        GetListeObjectif:function(){
            var scope = this;
            $.ajax({
                url:"data.php?cas=liste-objectif",
                type:"POST",
                data:{},
                success:function(res){
                    scope.liste_objectif = JSON.parse(res);
                },
                error:function(){
           
                }
            });
        },       
        GetListeObjectifUtilisateur:function(){
            var scope = this;
            var id_utilisateur = $("#id_utilisateur").val();
            if(id_utilisateur == undefined) return;
            $.ajax({
                url:"data.php?cas=liste-objectif-utilisateur",
                type:"POST",
                data:{id_utilisateur:id_utilisateur},
                success:function(res){
                    scope.liste_objectif_utilisateur = JSON.parse(res);
                },
                error:function(){
           
                }
            });
        },        
        GetListeLeconUtilisateur:function(){
            var scope = this;
            var id_utilisateur = $("#id_utilisateur").val();
            if(id_utilisateur == undefined) return;
            $.ajax({
                url:"data.php?cas=liste-lecon-utilisateur",
                type:"POST",
                data:{id_utilisateur:id_utilisateur},
                success:function(res){
                    scope.liste_lecon_utilisateur = JSON.parse(res);
                },
                error:function(){
           
                }
            });
        },
        GetListeObjectifsCommentaires:function(){
            var scope = this;
            $.ajax({
                url:"data.php?cas=liste-objectifs-commentaires",
                type:"POST",
                data:{},
                success:function(res){
                    scope.liste_objectifs_commentaires = JSON.parse(res);
                },
                error:function(){
           
                }
            });
        },
        GetListeTireurs:function(){
            var scope = this;
            $.ajax({
                url:"data.php?cas=liste-tireurs",
                type:"POST",
                data:{},
                success:function(res){
                    scope.liste_tireurs = JSON.parse(res);
                },
                error:function(){
           
                }
            });
        },
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
        GetListeCompet:function(){
            var scope = this;
            $.ajax({
                url:"data.php?cas=liste-competition",
                type:"POST",
                data:{},
                success:function(res){
                    scope.liste_compet = JSON.parse(res);
                },
                error:function(){
           
                }
            });
        },
        AjouterCommentaire:function(){
            var scope = this;
            var datas = $("#form-ajout-commentaire").serialize();
            $.ajax({
                url:"valid.php?cas=ajouter-commentaire",
                type:"POST",
                data:datas,
                success:function(res){
                    if(res == "1") Notify("success","Le commentaire à été ajouté");
                    else Notify("danger","Le commentaire n'a pas été ajouté");
                    scope.GetListeObjectif();
                    scope.GetListeCommentaires();
                    $("#form-ajout-commentaire").trigger("reset");
                },
                error:function(){
           
                }
            });
        },
        AjouterObjectif:function(){
            var scope = this;
            var datas = $("#form-ajout-objectif").serialize();
            $.ajax({
                url:"valid.php?cas=ajouter-objectif",
                type:"POST",
                data:datas,
                success:function(res){
                    if(res == "1") Notify("success","L'objectif à été ajouté");
                    else Notify("danger","L'objectif n'a pas été ajouté");
                    scope.GetListeCommentaires();
                    scope.GetListeObjectif();
                    $("#form-ajout-objectif").trigger("reset");
                },
                error:function(){
           
                }
            });
        },
       SupprimerObjectifUtilisateur:function(elem){
            var scope = this;
            var rep = confirm("Etes-vous sur de vouloir supprimer l'objectif ?");
            if(rep === true){
                var id_objectif = elem.id;
                $.ajax({
                    url:"valid.php?cas=supprimer-objectif",
                    type:"POST",
                    data:{id_objectif:id_objectif},
                    success:function(res){
                        res = JSON.parse(res);
                        if(res == "1") Notify("success","L'objectif à été supprimé");
                        else Notify("danger","L'objectif n'a pas été supprimé");
                        scope.GetListeObjectif();
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
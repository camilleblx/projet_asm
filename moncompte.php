<?php include("0-config/config-genos.php");
 
$u = new utilisateur;
$u->id = $_SESSION["utilisateur"]["id_utilisateur"];
$u->Load();
 
$tu = new typeutilisateur;
$tu->id = $u->id_typeutilisateur;
$tu->Load();
 
?>
<!DOCTYPE html>
<html lang="fr">
  <?php TplHead(); ?>
  <body id="page-top">
    <?php TplHeader() ?>
    <main id="app">
 
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <?php echo "<img src='".URL_HOME.$_SESSION['utilisateur']['img']."' />";?>
        </div>
        <div class="col-md-9">
          <center><h1>Bienvenue sur votre compte</h1></center>
        </div>
      </div>
 
    <nav class="nav nav-tabs" id="navigation-moncompte">
      <a class="nav-item nav-link active" href="#profil">Profil</a>
      <a class="nav-item nav-link" href="#objectif">Objectifs</a>
      <a class="nav-item nav-link" href="#historique">Historique</a>
      <a class="nav-item nav-link" href="#performance">Performance</a>
    </nav>
 
    <div class="tab-content">
      <!-- /////////////////////// PROFIL /////////////////////// -->
 
        <div class="tab-pane active" id="profil">
          <div class="card">
              <div class="card-header">
                Nom : <?php echo $u->nom ?><br /><br />
                Prénom : <?php echo $u->prenom ?><br /><br />
                Type : <?php echo $tu->nom ?>
              </div>
          </div>
        </div>
 
      <!-- /////////////////////// OBJECTIFS /////////////////////// -->
 
          <div class="tab-pane" id="objectif">
            <div class="accordion" id="accordionExample" v-for="obj_com in listeObjectifsCommentairesFiltre">
              <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ ($index + 1) }}" aria-expanded="false" aria-controls="collapse{{ ($index + 1) }}">
                      <b>{{obj_com.nom}} - {{obj_com.details}}</b>
                  </button>
                </h5>
              </div>
              <div id="collapse{{ ($index + 1) }}" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body" v-for="com in listeCommentairesFiltre">
                  Commentaire tireur : {{obj_com.commentaires}}
                </div>
              </div>
            </div>
        </div>
      </div>
 
        <!-- /////////////////////// HISTORIQUE /////////////////////// -->
        <div class="tab-pane" id="historique">Tous l'historique
        <div class="accordion" id="accordionExample" v-for="entrainement in listePresence">
          <div class="card">
              <div class="card-header" id="headingThree">
                {{entrainement.nom}}
              </div>
            </div>
        </div>
   </div>
    

  <!-- /////////////////////// PERFORMANCE /////////////////////// -->
        <div class="tab-pane" id="performance">Vos performances
         <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card card-small h-100">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Votre Assiduité</h6>
                  </div>
                  <div class="card-body d-flex py-0">
                    <canvas height="220" class="blog-users-by-device m-auto"></canvas>
                  </div>
                </div>
              </div>
    
    </div>
  
   </main>
   </div></div>
  </div>
 
    <?php TplBackTop() ?>
    <?php TplFooter() ?>
    <?php Script() ?>
    <script src="index.app.vue.js"></script>
  </body>   
</html>
 
<script type="text/javascript">
  $('#navigation-moncompte a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
</script>
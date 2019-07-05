<?php include("0-config/config-genos.php"); 
if(!isset($_GET["id_utilisateur"])) header("location:tireurs.php"); 
else $id_utilisateur = $_GET["id_utilisateur"];

var_dump(objectif::ListeObjectifsCommentairesUtilisateur($id_utilisateur));

?>

<!DOCTYPE html>
<html lang="fr">
  <?php TplHead(); ?>
  <body id="page-top">
    <?php TplHeader() ?>
    <main id="app">
      <div class="row">
              <div class="col-12">
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
        </main>
    
    <?php TplBackTop() ?>
    <?php TplFooter() ?>
    <?php Script() ?>
    <script src="index.app.vue.js"></script>
  </body>
</html>
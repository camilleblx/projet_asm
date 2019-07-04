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
          <?php echo "<img src='".URL_HOME.$u->img."' />";?>
        </div>
        <div class="col-md-9">
          <center><h1>Bienvenue sur votre compte</h1></center>
        </div>
      </div>

    <nav class="nav nav-tabs" id="navigation-moncompte">
      <a class="nav-item nav-link active" href="#profil">Profil</a>
      <a class="nav-item nav-link" href="#objectif">Objectifs</a>
      <a class="nav-item nav-link" href="#historique">Historique</a>
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
            <div class="accordion" id="accordionExample">
              <div class="card" v-for="objectif in listeObjectif">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                   {{objectif.nom}}
                  </button>
                </h5>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  Commentaire tireur : Difficultés sur l'équilibre.
                </div>
                <div class="card-body">
                  Commentaire maître d'arme : Camille doit persevérer sur les entraînements physique.
                </div>
              </div>
            </div>
        	</div>
        </div>

        <!-- /////////////////////// HISTORIQUE /////////////////////// -->
        <div class="tab-pane" id="historique">Tous l'historique</div>
        <div class="accordion" id="accordionExample">
              <div class="card" v-for="entrainements in listeEntrainementFiltre">
              	<div class="card" v-for="competition in listeCompetitionFiltre">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">


    </div>
</h5>
</div>
    <hr>

      <div class="row">
              <div class="col-12">
                <div class="card card-small mb-4">
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">Tireurs</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="objectif in listeObjectifFiltre">
                          <td>{{objectif.nom}} - {{objectif.details}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
         </div>
          </div>
        </div>

    
      </main>
  </div>
</main>
    <?php TplBackTop() ?>
    <?php TplFooter() ?>
    <?php Script() ?>
    <script src="index.app.vue.js"></script>
	<script type="text/javascript">
	  $('#navigation-moncompte a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		})
	</script>
  </body>
</html>

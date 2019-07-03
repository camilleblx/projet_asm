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
              <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Travailler les jambes
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
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Podium au prochain tournois
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  Commentaire tireur : Rester sérieuse.
                </div>
                <div class="card-body">
                  Commentaire maître d'arme : Objectif réalisable.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Faire les championnats de France
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  Commentaire tireur : Garder une assuidité remarquable.
                </div>
                <div class="card-body">
                  Commentaire maître d'arme : Souhait réalisable si Camille persevère aux entrainements.
                </div>
              </div>
            </div>
        </div>
        </div>

        <!-- /////////////////////// HISTORIQUE /////////////////////// -->
        <div class="tab-pane" id="historique">Tous l'historique</div>
    </div>
    <hr>


    
  </div>
    <?php TplBackTop() ?>
    <?php TplFooter() ?>
    <?php Script() ?>
  </body>
</html>

<script type="text/javascript">
  $('#navigation-moncompte a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})
</script>
<?php include("../../0-config/config-genos.php"); 

  // if(isset($_GET["action"])) $action = $_GET["action"];
  // else $action = 0;

  // $m = new magasin;
  
  // if($_SESSION["utilisateur"]["id_type"] != 1){
  //   $magasin_utilisateur = magasin_utilisateur::ListeMagasinUtilisateur($_SESSION["utilisateur"]["id_utilisateur"]);
  //   $m->id = $magasin_utilisateur[0]["id"];
  //   $m->Load();
  //   var_dump($m);
  //   // if($m->id != null) header("location:".URL_HOME."dashboard/index.php?magasin=".$m->id);
  //   // else header("location:".URL_HOME."dashboard/index.php?magasin=0");
  // }

  // if($action == 1 && !empty($_POST)){
  //   $m->intitule    .= $_POST["intitule"];
  //   $m->commentaire = $_POST["commentaire"];
  //   $m->Add();
  //   magasin_utilisateur::AffecterMagasinUtilisateur($m->id, $_SESSION["utilisateur"]["id_utilisateur"]);
  //   header("location:".URL_HOME."dashboard/entreprise.php");
  // }

 ?>

<!DOCTYPE html>
<html lang="fr">
  <?php TplHead(); ?>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <?php TplDashboardConfiguration("configuration") ?>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="alert alert-accent alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-info mx-2"></i>
            <strong>Espace configuration</strong> Administrateur
          </div>
          <div class="main-content-container container-fluid px-4">
            <!-- / .main-navbar -->
          </div>
        </main>
      </div> <!-- Fin row -->
    </div> <!-- Fin container-fluid -->
    <?php Script() ?>
  </body>
</html>
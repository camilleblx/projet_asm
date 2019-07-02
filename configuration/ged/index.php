<?php include("../../../0-config/config-genos.php"); ?>

<!DOCTYPE html>
<html lang="fr">
  <?php TplHead(); ?>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <?php TplDashboardConfiguration("magasin") ?>
        <!-- End Main Sidebar -->
        <main id="app" class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="alert alert-accent alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-info mx-2"></i>
            <strong>Espace configuration</strong> Administrateur
          </div>
          <div class="main-content-container container-fluid px-4">
            <!-- / .main-navbar -->

            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">GED</span>
                <h3 class="page-title">Ajouter un GED</h3>
              </div>
            </div>
            <!-- End Page Header -->            
            
          </div>
        </main>
      </div> <!-- Fin row -->
    </div> <!-- Fin container-fluid -->
    <?php Script() ?>
    <script src="index.app.vue.js"></script>
  </body>
</html>
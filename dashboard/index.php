<?php include("../0-config/config-genos.php"); 
  $id_magasin = magasin::VerifMagasin();
  $traduction = unserialize(TRADUCTION);
?>

<!DOCTYPE html>
<html lang="fr">
  <?php TplHead(); ?>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <?php TplDashboardSideBar($id_magasin) ?>
        <!-- End Main Sidebar -->
        <main id="dashboard" class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <?php TplDashboardNavbar($id_magasin) ?>

          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Synthèse</span>
                <h3 class="page-title">Statistiques</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
              <!-- Users By Device Stats -->
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card card-small h-100">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Les types de pubs</h6>
                  </div>
                  <div class="card-body d-flex py-0">
                    <canvas height="220" class="blog-users-by-device m-auto"></canvas>
                  </div>
                </div>
              </div>
              <!-- End Users By Device Stats -->

            </div>
          </div> <!-- Fin main-content-container -->
          <?php TplDashboardFooter($id_magasin) ?>
        </main>
      </div> <!-- Fin row -->
    </div> <!-- Fin container-fluid -->
    <?php Script(true) ?>
  </body>
</html>
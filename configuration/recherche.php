<?php include("../0-config/config-genos.php"); 
  $id_magasin = magasin::VerifMagasin();
  $liste_recherche = array();
  if(isset($_POST["recherche"])) $liste_recherche = magasin::ListeRecherche($_POST["recherche"]);
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
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <?php TplDashboardNavbar($id_magasin) ?>

          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Recherche</span>
                <h3 class="page-title">Résultat de la recherche</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Liste des résultats</h6>
                    <br>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Intitule magasin</th>
                          <th scope="col" class="border-0">Intitule pub</th>
                          <th scope="col" class="border-0">Intitule GED</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        foreach ($liste_recherche as $key => $ligne) { 
                      ?>
                        <tr>
                          <td><?php echo $key +1 ?></td>
                          <td><?php echo $ligne["intitule_magasin"] ?></td>
                          <td><?php echo $ligne["intitule_pub"] ?></td>
                          <td><?php echo $ligne["intitule_ged"] ?></td>
                        </tr> 
                      <?php 
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>                  
              </div>
            </div> <!-- Fin du row -->
          </div> <!-- Fin main-content-container -->
          <?php TplDashboardFooter($id_magasin) ?>
        </main>
      </div> <!-- Fin row -->
    </div> <!-- Fin container-fluid -->
    <?php Script() ?>
  </body>
</html>
<?php include("../0-config/config-genos.php"); 
  $id_magasin = magasin::VerifMagasin();
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
          <?php pubs::ModalAjoutPubsOlfactif() ?>

          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Pubs</span>
                <h3 class="page-title">Gérer les pubs olfactives</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Liste des pubs</h6>
                    <br>
                    <button class="btn btn-primary btn-sm" @click="ModalAjoutPubsOlfactif()"><i class="fa fa-plus"></i> Ajouter</button>
                    <br>
                    <br>
                    <input type="text" class="form-control form-control-sm" v-model="rech_pubs_olfactives" placeholder="Rechercher une pubs..." aria-describedby="basic-addon1">
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Intitule</th>
                          <th scope="col" class="border-0">GED</th>
                          <th scope="col" class="border-0">Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="pub in listePubsOlfactivesFiltre">
                          <td>{{ ($index + 1) }}</td>
                          <td>{{pub.intitule}}</td>
                          <td>{{pub.intitule_ged}}</td>
                          <td><button href="#" @click="SupprimerPub(pub)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                        </tr>
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
    <?php Script(true) ?>
  </body>
</html>
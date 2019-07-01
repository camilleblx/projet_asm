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
        <?php ged::TplGedSynthese(); ?>
        <!-- End Main Sidebar -->
        <main id="dashboard" class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <?php TplDashboardNavbar($id_magasin) ?>

          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">GED</span>
                <h3 class="page-title">Liste des éléments GED</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <ged-synthese id_magasin="<?php echo $id_magasin ?>"></ged-synthese>
            <div class="row">
<!--               <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Utilisateurs entreprise</h6>
                    <br>
                    <input type="text" class="form-control form-control-sm" v-model="rech_ged_magasin" placeholder="Rechercher un utilisateur..." aria-describedby="basic-addon1">
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Nom</th>
                          <th scope="col" class="border-0">Prénom</th>
                          <th scope="col" class="border-0">Login</th>
                          <th scope="col" class="border-0">Admin</th>
                          <th scope="col" class="border-0">Modifier</th>
                          <th scope="col" class="border-0">Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="ged in listeGedMagasinFiltre">
                          <td>{{ ($index + 1) }}</td>
                          <td>{{ged.nom}}</td>
                          <td>{{ged.prenom}}</td>
                          <td>{{ged.login}}</td>
                          <td>{{{ged.admin | booleanCroix }}}</td>
                          <td><a href="form.php?action=2&id={{ged}}" class="btn btn-info btn-sm"><i class="fa fa-edit text-white"></i></a></td>
                          <td><button href="#" @click="SupprimerUtilisateur(ged)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>                 
              </div> -->
            </div> <!-- Fin du row -->
            <!-- End Default Light Table -->
          </div> <!-- Fin main-content-container -->
          <?php TplDashboardFooter($id_magasin) ?>
        </main>
      </div> <!-- Fin row -->
    </div> <!-- Fin container-fluid -->
    <?php Script(true) ?>
  </body>
</html>
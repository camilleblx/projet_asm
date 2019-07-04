<?php include("../../0-config/config-genos.php"); ?>

<!DOCTYPE html>
<html lang="fr">
  <?php TplHead(); ?>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <?php TplDashboardConfiguration("utilisateur") ?>
        <!-- End Main Sidebar -->
        <main id="app" class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <?php TplDashboardAlert() ?>
          <div class="main-content-container container-fluid px-4">
            <!-- / .main-navbar -->
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Liste des actualités</h3>
              </div>
              <br>
            </div>
            <!-- End Page Header -->
            <div class="row">
              <div class="col-12">
                <a href="form.php?action=1" class="btn bg-success rounded text-white text-center box-shadow"><i class="material-icons">add</i> Ajouter une actualité</a>
              </div>
            </div>
            <br>
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Actualités</h6>
                    <br>
                    <input type="text" class="form-control form-control-sm col-4" v-model="rech_utilisateur_administrateur" placeholder="Rechercher un utilisateur..." aria-describedby="basic-addon1">
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Objet</th>
                          <th scope="col" class="border-0">Date de création</th>
                          <th scope="col" class="border-0">Image</th>
                          <th scope="col" class="border-0">Lien</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="new in listeNewsFiltre">
                          <td>{{ ($index + 1) }}</td>
                          <td>{{new.objet}}</td>  
                          <td>{{new.date_creation}}</td>
                          <td>{{new.img}}</td>
                          <td>{{new.lien}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>                  
              </div>
            </div> <!-- Fin du row -->
            <!-- End Default Light Table -->
          </div>
        </main>
      </div> <!-- Fin row -->
    </div> <!-- Fin container-fluid -->
    <?php Script() ?>
    <script src="index.app.vue.js"></script>
  </body>
</html>
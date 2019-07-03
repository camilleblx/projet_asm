<?php include("../../0-config/config-genos.php"); ?>

<!DOCTYPE html>
<html lang="fr">
  <?php TplHead(); ?>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <?php TplDashboardConfiguration("entrainement") ?>
        <!-- End Main Sidebar -->
        <main id="app" class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <?php TplDashboardAlert() ?>
          <div class="main-content-container container-fluid px-4">
            <!-- / .main-navbar -->
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Entrainements</h3>
              </div>
              <br>
            </div>
            <!-- End Page Header -->
            <div class="row">
              <div class="col-12">
                <a href="form.php?action=1" class="btn bg-success rounded text-white text-center box-shadow"><i class="material-icons">add</i> Ajouter un entrainement</a>
              </div>
            </div>
            <br>
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Liste des entrainements</h6>
                    <br>
                    <input type="text" class="form-control form-control-sm col-4" v-model="rech_entrainement" placeholder="Rechercher un entrainement..." aria-describedby="basic-addon1">
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Nom</th>
                          <th scope="col" class="border-0">Détails</th>
                          <th scope="col" class="border-0">Date</th>
                          <th scope="col" class="border-0">Heure début</th>
                          <th scope="col" class="border-0">Heure fin</th>
                          <th scope="col" class="border-0">Type</th>
                          <th scope="col" class="border-0">Catégorie</th>
                          <th scope="col" class="border-0">Modifier</th>
                          <th scope="col" class="border-0">Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="entrainement in listeEntrainementFiltre">
                          <td>{{ ($index + 1) }}</td>
                          <td>{{entrainement.nom}}</td>  
                          <td>{{entrainement.details}}</td>
                          <td>{{entrainement.dateEnt}}</td>
                          <td>{{entrainement.heureDebEnt}}</td>
                          <td>{{entrainement.heureFinEnt}}</td>
                          <td>{{entrainement.nom_type_entrainement}}</td>
                          <td>{{entrainement.nom_categorie}}</td>
                          <td><a href="form.php?action=2&id={{entrainement.id}}" class="btn btn-info btn-sm"><i class="fa fa-edit text-white"></i></a></td>
                          <td><button href="#" @click="SupprimerEntrainement(entrainement)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
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
<?php include("../../0-config/config-genos.php"); ?>

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
                <span class="text-uppercase page-subtitle">Magasin</span>
                <h3 class="page-title">Ajouter un magasin</h3>
              </div>
            </div>
            <!-- End Page Header -->            
            <div class="card card-small mb-4 col-6">
              <div class="card-header border-bottom">
                <h6 class="m-0">Formulaire <span class="badge badge-success text-right">Ajout</span></h6>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <strong class="text-muted d-block mb-2">Informations</strong>
                      <form id="form-ajout-magasin">
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Magasin</span>
                            </div>
                            <input type="text" class="form-control" name="intitule" placeholder="intitule" aria-label="intitule" aria-describedby="basic-addon1"> </div>
                        </div>
                        <div class="form-group">
                          <textarea class="form-control" name="commentaire" cols="30" rows="10" placeholder="Commentaire..."></textarea> 
                        </div>
                        <div v-on:click="AjouterMagasin()" class="btn bg-success rounded text-white text-center" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Ajouter</div>
                      </form>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Liste des magasins</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Magasins</h6>
                    <br>
                    <input type="text" class="form-control form-control-sm" v-model="rech_magasin" placeholder="Rechercher un magasin..." aria-describedby="basic-addon1">
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Intitule</th>
                          <th scope="col" class="border-0">Commentaire</th>
                          <th scope="col" class="border-0">Modifier</th>
                          <th scope="col" class="border-0">Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="magasin in listeMagasinFiltre">
                          <td>{{ ($index + 1) }}</td>
                          <td>{{magasin.intitule}}</td>
                          <td>{{magasin.commentaire.substring(0,20)+"..."}}</td>
                          <td><a href="form.php?action=2&id={{magasin.id}}" class="btn btn-info btn-sm"><i class="fa fa-edit text-white"></i></a></td>
                          <td><button href="#" @click="SupprimerMagasin(magasin)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
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
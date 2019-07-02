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
                <h3 class="page-title">Liste des utilisateurs</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Utilisateurs administrateur</h6>
                    <br>
                    <input type="text" class="form-control form-control-sm col-4" v-model="rech_utilisateur_administrateur" placeholder="Rechercher un utilisateur..." aria-describedby="basic-addon1">
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Nom</th>
                          <th scope="col" class="border-0">Prénom</th>
                          <th scope="col" class="border-0">Login</th>
                          <th scope="col" class="border-0">Téléhone</th>
                          <th scope="col" class="border-0">Arbitre</th>
                          <th scope="col" class="border-0">Catégorie</th>
                          <th scope="col" class="border-0">Mail</th>
                          <th scope="col" class="border-0">Modifier</th>
                          <th scope="col" class="border-0">Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="utilisateur in listeUtilisateurAdministrateurFiltre">
                          <td>{{ ($index + 1) }}</td>
                          <td>{{utilisateur.nom}}</td>  
                          <td>{{utilisateur.prenom}}</td>
                          <td>{{utilisateur.login}}</td>
                          <td>{{utilisateur.telephone}}</td>
                          <td>{{utilisateur.nom_type_arbitre}}</td>
                          <td>{{utilisateur.nom_categorie}}</td>
                          <td>{{{utilisateur.mail | email}}}</td>
                          <td><a href="form.php?action=2&id={{utilisateur.id}}" class="btn btn-info btn-sm"><i class="fa fa-edit text-white"></i></a></td>
                          <td><button href="#" @click="SupprimerUtilisateur(utilisateur)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>                 
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Utilisateurs maitre d'arme</h6>
                    <br>
                    <input type="text" class="form-control form-control-sm col-4" v-model="rech_utilisateur_maitrearme" placeholder="Rechercher un utilisateur..." aria-describedby="basic-addon1">
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Nom</th>
                          <th scope="col" class="border-0">Prénom</th>
                          <th scope="col" class="border-0">Login</th>
                          <th scope="col" class="border-0">Téléhone</th>
                          <th scope="col" class="border-0">Arbitre</th>
                          <th scope="col" class="border-0">Catégorie</th>
                          <th scope="col" class="border-0">Mail</th>
                          <th scope="col" class="border-0">Modifier</th>
                          <th scope="col" class="border-0">Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="utilisateur in listeUtilisateurMaitrearmeFiltre">
                          <td>{{ ($index + 1) }}</td>
                          <td>{{utilisateur.nom}}</td>
                          <td>{{utilisateur.prenom}}</td>
                          <td>{{utilisateur.login}}</td>
                          <td>{{utilisateur.telephone}}</td>
                          <td>{{utilisateur.nom_type_arbitre}}</td>
                          <td>{{utilisateur.nom_categorie}}</td>
                          <td>{{{utilisateur.mail | email}}}</td>
                          <td><a href="form.php?action=2&id={{utilisateur.id}}" class="btn btn-info btn-sm"><i class="fa fa-edit text-white"></i></a></td>
                          <td><button href="#" @click="SupprimerUtilisateur(utilisateur)" class="btn btn-danger btn-sm" @click="Supprimer(elem)"><i class="fa fa-trash"></i></button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>                  
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Utilisateurs tireur</h6>
                    <br>
                    <input type="text" class="form-control form-control-sm col-4" v-model="rech_utilisateur" placeholder="Rechercher un utilisateur..." aria-describedby="basic-addon1">
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Nom</th>
                          <th scope="col" class="border-0">Prénom</th>
                          <th scope="col" class="border-0">Login</th>
                          <th scope="col" class="border-0">Téléhone</th>
                          <th scope="col" class="border-0">Arbitre</th>
                          <th scope="col" class="border-0">Catégorie</th>
                          <th scope="col" class="border-0">Mail</th>
                          <th scope="col" class="border-0">Modifier</th>
                          <th scope="col" class="border-0">Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="utilisateur in listeUtilisateurFiltre">
                          <td>{{ ($index + 1) }}</td>
                          <td>{{utilisateur.nom}}</td>
                          <td>{{utilisateur.prenom}}</td>
                          <td>{{utilisateur.login}}</td>
                          <td>{{utilisateur.telephone}}</td>
                          <td>{{utilisateur.nom_type_arbitre}}</td>
                          <td>{{utilisateur.nom_categorie}}</td>
                          <td>{{{utilisateur.mail | email}}}</td>
                          <td><a href="form.php?action=2&id={{utilisateur.id}}" class="btn btn-info btn-sm"><i class="fa fa-edit text-white"></i></a></td>
                          <td><button href="#" @click="SupprimerUtilisateur(utilisateur)" class="btn btn-danger btn-sm" @click="Supprimer(elem)"><i class="fa fa-trash"></i></button></td>
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
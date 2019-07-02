<?php include("../../../0-config/config-genos.php"); ?>

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
                <span class="text-uppercase page-subtitle">Utilisateur</span>
                <h3 class="page-title">Ajouter un utilisateur</h3>
              </div>
            </div>
            <!-- End Page Header -->            
            <div class="card card-small mb-4 col-md-6 ">
              <div class="card-header border-bottom">
                <h6 class="m-0">Formulaire <span class="badge badge-success text-right">Ajout</span></h6>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                  <strong class="text-muted d-block mb-2">Informations</strong>
                  <form id="form-ajout-utilisateur">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="login" placeholder="login" aria-label="login" aria-describedby="basic-addon1"> 
                      </div>                           
                      <div class="form-group col-md-6">
                        <input type="password" class="form-control" name="mdp" placeholder="mot de passe">
                      </div>                        
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="nom" placeholder="nom" aria-label="nom" aria-describedby="basic-addon1"> 
                      </div>                        
                      <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="prenom" placeholder="prenom" aria-label="prenom" aria-describedby="basic-addon1"> 
                      </div>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="commentaire"  rows="3" placeholder="Commentaire..."></textarea> 
                    </div>
                    <div class="form-group">
                      <?php 
                        $tu = new type_utilisateur;
                        $conf = array();
                        $conf["sql"] = "SELECT * FROM type_utilisateur WHERE suppr = 0";
                        $conf["class"] = "form-control";
                        $tu->SelectList("id_type","id","intitule",$conf); 
                      ?>
                    </div>
                    <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                      <input type="checkbox" id="input-admin" name="admin" class="custom-control-input">
                      <label class="custom-control-label" for="input-admin">Admin</label>
                    </div>
                    <br>
                    <div v-on:click="AjouterUtilisateur()" class="btn bg-success rounded text-white text-center" style="box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Ajouter</div>
                  </form>
                </li>
              </ul>
            </div>
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
                    <h6 class="m-0">Utilisateurs entreprise</h6>
                    <br>
                    <input type="text" class="form-control form-control-sm" v-model="rech_utilisateur_entreprise" placeholder="Rechercher un utilisateur..." aria-describedby="basic-addon1">
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
                        <tr v-for="utilisateur in listeUtilisateurEntrepriseFiltre">
                          <td>{{ ($index + 1) }}</td>
                          <td>{{utilisateur.nom}}</td>
                          <td>{{utilisateur.prenom}}</td>
                          <td>{{utilisateur.login}}</td>
                          <td>{{{utilisateur.admin | booleanCroix }}}</td>
                          <td><a href="form.php?action=2&id={{utilisateur}}" class="btn btn-info btn-sm"><i class="fa fa-edit text-white"></i></a></td>
                          <td><button href="#" @click="SupprimerUtilisateur(utilisateur)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>                 
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Utilisateurs magasin</h6>
                    <br>
                    <input type="text" class="form-control form-control-sm" v-model="rech_utilisateur_magasin" placeholder="Rechercher un utilisateur..." aria-describedby="basic-addon1">
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
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="utilisateur in listeUtilisateurMagasinFiltre">
                          <td>{{ ($index + 1) }}</td>
                          <td>{{utilisateur.nom}}</td>
                          <td>{{utilisateur.prenom}}</td>
                          <td>{{utilisateur.login}}</td>
                          <td>{{{utilisateur.admin | booleanCroix }}}</td>
                          <td><a href="form.php?action=2&id={{elem.id_contact}}" class="btn btn-info btn-sm"><i class="fa fa-edit text-white"></i></a></td>
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
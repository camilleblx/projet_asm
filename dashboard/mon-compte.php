<?php include("../0-config/config-genos.php"); 
  $id_magasin = magasin::VerifMagasin();

    $u = new utilisateur;
    $u->id = $_SESSION["utilisateur"]["id_utilisateur"];
    $u->Load();
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
          <div v-show="enregistrement_user == true" style="display: none" class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i>
            <strong>Enregistrement réussi !</strong> Votre profil à été mise à jour
          </div>

          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
<!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Mon compte</span>
                <h3 class="page-title">Espace utilisateur</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="<?php echo URL_HOME ?>img/user.jpg" alt="User Avatar" width="110"> </div>
                    <h4 class="mb-0"><?php echo $u->nom ?> <?php echo $u->prenom ?></h4>
                    <span class="text-muted d-block mb-2"><?php echo $_SESSION["utilisateur"]["type"] ?></span>
                  </div>

                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Détails du compte</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form id="form-compte-utilisateur" method="POST">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feLogin">Login</label>
                                <input type="text" class="form-control" name="login" id="feLogin" placeholder="First Name" value="<?php echo $u->login ?>" disabled="true"> 
                              </div>                              
                              <div class="form-group col-md-6">
                              </div>                             
                              <div class="form-group col-md-6">
                                <label for="feFirstName">Nom</label>
                                <input type="text" class="form-control" name="nom" id="feFirstName" placeholder="First Name" value="<?php echo $u->nom ?>"> 
                              </div>
                              <div class="form-group col-md-6">
                                <label for="feLastName">Prenom</label>
                                <input type="text" class="form-control" name="prenom" id="feLastName" placeholder="Last Name" value="<?php echo $u->prenom ?>"> 
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Email</label>
                                <input type="email" class="form-control" name="email" id="feEmailAddress" placeholder="Email" value="<?php echo $u->email ?>"> 
                              </div>
                            </div>
                            <div v-on:click="ModifierUtilisateur()" class="btn btn-accent">Enregistrer</div>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div> <!-- Fin main-content-container -->
          <?php TplDashboardFooter($id_magasin) ?>
        </main>
      </div> <!-- Fin row -->
    </div> <!-- Fin container-fluid -->
    <?php Script(true) ?>
  </body>
</html>
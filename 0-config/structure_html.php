<?php 
function TplLoader(){ ?>

    <div id="loader-container">
        <div id="loader"></div>
    </div>

<?php }

function TplHead() {  ?>

    <head>
        <!-- META --> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="projet-annuel">
        <meta name="msapplication-TileColor" content="#00aba9">
        <meta name="theme-color" content="#ffffff">

        <!-- TITLE -->
        <?php 
          $page = GetPage(); 
          switch (strtolower($page)) {
              case 'index.php': ?>
                  <title>Dashboard</title>
                  <?php break;        

              case 'magasins.php': ?>
                  <title>Mes magasins</title>
                  <?php break;

              default: ?>
                  <title>Projet annuel</title>
              <?php
          }  
        ?>

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" type="text/css" href="<?php echo URL_HOME ?>css/bootstrap.min.css">

        <!-- BOOTSTRAP-SELECT -->
        <link rel="stylesheet" type="text/css" href="<?php echo URL_HOME ?>css/bootstrap-select.min.css">

        <!-- ANIMATE -->
        <link rel="stylesheet" type="text/css" href="<?php echo URL_HOME ?>css/animate.css">        

        <!-- FONTS -->
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo URL_HOME ?>css/fontawesome-all.min.css"> -->
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo URL_HOME ?>css/linearicons.css"> -->
        <!-- <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"> -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo URL_HOME ?>css/style.css">
        <link rel="stylesheet" <?php if($page == "pubs-olfactives.php") echo 'active' ?> type="text/css" href="<?php echo URL_HOME ?>css/shards-dashboards.1.1.0.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL_HOME ?>css/extras.1.1.0.min.css">

        <!-- JS ? -->
        <script async defer src="<?php echo URL_HOME ?>js/buttons.js"></script>

        <!-- FAVICON -->
        <link rel="apple-touch-icon" sizes="180x180"    href="<?php echo URL_HOME ?>img/logo/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo URL_HOME ?>img/logo/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URL_HOME ?>img/logo/favicon-16x16.png">
        <link rel="manifest"                            href="<?php echo URL_HOME ?>img/logo/site.webmanifest">
        <link rel="mask-icon"                           href="/safari-pinned-tab.svg" color="#5bbad5">
    </head>
    <?php TplLoader() ?>

<?php }



function TplHeader() {  ?>
    <!-- Navigation -->
    <nav id="menu" class="navbar navbar-default fixed-top intro-animated after hidden">
        <div class="container">
            <div class="navbar-header page-scroll">
                <!-- <a class="navbar-brand page-scroll" href="#page-top"><img src="img/myhome.png" alt="Lattes theme logo">MyHome</a> -->
                <a id="logo" class="navbar-brand page-scroll" href="index.php">MyWatch</a>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active mt-1" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled mt-1" href="contact.php">Contact</a>
                </li>                
                <li class="nav-item">
                  <?php 
                    if(!empty($_SESSION['utilisateur'])){ ?>
                        <a class="nav-link disabled mt-1"  href="moncompte.php" >Mon compte</a>
                    <?php } ?>
                </li>
                <li class="nav-item btn-connexion">
                  <?php 
                  if(empty($_SESSION['utilisateur'])){ ?>
                      <a class="nav-link disabled"  href="<?php echo URL_HOME ?>connexion.php" >Connexion</a>
                  <?php }else{ ?>
                      <a class="nav-link disabled"  href="<?php echo URL_HOME ?>deconnexion.php" >Déconnexion</a>
                  <?php } ?>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="slider-container">
                <div class="intro-text intro-animated hidden">
                    <div class="intro-lead-in">Cercle d'escrime</div>
                    <div class="intro-heading">Melun Val de seine</div>
                </div>
            </div>
        </div>
    </header>
<?php }


function TplDashboardConfiguration($page) { 
  $traduction = unserialize(TRADUCTION);
  ?>

    <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
      <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
          <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
            <div class="d-table m-auto">
              <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?php echo URL_HOME ?>img/shards-dashboards-logo.svg" alt="Shards Dashboard">
              <span class="d-none d-md-inline ml-1">
                Dashboard configuration
              </span>
            </div>
          </a>
          <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
            <i class="material-icons">&#xE5C4;</i>
          </a>
        </nav>
      </div>
      <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
        <div class="input-group input-group-seamless ml-3">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-search"></i>
            </div>
          </div>
          <input class="navbar-search form-control" type="text" placeholder="<?php echo $traduction["dashboard"]["recherche"] ?>" aria-label="Search"> </div>
      </form>
        <div class="nav-wrapper">
          <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?php if($page == "utilisateur") echo 'active' ?>" href="<?php echo URL_HOME ?>dashboard/configuration/utilisateur/index.php">
                  <i class="material-icons">edit</i>
                  <span>Utilisateurs</span>
                </a>
              </li>                  
              <li class="nav-item">
                <a class="nav-link <?php if($page == "magasin") echo 'active' ?>" href="<?php echo URL_HOME ?>dashboard/configuration/magasin/index.php">
                  <i class="material-icons">edit</i>
                  <span>Magasins</span>
                </a>
              </li>                 
              <li class="nav-item">
                <a class="nav-link <?php if($page == "ged") echo 'active' ?>" href="<?php echo URL_HOME ?>dashboard/configuration/ged/index.php">
                  <i class="material-icons">edit</i>
                  <span>GED</span>
                </a>
              </li>          
          </ul>
        </div>
    </aside>

<?php }

function TplDashboardSideBar($id_magasin = 0) { 
    $page = GetPage(); 
    $traduction = unserialize(TRADUCTION);
    ?>

    <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
      <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
          <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
            <div class="d-table m-auto">
              <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?php echo URL_HOME ?>img/shards-dashboards-logo.svg" alt="Shards Dashboard">
              <span class="d-none d-md-inline ml-1">
                <?php echo ($id_magasin > 0) ? "Dashboard magasin" : 'Dashboard entreprise' ?>
              </span>
            </div>
          </a>
          <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
            <i class="material-icons">&#xE5C4;</i>
          </a>
        </nav>
      </div>
      <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
        <div class="input-group input-group-seamless ml-3">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-search"></i>
            </div>
          </div>
          <input class="navbar-search form-control" type="text" placeholder="<?php echo $traduction["dashboard"]["recherche"] ?>" aria-label="Search"> </div>
      </form>
        <div class="nav-wrapper">
          <ul class="nav flex-column">
            <?php 
              if($id_magasin > 0) { ?>
                <li class="nav-item">
                  <a class="nav-link <?php if($page == "index.php") echo 'active' ?>" href="<?php echo URL_HOME ?>dashboard/index.php?magasin=<?php echo $id_magasin ?>">
                    <i class="material-icons">edit</i>
                    <span>Synthèse</span>
                  </a>
                </li>          
                <li class="nav-item">
                  <a class="nav-link <?php if($page == "pubs-olfactives.php") echo 'active' ?>" href="<?php echo URL_HOME ?>dashboard/pubs-olfactives.php?magasin=<?php echo $id_magasin ?>">
                    <i class="material-icons">vertical_split</i>
                    <span>Pubs olfactives</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if($page == "pubs-sonores.php") echo 'active' ?>" href="<?php echo URL_HOME ?>dashboard/pubs-sonores.php?magasin=<?php echo $id_magasin ?>">
                    <i class="material-icons">vertical_split</i>
                    <span>Pubs sonores</span>
                  </a>
                </li>          
                <li class="nav-item">
                  <a class="nav-link <?php if($page == "pubs-visuels.php") echo 'active' ?>" href="<?php echo URL_HOME ?>dashboard/pubs-visuels.php?magasin=<?php echo $id_magasin ?>">
                    <i class="material-icons">vertical_split</i>
                    <span>Pubs visuels</span>
                  </a>
                </li>          
                <li class="nav-item">
                  <a class="nav-link <?php if($page == "ged.php") echo 'active' ?>" href="<?php echo URL_HOME ?>dashboard/ged.php?magasin=<?php echo $id_magasin ?>">
                    <i class="material-icons">vertical_split</i>
                    <span>GED</span>
                  </a>
                </li>
            <?php 
              } else {
                $liste_magasin = magasin_utilisateur::ListeMagasinUtilisateur($_SESSION["utilisateur"]["id_utilisateur"]);
                foreach ($liste_magasin as $key => $ligne) { 
                  ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_HOME ?>dashboard/index.php?magasin=<?php echo $ligne["id"]?>">
                      <i class="material-icons">edit</i>
                      <span><?php echo $ligne["intitule"]?></span>
                    </a>
                  </li>   
                <?php 
                }
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo URL_HOME ?>dashboard/entreprise.php?action=1">
                    <i class="material-icons text-success">add_box</i>
                    <span>Ajouter un magasin</span>
                  </a>
                </li>   
              <?php 
              } 
            ?>
          </ul>
        </div>
    </aside>

<?php }


function TplDashboardNavbar($id_magasin = 0) { 
  $traduction = unserialize(TRADUCTION);
  ?>

  <div class="main-navbar sticky-top bg-white">
    <!-- Main Navbar -->
    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
      <form action="recherche.php?magasin=<?php echo $id_magasin ?>" method="POST" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
        <div class="input-group input-group-seamless ml-3">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-search"></i>
            </div>
          </div>
          <input class="navbar-search form-control" name="recherche" type="text" placeholder="<?php echo $traduction["dashboard"]["recherche"] ?>" aria-label="Search"> </div>
      </form>
      <ul class="navbar-nav border-left flex-row ">
        <li class="nav-item">
              <ul class="langues">
                  <li class="<?php if(LANGUE_HOME == 'FR'){ echo 'actif';} ?>""><a href="<?php echo URL_HOME ?>dashboard/index.php?magasin=<?php echo $id_magasin ?>&lang=FR">FR</a></li>
                  <li class="<?php if(LANGUE_HOME == 'EN'){ echo 'actif';} ?>""><a href="<?php echo URL_HOME ?>dashboard/index.php?magasin=<?php echo $id_magasin ?>&lang=EN">EN</a></li>
              </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="user-avatar rounded-circle mr-2" width="40" height="40" src="<?php echo URL_HOME ?>img/user.jpg" alt="User Avatar">
            <span class="d-none d-md-inline-block"><?php echo $_SESSION["utilisateur"]["login"] ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-small">
            <a class="dropdown-item" href="mon-compte.php?magasin=<?php echo $id_magasin ?>">
              <i class="material-icons">&#xE7FD;</i> Mon compte</a>
            <a class="dropdown-item" href="mon-historique.php?magasin=<?php echo $id_magasin ?>">
              <i class="material-icons">vertical_split</i> Historique</a>
            <a class="dropdown-item" href="mes-fichiers.php?magasin=<?php echo $id_magasin ?>">
              <i class="material-icons">note_add</i> Mes fichiers</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" href="<?php echo URL_HOME ?>dashboard/connexion.php?action=deconnexion">
              <i class="material-icons text-danger">&#xE879;</i> Déconnexion </a>
          </div>
        </li>
      </ul>
      <nav class="nav">
        <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
          <i class="material-icons">&#xE5D2;</i>
        </a>
      </nav>
    </nav>
  </div>

<?php }





function TplDashboardFooter($id_magasin) {  ?>

    <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="<?php echo URL_HOME ?>dashboard/index.php?magasin=<?php echo $id_magasin ?>">Synthèse</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://www.deepidoo.com/">A propos de nous</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://www.deepidoo.com/blog">Blog</a>
      </li>
    </ul>
    <span class="copyright ml-auto my-auto mr-2">Copyright © 2019
      <a href="index.php" rel="nofollow">GRY!</a>
    </span>
    </footer>

<?php }

function TplFooter() {  ?>

    <footer id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-1">
                    <a href="index.php"><img width="45" height="51" src="img/logo/logo-genos-seul.png"></a>
                    <address>
                        Powered by Genos.<br>
                        Licence sous <a id="url-license" href="https://opensource.org/licenses/MIT" target="blank">MIT license</a>.<br>
                    </address>
                    <a href="https://www.hitema.fr/"><img width="191" height="51" src="img/logo/hitema.png"></a>
                    <address>
                        <a id="url-vlis" href="https://www.hitema.fr/" target="blank">HITEMA</a> ©<br>
                        <a id="url-vlis" href="https://www.hitema.fr/" target="blank">Tous droits réservés</a> | <a id="url-vlis" href="https://www.hitema.fr/" target="blank">Mentions Légales</a>
                    </address>
                </div>
                <div id="newsletter" class="col-md-5">
                    <p>Suivez l'actualité de MyHome</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control col-6" placeholder="Inscrivez votre adresse mail" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button" id="button-addon2">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php }

function TplBackTop(){ ?>

    <p id="back-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </p>

<?php }


function Script($dashboard = false) { ?>

    <!-- JQUERY -->
    <script type="text/javascript" src="<?php echo URL_HOME ?>js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>

    <!-- POPPER -->
    <!-- <script type="text/javascript" src="js/popper.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP -->
    <script type="text/javascript" src="<?php echo URL_HOME ?>js/bootstrap.min.js"></script>

    <script>
        // Global
        URL_HOME          = "<?php echo URL_HOME; ?>";
    </script>

    <!-- VUE.JS -->
    <script type="text/javascript" src="<?php echo URL_HOME ?>js/vue.js"></script>
    <script type="text/javascript" src="<?php echo URL_HOME ?>js/filtre/booleanCroix.filter.js"></script>
    <script type="text/javascript" src="<?php echo URL_HOME ?>js/filtre/ko.filter.js"></script>
    <script type="text/javascript" src="<?php echo URL_HOME ?>js/composants/ged-synthese/ged-synthese.comp.js"></script>

    <!-- Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

    <!-- NOTIFY -->
    <script type="text/javascript" src="<?php echo URL_HOME ?>js/notify.js"></script>
    
    <!-- JS -->

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>

    <script type="text/javascript" src="js/generale.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="<?php echo URL_HOME ?>js/extras.1.1.0.min.js"></script>
    <script src="<?php echo URL_HOME ?>js/shards-dashboards.1.1.0.min.js"></script>

    <?php
    if($dashboard == true) { ?>
      <script src="<?php echo URL_HOME ?>js/app/app-blog-overview.1.1.0.js"></script>
      <script src="<?php echo URL_HOME ?>dashboard/dashboard.app.vue.js"></script>
    <?php }
}
<?php include("0-config/config-genos.php"); 
if(!isset($_GET["id_utilisateur"])) header("location:tireurs.php"); 
else $id_utilisateur = $_GET["id_utilisateur"];

$u = new utilisateur;
$u->id = $id_utilisateur;
$u->Load();
// var_dump(objectif::ListeObjectifsCommentairesUtilisateur($id_utilisateur));

?>

<!DOCTYPE html>
<html lang="fr">
  <?php TplHead(); ?>
  <body id="page-top">
    <?php TplHeader() ?>
    <main id="app">
      <input id="id_utilisateur" type="hidden" value="<?php echo $id_utilisateur ?>">
      <div class="container">
        <br>
        <br>
        <br>
        <br>
        <div class="row">
          <div class="col-md-12">
            <h3>Liste des leçons de l'utilisateur : <?php echo $u->nom ?></h3>
          </div>
          <div class="col-md-12">

<div class="card text-white bg-info mb-3">
  <div class="card-header"><h3 class="text-white">Liste des leçons de l'utilisateur : <?php echo $u->nom ?></h3></div>
  <div class="card-body">
    <table class="table mb-0">
      <thead class="bg-light">
        <tr>
          <th scope="col" class="border-0">#</th>
          <th scope="col" class="border-0">Nom</th>
          <th scope="col" class="border-0">Details</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="lecon in listeLeconUtilisateurFiltre">
          <td>{{ ($index + 1) }}</td>
          <td>{{lecon.nom}}</td>  
          <td>{{lecon.details}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
            
          </div>
          <div class="col-md-12">
            <h3>Liste des objectifs de l'utilisateur : <?php echo $u->nom ?></h3>
          </div>
          <div class="col-md-12">
            <table class="table mb-0">
              <thead class="bg-light">
                <tr>
                  <th scope="col" class="border-0">#</th>
                  <th scope="col" class="border-0">Nom</th>
                  <th scope="col" class="border-0">Details</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="objectif in listeObjectifsUtilisateurFiltre">
                  <td>{{ ($index + 1) }}</td>
                  <td>{{objectif.nom}}</td>  
                  <td>{{objectif.details}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
        </div>
      </div>
    </main>
    
    <?php TplBackTop() ?>
    <?php //TplFooter() ?>
    <?php Script() ?>
    <script src="index.app.vue.js"></script>
  </body>
</html>
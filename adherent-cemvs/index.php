<?php include("../0-config/config-genos.php");

if(isset($_GET["code"])) $code = $_GET["code"];

?>

<!DOCTYPE html>
<html lang="fr">
  <?php TplHead(); ?>
  <body id="page-top">
    <main id="app">
      <?php 
        participantcompetition::TplModalListeParticipant(); 
      ?>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 text-center" style="margin-top: 2em;">
              <h1>Escrime Melun</h1><br/>
              <h3>Espace adhérent CEMVS</h3>
          </div>
          <div class="col-12 text-center">
            <img src="<?php echo URL_HOME ?>img/logo/logo-mvds.jpeg" alt="Logo_page" width="30%" title="Accueil" id="logo"/>  
          </div>
        </div>
      </div>
    
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div v-if="check_code == 0" class="col-md-4">
            <div id="header-side-login" style="border :2px solid grey; margin-top: 3em;" >
                <div id="header-side-panel">
              <form>
                <div class="form-group" >
                  <label for="code">Code : </label>
                  <input type="text" id="code" class="form-control" name="code" v-model="code" placeholder="Saisir le code">
                </div>
                <div @click="CheckCode()" class="btn btn-default" style="margin-bottom: 2em;">Accéder</div>
              </form>
              </div>
            </div>
          </div>
          <div v-else class="col-md-6">
            <h3 class="well">{{entrainement.nom}}</h3>
            <p>{{entrainement.details}}</p>
            <table class="table mb-0">
              <thead class="bg-light">
                <tr>
                  <th scope="col" class="border-0">#</th>
                  <th scope="col" class="border-0">Nom</th>
                  <th scope="col" class="border-0">Prenom</th>
                  <th scope="col" class="border-0">Présence</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="utilisateur in listeUtilisateurFiltre">
                  <td>{{ ($index + 1) }}</td>
                  <td>{{ utilisateur.nom }}</td>
                  <td>{{ utilisateur.prenom }}</td>
                  <td><input @click="CheckPresence(utilisateur.id)" type="checkbox" :checked="utilisateur.presence == 1"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
    <?php Script() ?>
    <script src="index.app.vue.js"></script>
  </body>
</html>
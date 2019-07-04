<?php include("0-config/config-genos.php"); 
// var_dump($_SESSION);
?>


<!DOCTYPE html>
<html lang="fr">
  <?php TplHead(); ?>
  <body id="page-top">
    <?php TplHeader() ?>
    <main id="app">
      <div class="row">
              <div class="col-row-4">
                <div class="card card-small mb-4">
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="competition in listeCompetitionFiltre">
                          <td>{{competion.date}} {{competition.nom}} {{competition.commentaire}}</td>  
                        </tr>
                      </tbody>
                    </table>
                  </div>
         </div>
          </div>
        </div>
        </main>
    
    <?php TplBackTop() ?>
    <?php TplFooter() ?>
    <?php Script() ?>
    <script src="index.app.vue.js"></script>
  </body>
</html>
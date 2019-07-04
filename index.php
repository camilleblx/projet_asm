<?php include("0-config/config-genos.php"); 
// var_dump($_SESSION);
?>


<!DOCTYPE html>
<html lang="fr">
	<?php TplHead(); ?>
	<body id="page-top">
		<?php TplHeader() ?>
		<section>
			<div class="row">
              <div class="col-12">
                <div class="card card-small mb-4">
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">Actualité</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="news in listeNewsFiltre">
                          <td>{{new.objet}} - {{new.texte}} - {{new.img}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
         </div>
          </div>
        </div>
		</section>
		
		<?php TplBackTop() ?>
		<?php TplFooter() ?>
		<?php Script() ?>
	</body>
</html>
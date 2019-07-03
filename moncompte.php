<?php include("0-config/config-genos.php");
?>


<!DOCTYPE html>
<html lang="fr">
	<?php TplHead(); ?>
	<body id="page-top">
		<?php TplHeader(); ?>
	<div>
			<div class="text-center">
				<img src="img/user.jpg" alt="imgprofil" width="320px" />
			
			
				<h1><?php if(!empty($_SESSION['utilisateur'])) echo ($_SESSION["utilisateur"]["nom"]) ?> <?php echo ($_SESSION["utilisateur"]["prenom"]) ?></h1>
				<h3><?php if(!empty($_SESSION['utilisateur'])) echo ($_SESSION["utilisateur"]['typeutilisateur']) ?></h3>
			</div>
	</div>
		<div>
			<nav class="nav nav-tabs">
  				<a class="nav-item nav-link active" href="#p1" data-toggle="tab">Mes Objectifs </a>
  				<a class="nav-item nav-link" href="#p2" data-toggle="tab">Objectifs Maître d'arme</a>
   				<a class="nav-item nav-link" href="#p3" data-toggle="tab">Performance</a>
			</nav>
			<div class="tab-content">
  				<div class="tab-pane active" id="p1">Mes objectifs
  					<ul id="example-1">
  						<li v-for="item in objectifs">
    						{{ item.objectifs }}
  						</li>
					</ul>
				</div>
  				<div class="tab-pane" id="p2">Objectifs fixé par le Maître d'arme</div>
  				<div class="tab-pane" id="p3">Performance</div>
			</div>
		</div>


		<?php TplBackTop(); ?>
		<?php TplFooter(); ?>
		<?php Script(); ?>
	</body>
</html>


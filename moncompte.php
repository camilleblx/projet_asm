<?php include("0-config/config-genos.php");
?>


<!DOCTYPE html>
<html lang="fr">
	<?php TplHead(); ?>
	<body id="page-top">
		<?php TplHeader(); ?>
	<div id="profil">
			<div id="imgprofil">
				<img src="img/user.jpg" alt="imgprofil"/>
			</div>
			<div id="nmprofil">
				<h1><?php if(!empty($_SESSION['utilisateur'])) echo ($_SESSION["utilisateur"]["nom"]) ?> <?php echo ($_SESSION["utilisateur"]["prenom"]) ?></h1>
				<h3><?php if(!empty($_SESSION['utilisateur'])) echo ($_SESSION["utilisateur"]['typeutilisateur']) ?></h3>
			</div>
	</div>
			<div>
			<ul class="nav nav-tabs">
  				<li class="active"><a data-toggle="tab" href="#msobj">Mes objectifs</a></li>
  				<li><a data-toggle="tab" href="#objma">Objectifs Maître d'arme</a></li>
  				<li><a data-toggle="tab" href="#perfo">Performance</a></li>
			</ul>

			<div class="tab-content">
  				<div id="msobj" class="tab-pane fade in active">
    				<h3>Mes objectifs</h3>
    				<p><?php ?></p>
  				</div>
  			<div id="objma" class="tab-pane fade">
    			<h3>Objctifs par le maître d'arme</h3>
    			<p>Some content in menu 1.</p>
  			</div>
  			<div id="perfo" class="tab-pane fade">
    			<h3>Mes performances</h3>
    			<p>Some content in menu 2.</p>
  			</div>
			</div>
			</div>



		<?php TplBackTop(); ?>
		<?php TplFooter(); ?>
		<?php Script(); ?>
	</body>
</html>


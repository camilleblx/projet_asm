<?php include("0-config/config-genos.php"); 
?>


<!DOCTYPE html>
<html lang="fr">
	<?php TplHead(); ?>
	<body id="page-top">
		<?php TplHeader() ?>

		<section id="logements">
		<div class="container-fluid">
		    <div class="row">
				<section class="col-12">
					<div class="row">
				        <div id="header-side-login" class="col-md-4">
				          <div id="header-side-panel">
				          	<div class="row">
								<form action="connexion.php?action=connexion" class="col-md-12" method="post">
									<img class="mb-4" src="<?php echo URL_HOME.'img/logo/hitema_blanc.png' ?>" alt="" width="206" height="55">
									<div class="form-group">
										<label for="login">LOGIN : </label>
										<input type="text" id="login" class="form-control" name="login" placeholder="Votre login">
									</div>
									<div class="form-group">
										<label for="pwd">MOT DE PASSE : </label>
										<input type="password" id="mdp" class="form-control" name="mdp" placeholder="Votre mot de passe">
									</div>
									<button  type="submit" class="btn-flat-primary">CONNEXION</button>
									<!-- <a href="demande.php">Faire une demande de connexion</a> -->
								</form>
							</div>
				          </div>
				        </div>
				        <div class="col-md-8 d-xs-none d-sm-none d-md-block">
							<div id="carousel-login" class="carousel slide" data-ride="carousel">
							  <div class="carousel-inner">
							    <div class="carousel-item active">
							      <img class="d-block w-100" src="<?php echo URL_HOME; ?>img/connexion/1bis.jpg" alt="First slide">
							    </div>
							    <div class="carousel-item">
							      <img class="d-block w-100" src="<?php echo URL_HOME; ?>img/connexion/2bis.jpg" alt="Second slide">
							    </div>
							    <div class="carousel-item">
							      <img class="d-block w-100" src="<?php echo URL_HOME; ?>img/connexion/3bis.jpg" alt="Third slide">
							    </div>
							  </div>
							</div>
				        </div>
			        </div>
				</section>
	    	</div>
		</div>
		</section>
		
		<?php TplBackTop() ?>
		<?php TplFooter() ?>
		<?php Script() ?>
	</body>
</html>
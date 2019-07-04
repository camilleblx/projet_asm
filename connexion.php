<?php include("0-config/config-genos.php"); ?>


<!DOCTYPE html>
<html lang="fr">
	<?php TplHead(); ?>
	<div id="h-connexion">
	<body id="page-top">
		<div id="bloc_page">
			<div class="container">
				<div class="row">
					<div class="col-2">
						<img src="img/logo/logo-mvds.jpeg" style="float: left;"alt="Logo_page" width="100%" title="Accueil" id="logo"/>
					</div>					<div class="col-md-8" style="margin-top: 2em;" id="text-color">
						<center style="text-align: center;">
							<h1 style="color: #FFFFFF;">Escrime Melun</h1> <br />
							<h3 style="color: #FFFFFF;">Bienvenue</h3>
						</center>
					</div>
				</div>
			</div>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4"></div>  
				<div id="header-side-login" class="card col-md-4"  style="color: #FFFFFF" >
			        <div id="header-side-panel">
						<form action="connexion.php?action=connexion" method="post">

							<div class="form-group" >
								<label for="login">LOGIN : </label>
								<input type="text" id="login" class="form-control" name="login" placeholder="Votre login">
							</div>
							<div class="form-group">
								<label for="pwd">MOT DE PASSE : </label>
								<input type="password" id="mdp" class="form-control" name="mdp" placeholder="Votre mot de passe">
							</div>
							<button  type="submit" class="btn-flat-primary" style="margin-bottom: 2em;">CONNEXION</button>
						</form>
				    </div></div>
				</div>
					
				
				<div class="col-md-4"></div>
			</div>
		</div>
	</div>
		<?php TplBackTop() ?>
		<?php TplFooter() ?>
		<?php Script() ?>
	</body>
</html>
<?php 
class ged_categorie extends config_genos {
	public $id;
	public $intitule;

	public function __construct (){
		parent::__construct();
		$this->id 					= 0;
		$this->intitule 			= "";
	}

	// Formulaire pour ajouter une categorie
	public static function FormAjout(){ ?>
		<h5>Ajouter une categorie <span class="badge badge-info text-right">Ajout</span></h5>
		<br>
		<form action="index.php?action=1" method="POST">
			<label>Intitulé</label>
			<input type="text" name="intitule" class="form-control form-control-sm">
			
			<br>
			<button type="button" class="btn btn-light btn-retour">Retour</button>
			<button type="reset"  class="btn btn-secondary btn-retour">Annuler</button>
			<button type="submit" class="btn btn-success btn-retour">Enregistrer</button>
		</form> <!-- Fin du Form -->
	<?php 
	}	

	// Formulaire pour modifier une categorie
	public static function FormModif(){
		$gc = new ged_categorie();
		$gc->id = intval($_GET['id']);
		$gc->Load(); 
		?>
		<h5>Modifier une categorie</h5>
		<br>
		<form action="index.php?action=2&id=<?php echo $gc->id ?>" method="POST">
			<label>Intitulé</label>
			<input type="text" name="intitule" class="form-control form-control-sm" value="<?php echo $gc->intitule ?>">
			<br>

			<button type="button" class="btn btn-light btn-retour">Retour</button>
			<button type="reset"  class="btn btn-secondary btn-retour">Annuler</button>
			<button type="submit" class="btn btn-success btn-retour">Enregistrer</button>
		</form> <!-- Fin du Form -->
	<?php 
	}
}
?>
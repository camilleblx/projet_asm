<?php 
// Permet de gérer le multilangue du site
// Utilisation des cookies du navigateur web
class langue {
	use Genos;
	public $langue_navigateur; # la langue du navigateur
	public $code_langue;	   # Le code langue pour la traduction
	public $liste_code_langue; # Liste des traductions disponibles
	public $traduction;		   # La traduction du site

	public function __construct (){
		$this->langue_navigateur = strtoupper(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
		$this->code_langue = "FR"; # Langue par défaut
		$this->liste_code_langue = array("FR","EN");
		$this->traduction = [];
		$this->SetCookie();
		$this->SetLangue();
  		define("LANGUE_HOME",$this->code_langue);
  		define("TRADUCTION",serialize($this->traduction));
	}

	public function SetCookie(){
		# Si changement de langue
		if(isset($_GET['lang'])) {
			setcookie('langue', $_GET['lang'], time() + 365*24*3600, "/", $_SERVER["HTTP_HOST"]);
			header("location:".URL_HOME."dashboard/entreprise.php"); // obligatoire pour acceder à la variable $_COOKIE
		}
		# Création du cookie si il n'éxiste pas
		if(!isset($_COOKIE['langue'])){
	  		# Si la langue est présente dans la liste de traduction disponible
	  		# Sinon le cookie langue = EN
			if(in_array($this->langue_navigateur, $this->liste_code_langue)) setcookie('langue', $this->langue_navigateur, time() + 365*24*3600, "/", $_SERVER["HTTP_HOST"]);
			else setcookie('langue', $this->code_langue, time() + 365*24*3600, "/", $_SERVER["HTTP_HOST"]);
			header("location:".URL_HOME."dashboard/entreprise.php"); // obligatoire pour acceder à la variable $_COOKIE
		}
	}

	# Charge la traduction correspondante à la langue sélectionnée du COOKIE
	public function SetLangue(){
		$this->code_langue = strtoupper($_COOKIE['langue']);
		# Traduction
		switch ($this->code_langue) {
			case 'FR':
				$this->SetTraductionFR();
				break;			
			
			default: // EN
				$this->SetTraductionEN();
				break;
		}
	}

	# Vérifie si le cookie existe
	# Si il existe on charge le code_langue des traductions disponible
	# Sinon c'est la langue par defaut du constructeur qui prends le dessus
	// public function CheckCodeLangue(){
	// 	if(isset($_COOKIE['langue']) && in_array(strtoupper($_COOKIE['langue']), $this->liste_code_langue)) $this->code_langue = strtoupper($_COOKIE['langue']);
	// }

	// Traduction anglais
	public function SetTraductionEN(){
		$this->traduction = array(
		    "dashboard" => array(
		    	"recherche" => "Search in the store",
		    ),	   
		);
	}	

	// Traduction français
	public function SetTraductionFR(){
		$this->traduction = array(
		    "dashboard" => array(
		    	"recherche" => "Rechercher dans le magasin",
		    ),	     
		);
	}	
}

<?php 
class config_genos {
	use Genos {
		Add 	as AddGenos;
		Update 	as UpdateGenos;
		Delete 	as Erase;
	}
	
	public $actif;
	public $suppr;
	public $date_crea;
	public $date_modif;
	public $auteur_crea;
	public $auteur_modif;

	public function __construct (){
		$this->actif 				= 1;
		$this->suppr 				= 0;
		$this->date_crea 			= date('Y-m-d H:i:s');
		$this->date_modif 			= "0000-00-00 00:00:00";
		$this->auteur_crea 			= "";
		$this->auteur_modif			= "";
	}

	public function Add(){
		$this->date_crea 			= date('Y-m-d H:i:s');
		$this->auteur_crea 			= $_SESSION["utilisateur"]["id_utilisateur"]."|".$_SESSION["utilisateur"]["login"];
		return $this->AddGenos();
	}

	public function Update(){
		$this->date_modif 			= date('Y-m-d H:i:s');
		$this->auteur_modif			= $_SESSION["utilisateur"]["id_utilisateur"]."|".$_SESSION["utilisateur"]["login"];
		return $this->UpdateGenos();
	}

	public function Delete(){
		$this->suppr = 1;
		return $this->Update();
	}

	public static function GetAuteur($nom){
		$tab = explode("|", $nom);
		return $tab[1];
	}

	public static function Cesure(){
		$arg_list = func_get_args();
		$num_arg  = func_num_args();
		$long     = ($num_arg > 1)? $arg_list[1] : 200 ;
		$chaine   = $arg_list[0];
		$chaine   = strip_tags($chaine);
		if($long >= strlen($chaine)) return $chaine;
		$chaine   = wordwrap($chaine, $long,"<br>");
		$pos      = strpos($chaine, "<br>");
		$chaine   = substr($chaine,0,$pos);
		if($pos   !== false) $chaine .= "...";
        return $chaine;
    }	

    public static function CesureBr(){
		$arg_list = func_get_args();
		$num_arg  = func_num_args();
		$long     = ($num_arg > 1)? $arg_list[1] : 200 ;
		$chaine   = $arg_list[0];
		$chaine   = strip_tags($chaine);
		if($long >= strlen($chaine)) return $chaine;
		$chaine   = wordwrap($chaine, $long,"<br>");
		$pos      = strpos($chaine, "<br>");
		$chaine   = substr($chaine,0,$pos);
		if($pos   !== false) $chaine .= "...";
        return $chaine;
    }

    public static function MonnaieSimple($data){
    	// var_dump($data);
    	$pattern = '/-?(\d{1,3}(?:[\.|,]\d*)?)(?=(\d{3}(?:[\.|,]\d*)?)*$)/';
    	preg_match_all($pattern, $data, $out, PREG_PATTERN_ORDER);
    	return implode(" ", $out[0]);
    }

    public static function CheckPage($page){
    	$current_page = $_SERVER['REQUEST_URI'];
    	if($current_page == $page) return true;
    	else return false;
    }
}

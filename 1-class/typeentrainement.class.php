<?php
class typeentrainement extends config_genos {
    public $id;
    public $nom;
    public $details;
 
    public function __construct (){
        parent::__construct();
		$this->id      = 0;
		$this->nom     = "";
		$this->details = "";
    } 
}
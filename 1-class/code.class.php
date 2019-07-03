<?php
class code extends config_genos {
    public $id;
    public $code;
 
    public function __construct (){
        parent::__construct();
		$this->id   = 0;
		$this->code = "";
    } 
}
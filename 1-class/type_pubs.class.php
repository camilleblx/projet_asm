<?php
class type_pubs extends config_genos {
    public $id;
    public $intitule;
 
    public function __construct (){
        parent::__construct();
        $this->id      = 0;
        $this->intitule = 0;
    } 
}
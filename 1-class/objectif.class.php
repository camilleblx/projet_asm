<?php
class objectif extends config_genos {
    public $id;
    public $nom;
    public $details;
  

    public function __construct (){
        parent::__construct();
        $this->id                      = 0;
        $this->nom                     = 0;
        $this->details                 = 0;
       
    }

    public static function Listeobjectif(){
      
      $req = "SELECT objectif FROM objectif o, utilisateur u WHERE o.id_utilisateur=u.id";
      $liste_ojectif = StructList($req);
      return $liste_objectif;
    }
}

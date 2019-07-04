<?php
class statistique extends config_genos {
    public $id;
    public $id_utilisateur;
    public $id_entrainement;


    public function construct (){
        parent::construct();
        $this->id                      = 0;
        $this->id_utilisateur          = 0;
        $this->id_entrainement         = 0;

    }

public static function StatistiquesCountPresence(){
        $p = new entrainement;
        $req = "SELECT COUNT(*) AS count
                FROM entrainement e
                INNER JOIN id_utilisateur u ON u.id = e.id_utilisateur
                WHERE id_entrainement";
        $champs = array("count");
        $liste_count = $p->StructList($req,$champs);
        return $liste_count;
    }

public static function ListePresence(){
        $p = new entrainement;
        $req = "SELECT *
                FROM entrainement e
                INNER JOIN id_utilisateur u ON u.id = e.id_utilisateur";
        $champs = array("count");
        $liste_presence = $p->StructList($req,$champs);
        return $liste_presence;
    }
  

    }
?>
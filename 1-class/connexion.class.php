<?php
class connexion extends config_genos{

    public static function VerifConnexion(){
        $page = GetPage();
        // SESSION Utilisateur
        //connexion::Redirection();
        if(!isset($_SESSION["utilisateur"])){
            // On réinitialise les variables sessions
            foreach ($_SESSION as $key => $session){ unset($_SESSION[$key]);}
            // On gère la connexion 
            if(isset($_GET["action"]) && $_GET["action"] == "connexion" 
                                      && isset($_POST["login"])
                                      && isset($_POST["mdp"])){

                // Check utilisateur connecté
                $u = new utilisateur;
                $search_utilisateur          = array();
                $search_utilisateur["login"] = $_POST["login"];
                $search_utilisateur["mdp"]   = sha1($_POST["mdp"]);
                $search_utilisateur = $u->Find($search_utilisateur);

                if(!empty($search_utilisateur)){
                    $tu = new typeutilisateur;
                    $tu->id = $search_utilisateur[0]["id_typeutilisateur"];
                    $tu->Load();

                    $_SESSION["utilisateur"]["id_utilisateur"]   = $search_utilisateur[0]["id"];
                    $_SESSION["utilisateur"]["nom"]              = $search_utilisateur[0]["nom"];
                    $_SESSION["utilisateur"]["prenom"]           = $search_utilisateur[0]["prenom"];
                    $_SESSION["utilisateur"]["dateAnniversaire"] = $search_utilisateur[0]["dateAnniversaire"];
                    $_SESSION["utilisateur"]["login"]            = $search_utilisateur[0]["login"];
                    $_SESSION["utilisateur"]["img"]              = $search_utilisateur[0]["img"];
                    $_SESSION["utilisateur"]["typeutilisateur"]  = strtolower($tu->nom);
                    header("location:".URL_HOME."index.php");
                }
            } 
        }
    }

    public static function CheckCode($code){
        $c = new code;
        $search_code          = array();
        $search_code["code"] = $code;
        $search_code = $c->Find($search_code);   
        if(!empty($search_code)) return 1;
        else return 0;              
    }    

    public static function Deconnexion(){
        foreach ($_SESSION as $key => $session) {
            unset($_SESSION[$key]);
        }
        header("location:".URL_HOME."connexion.php");                   
    }

    public static function Redirection(){
        $page = GetPage();
        if(!isset($_SESSION["utilisateur"])){
            if($page != "connexion.php") header("location:".URL_HOME."connexion.php");
        }else{
            if($page == "connexion.php") header("location:".URL_HOME."index.php");
        }
    }

    public static function AutoPassword(){
        // Initialisation des caractères utilisables
        $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $password="";
        for($i=0;$i<$size;$i++)
        {
            $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
        }
        return $password;
    }

}
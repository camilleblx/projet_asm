<?php
class connexion extends config_genos{

    public static function VerifConnexion(){
        $page = GetPage();
        // SESSION Utilisateur
        connexion::Redirection();
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
                $search_utilisateur["mdp"]   = md5($_POST["mdp"]);
                $search_utilisateur["suppr"] = 0;
                $search_utilisateur = $u->Find($search_utilisateur);

                if(!empty($search_utilisateur)){
                    $tu = new type_utilisateur;
                    $tu->id = $search_utilisateur[0]["id_type"];
                    $tu->Load();

                    $_SESSION["utilisateur"]["id_utilisateur"] = $search_utilisateur[0]["id"];
                    $_SESSION["utilisateur"]["login"]          = $search_utilisateur[0]["login"];
                    $_SESSION["utilisateur"]["id_type"]        = $search_utilisateur[0]["id_type"];
                    $_SESSION["utilisateur"]["type"]           = $tu->intitule;
                    $_SESSION["utilisateur"]["nom"]            = $search_utilisateur[0]["nom"];
                    $_SESSION["utilisateur"]["prenom"]         = $search_utilisateur[0]["prenom"];
                    $_SESSION["utilisateur"]["email"]          = $search_utilisateur[0]["email"];
                    $_SESSION["utilisateur"]["admin"]          = $search_utilisateur[0]["admin"];
                    header("location:".URL_HOME."index.php");
                }
            } 
        }
    }

    public static function Deconnexion(){
        foreach ($_SESSION as $key => $session) {
            unset($_SESSION[$key]);
        }
        header("location:".URL_HOME."dashboard/connexion.php");                   
    }

    public static function Redirection(){
        $page = GetPage();
        if(!isset($_SESSION["utilisateur"])){
            if($page != "connexion.php") header("location:".URL_HOME."dashboard/connexion.php");
        }else{
            if($page == "connexion.php") header("location:".URL_HOME."dashboard/index.php");
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
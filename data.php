<?php include("0-config/config-genos.php"); 

$id_utilisateur = (isset($_POST['id_utilisateur']) && !empty($_POST['id_utilisateur'])) ? $_POST['id_utilisateur'] : 0;

if(isset($_GET["cas"])){
    $cas = $_GET["cas"];
    switch ($cas) {
        case 'liste-news' : 
            echo json_encode(news::ListeNews());
            break ;

        case 'liste-commentaires':
            echo json_encode(commentaires::ListeCommentaires());
            break;

        case 'liste-objectif':
            echo json_encode(objectif::ListeObjectif());
            break;

        case 'liste-objectifs-commentaires':
            echo json_encode(objectif::ListeObjectifsCommentaires());
            break;

        case 'liste-tireurs' : 
            echo json_encode(utilisateur::ListeTireurs());
            break ;

        case 'liste-competition' : 
            echo json_encode(competition::ListeCompetition());
            break ;

        case 'liste-presence' : 
            echo json_encode(statistique::ListePresence());
            break ;
            
        case 'liste-count' : 
            echo json_encode(statistique::StatistiqueCountPresence());
            break ;
    }
}

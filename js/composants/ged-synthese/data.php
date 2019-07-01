<?php include("../../../0-config/config-genos.php");
if(isset($_GET["cas"])) $cas = $_GET["cas"];

$id_magasin     = (isset($_POST['id_magasin']) 	&& !empty($_POST['id_magasin'])) ? $_POST['id_magasin'] : 0;
$id_utilisateur = (isset($_POST['id_utilisateur']) 	&& !empty($_POST['id_utilisateur'])) ? $_POST['id_utilisateur'] : 0;
$id_categorie = (isset($_POST['id_categorie']) 	&& !empty($_POST['id_categorie'])) ? $_POST['id_categorie'] : 0;

switch ($cas) {
	case 'liste-ged':
		$g = new ged;

		// DEBUT Requete SELECT
		$req = " SELECT  g.id,
						 g.id_categorie,
						 g.id_magasin 	   	AS id_magasin,
						 g.id_utilisateur 	AS id_utilisateur,
						 g.intitule,
						 g.commentaire,
						 g.filename,
						 g.extension,
						 g.poids,
						 g.path,
						 gc.intitule AS intitule_categorie";
		// FIN Requete SELECT

		// DEBUT Requete FROM
		$req .= " FROM Ged g

				  LEFT JOIN Ged_Categorie gc ON g.id_categorie = gc.id";
		// FIN Requete FROM

		// DEBUT Requete WHERE
		$req .= " WHERE g.suppr = 0";
		if($id_magasin     > 0) 	$req     .= " AND g.id_magasin     = :id_magasin";
		if($id_utilisateur > 0) 	$req     .= " AND g.id_utilisateur = :id_utilisateur";
		if($id_categorie > 0) 	    $req     .= " AND g.id_categorie   = :id_categorie";
		// FIN Requete WHERE

		// DEBUT Options
		$champs = array("id",
						"id_categorie",
						"id_magasin",
						"id_utilisateur",
						"intitule",
						"commentaire",
						"filename",
						"extension",
						"poids",
						"path",
						"intitule_categorie");

		$bind = array();
		if(!empty($id_magasin))     $bind['id_magasin']     = $id_magasin;
		if(!empty($id_utilisateur)) $bind['id_utilisateur'] = $id_utilisateur;
		if(!empty($id_categorie))   $bind['id_categorie'] = $id_categorie;

		$liste_ged = $g->StructList($req,$champs,$bind);
		echo json_encode($liste_ged);
		break;	

	// case 'liste-module':
	// 	$m 		= new module;
	// 	$rech 	= array("opt_ged"=>1,"suppr"=>0);
	// 	$res 	= json_encode($m->Find($rech));
	// 	echo $res;
	// 	break;	

	case 'liste-categorie':
		$gc 	= new ged_categorie;
		$rech 	= array("suppr"=>0);
		$res 	= json_encode($gc->Find($rech));
		echo $res;
		break;	

	// case 'liste-projet':
	// 	$gc 	= new projet;
	// 	$rech 	= array("suppr"=>0);
	// 	$res 	= json_encode($gc->Find($rech));
	// 	echo $res;
	// 	break;


}
<?php if(!session_id()) session_start();
	
	$prod = ($_SERVER["HTTP_HOST"] == "localhost") ? 0 : 1;	
	if($prod == 0) $URL_HOME 	= "http://localhost/projet-technique-m1-web/";
	if($prod == 1) $URL_HOME 	= "";
	

	// Genos use auto increment field and attribute id as primary key
	// If you want to use another field/attribute as primary key set following variable
	// If it's false you'll have to add attribute primary_key in your class
	$ID_PRIMARY_DEFAULT = true;

	// Table name format
	// Windows is case unsensitive, but database on prod should be case sensitive
	// You have to choose between : lowercase, uppercase, capitalize, custom
	// If you choose personalised you'll have to add attribute table_name in your class

	$TABLE_CASE = "lowercase";

	// Database
	if($prod == 0){
		$DATABASE_NAME ='bddmelun';
		$DATABASE_HOST ='localhost';
		$DATABASE_PORT ='';
		$DATABASE_USER ='root';
		$DATABASE_PSWD ='';		
	}
	// if(PROD == 1){
	// 	$DATABASE_NAME ='yyb47511';
	// 	$DATABASE_HOST ='cl1-sql20';
	// 	$DATABASE_PORT ='';
	// 	$DATABASE_USER ='yyb47511';
	// 	$DATABASE_PSWD ='hitema123';
	// }

	//  Define
	define("PROD",$prod);
	define("URL_HOME",$URL_HOME);
	define("ID_PRIMARY_DEFAULT",$ID_PRIMARY_DEFAULT);
	define("TABLE_CASE",$TABLE_CASE);
	define("DATABASE_NAME",$DATABASE_NAME);
	define("DATABASE_HOST",$DATABASE_HOST);
	define("DATABASE_PORT",$DATABASE_PORT);
	define("DATABASE_USER",$DATABASE_USER);
	define("DATABASE_PSWD",$DATABASE_PSWD);
	
	define("DIR",__DIR__."/../");

	// Genos
	include(__DIR__."/genos.php");
	include(__DIR__."/function.php");
	include(__DIR__."/genos.class.php");
	include(__DIR__."/langue.class.php");
	include(__DIR__."/structure_html.php");

	// Class
	include(__DIR__."/../1-class/groupe.class.php");
	include(__DIR__."/../1-class/connexion.class.php");
	include(__DIR__."/../1-class/entrainement.class.php");
	include(__DIR__."/../1-class/typearbitre.class.php");
	include(__DIR__."/../1-class/typeentrainement.class.php");
	include(__DIR__."/../1-class/typeutilisateur.class.php");
	include(__DIR__."/../1-class/utilisateur.class.php");
	include(__DIR__."/../1-class/competition.class.php");
	include(__DIR__."/../1-class/code.class.php");
	include(__DIR__."/../1-class/participantcompetition.class.php");
	// include(__DIR__."/../1-class/ged.class.php");
	// include(__DIR__."/../1-class/ged_categorie.class.php");

	// Paramètre
	connexion::VerifConnexion();

	$langue = new langue;
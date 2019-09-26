<?php

//______________ Back office ______________//

	$db= new PDO('mysql:host=localhost;dbname=site_de_rencontre','root','');
	$db->exec("SET NAMES UTF8");


//_______________________  AUTOLOAD _____________________________//
	
	// auto load charge la class qui porte le nom de l'objet crée
	
	function chargerClasse($classe){
		
    	require 'php/class/'.$classe.'.class.php'; //on include la classe correspondante au paramétre passé // requiere est l'équivalence d'une include
	}

	spl_autoload_register('chargerClasse'); // autoload ennregistre le nom de la class a la création de l'objet 

?>

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/commun.css"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="icon" href="img/favicon.png">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

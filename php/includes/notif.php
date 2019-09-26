<?php 

	include"../config.php";
	
	$idenv=htmlentities($_SESSION['id']);
		
	$reqNbNotif=$db->query(" SELECT * FROM conversations WHERE lu='nonLu' AND idenv!='$idenv' ");
	$nbActif=$reqNbNotif->fetchAll();
	$nb=$reqNbNotif->rowcount();
	
	
	// On déclare en $_SESSION['idEnvNotif'] le nombre de notif recu par cet utilisateur.
	$_SESSION['idEnvNotif']=$nb;

	echo"Nombre de notifications : ".$nb."<hr>";
	

?>
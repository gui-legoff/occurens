<?php 

// Like du membre sélectionner

if(isset($_POST['button'])){
	
	$idPersoLiker = htmlentities($_POST['idPersoLiker']);
	$idPersoQuiLike = htmlentities($_POST['idPersoQuiLike']);

	$req=$db->exec("INSERT INTO ami(idPersoLiker,idPersoQuiLike) VALUES ('$idPersoLiker','$idPersoQuiLike')");
}

?>
<?php 

	$message="";
	$nom="";
	$objet="";
	$mail="";
	$text="";
	$tarif="";
	$errormail="";
	$validate="";


if(isset($_POST['submit'])){
	
	$nom=$_POST['nom'];
	$objet=$_POST['objet'];
	$mail=$_POST['mail'];
	$text=$_POST['text'];
	if(isset($_GET['tarif'])){
		$tarif=$_GET['tarif'];
		$message="Formule choisi : ".$tarif."\n";
	}
	
	//verification du champs mail :
		if(preg_match("#^\w+@\w{2,}\.[a-z]{2,4}$#",$mail)){
			$message.="Mail : ".$mail."\n";
		}else{
			$errormail="<p class='erreur' style='margin-bottom:10px'>Email pas valide.</p>";
		}
		/////////////
	
	if( !($nom=="") and !($objet=="") and !($text=="") and $errormail=="" ){
		
		$message.="Nom : ".$nom."\n";
		$message.="Objet : ".$objet."\n";
		$message.="Contenu : ".$text."\n";	

		$envoiemail= mail("guillzot@live.fr",$objet,$message);
		
		if($envoiemail){
			$errormail = "<p color:'green'>Votre email a bien été envoyer !</p>";
		}
		
	}else{
		$errormail="<p class='erreur'>* Tous les champs ne sont pas remplis correctement</p>";
	}
}

if(isset($_POST['env'])){
	
	$mail=$_POST['mail'];
	
	if(preg_match("#^\w+@\w{2,}\.[a-z]{2,4}$#",$mail)){
		
		$message="Recontacter ce mail: ".$mail;
		$objet="Demande de recontacte";
		$envoiemail= mail("guillzot@live.fr",$objet,$message);
		
		$errormail="<p class='validate'>Votre message a été envoyé.</p>";
		
	}else{
		$errormail="<p class='erreur'>Email pas valide.</p>";
	}
	
	
}

?>
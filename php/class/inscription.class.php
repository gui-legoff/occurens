<?php

class inscription extends connexion {
	
	function __construct($db){
	parent::__construct($db);
	}
	
	public function inscription_fonction($mail,$pass,$pseudo,$date,$sexe,$envoi){
		
		// MESSAGE D'ERREUR
		
		$msgErreur="";
		$message="";
		
		if(isset($_POST['envoi'])){
			if( empty($mail) ){
				$msgErreur.= "mail, ";   
			}if( empty($pass) ){
				$msgErreur.= "mot de passe, ";
			}if( empty($pseudo) ){
				$msgErreur.= "pseudo, "; 
			}if( empty($date) ){
				$msgErreur.= "date de naissance, ";
			}
		}
		
		if(isset($_POST['envoi'])){
			
			if( !empty($mail) and !empty($pass) and !empty($pseudo) and !empty($date)  ){

					$_SESSION['user'] = $_POST['pseudo'];
					$_SESSION['mail'] = $_POST['mail'];
					$_SESSION['pass'] = $_POST['pass'];

					$img="img/image_profil/default.png"; // ici le chemin d'accès de l'image de profil par default
					
					$requeteinscription=$this->_db->prepare("INSERT INTO users (mail,pass,pseudo,date,sexe,niveau,img,actif) VALUES ('$mail','$pass','$pseudo','$date','$sexe','user','$img','activé')");
					
					$requeteinscription->execute();
			
			}else{
				$message="Champs : $msgErreur vides.";
			}	
		}	
		return($message);
	}
	
}

?>
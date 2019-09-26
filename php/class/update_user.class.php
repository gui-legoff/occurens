<?php 

class update_user extends connexion{
	
	function __construct($db){
	parent::__construct($db);
	}
	
	public function update_user_fontion($id,$mail,$pass,$pseudo,$date,$sexe,$interet,$ville,$bio){
		
		$requeteUpdate_user=$this->_db->prepare(" UPDATE users SET mail='$mail', pass='$pass', pseudo='$pseudo', date='$date', sexe='$sexe', interet='$interet', ville='$ville', bio='$bio' WHERE id='$id' ");
		
		$requeteUpdate_user->execute();

		$message = "Vos informations personnelles on bien été mise a jour !";

		return($message);
	}
}
    
?>
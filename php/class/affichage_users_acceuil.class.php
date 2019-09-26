<?php

class affichage_users_acceuil extends connexion{
	
	function __construct($db){
	parent::__construct($db);
	}
	
	public function affichage_users_acceuil_fonction($id){
		
		$affichage_users_acceuil_fonction=$this->_db->prepare(" SELECT * FROM users WHERE niveau='user' AND actif='activé' AND id!='$id' ");
		
		$affichage_users_acceuil_fonction->execute();
		
		return($affichage_users_acceuil_fonction);
	
	}
	
	public function affichage_users_acceuil_fonction_id($id){
		
		$affichage_users_acceuil_fonction=$this->_db->prepare(" SELECT * FROM users WHERE niveau='user' AND actif='activé' AND id='$id' ");
		
		$affichage_users_acceuil_fonction->execute();
		
		return($affichage_users_acceuil_fonction);
	
	}
	
	public function affichage_users_acceuil_fonction_visiteur(){
		
		$affichage_users_acceuil_fonction=$this->_db->prepare(" SELECT * FROM users WHERE niveau='user' AND actif='activé' ");
		
		$affichage_users_acceuil_fonction->execute();
		
		return($affichage_users_acceuil_fonction);
	
	}
	
	
	
	
	
}

/*$id="AND id!='$id'";*/

?>	

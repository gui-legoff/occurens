<?php

class affichage_users extends connexion{
	
	function __construct($db){
	parent::__construct($db);
	}
	
	public function affichage_users_fonction($constante){
		
		$req=$this->_db->prepare("SELECT * FROM users WHERE niveau='user' $constante ");
		
		$req->execute();
		
		return($req);
	
	}	
}

?>	

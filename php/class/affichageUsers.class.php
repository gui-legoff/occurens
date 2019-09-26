<?php

class affichageUsers extends connexion{
	
	function __construct($db){
	parent::__construct($db);
	}
	
	public function affichageUsers_fonction(){
		
		$requeteAffichageUsers_fonction=$this->_db->prepare("SELECT * FROM users WHERE niveau='user'");
		
		$requeteAffichageUsers_fonction->execute();
		
		return($requeteAffichageUsers_fonction);
	
	}
}

?>	

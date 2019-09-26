<?php

class renseignements_user extends connexion{
	
	function __construct($db){
	parent::__construct($db);
	}
	
	public function renseignements_user_fonction($affMail,$affPass){

		$requeteRenseignements_user=$this->_db->prepare(" SELECT * FROM users WHERE mail='$affMail' AND pass='$affPass' ");
		
		$requeteRenseignements_user->execute();
		
		return($requeteRenseignements_user);
		
	}
}


<?php

class barre_de_recherche extends connexion {
	
	function __construct($db){
	parent::__construct($db);
	}
	
	public function barre_de_recherche_fonction($recherche){
		
		$requeteBarre_de_recherche=$this->_db->prepare(" SELECT * FROM users WHERE pseudo LIKE '%$recherche%' AND niveau='user' ");
		
		$requeteBarre_de_recherche->execute();
		
		return($requeteBarre_de_recherche);
				
	}
	
	public function nb_resultat_recherche($recherche){
		
		$requeteBarre_de_recherche=$this->_db->prepare(" SELECT * FROM users WHERE pseudo LIKE '%$recherche%' AND niveau='user' ");
		
		$requeteBarre_de_recherche->execute();
		
		$nbres=$requeteBarre_de_recherche->rowCount();
		$pluriel="";
		if($nbres>1){
			$pluriel="s";
		}
		
		$res= "<p>$nbres résultat$pluriel : <br/></p>" ;
		
		return($res);
	}
	
}

?>
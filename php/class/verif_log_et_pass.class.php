<?php 

class verif_log_et_pass extends connexion {
	
	// fonction qui se déclenche automatiquement 
	function __construct($db){
	parent::__construct($db);
	}
	
	public function verif_log_et_pass_fonction($login,$password){
		
		// Test log et pass dans la BDD
		
		
		// Requète
		$requeteVerif_log_et_pass=$this->_db->prepare("SELECT * FROM users WHERE nom='$login' AND password='$password'");
		$message="";
		
		if(!empty($login) or !empty($password) ){
			
			$requeteVerif_log_et_pass->execute();
			$nb=$requeteVerif_log_et_pass->rowcount();
			$resultat=$requeteVerif_log_et_pass->fetchAll();
			
			if($nb>0){
				foreach($resultat as $r){
					$_SESSION['id'] = $r['id'];
					$_SESSION['user'] = $r['nom'];
				}
			}else{
				$message="Mauvais identifant ou mot de passe";
			}
			
		}else{$message="Champs vides";}
		
		// Message conditionnel
		return($message);
	}
}

?>
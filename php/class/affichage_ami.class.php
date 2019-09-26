<?php 

class affichage_ami extends connexion {

	function __construct($db){
	parent::__construct($db);
	}
	
	public function affichage_ami_fonction($id){
		
		$req=$this->_db->prepare(" SELECT * FROM users WHERE id IN( SELECT idPersoLiker FROM ami WHERE idPersoQuiLike='$id' ) ");
		
		$req->execute();
		
		return($req);
		
		// Faire un rowCount();
		
	}
	
	public function supprAmi_fonction($idPersoLiker,$idPersoQuiLike){
		
		$req=$this->_db->prepare(" DELETE FROM ami WHERE idPersoLiker='$idPersoLiker' AND idPersoQuiLike='$idPersoQuiLike' ");
		
		$req->execute();
		
		return($req);

	}
	
	
	/*public function affichage_ami_messagerie_fonction($idREC,$idENV){
		
		//$req_mess=$this->_db->prepare(" SELECT * FROM users where id=$idREC or id=$idENV ");
		//echo"SELECT * FROM users where id IN($idREC,$idENV) GROUP BY id";
		$req_mess=$this->_db->prepare(" SELECT * FROM users where id=$idREC or id=$idENV ");
		
		$req_mess->execute();
		
		return($req_mess);
		
	}*/
	
	public function affichage_ami_messagerie_fonction($idREC,$idENV){
		
		$req_mess=$this->_db->prepare(" SELECT * FROM users where id=$idREC or id=$idENV ");
		
		$req_mess->execute();
		
		return($req_mess);
		
	}
}

?>
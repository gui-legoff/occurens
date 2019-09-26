<?php 

class insert_conversation extends connexion {  //extends faits une include de la class connexion dans connexion.class.php
	
	// fonction qui se déclenche automatiquement 
	function __construct($db){
	parent::__construct($db);
	}
	 
	public function insert_conversation_fonction($idenv,$idrec,$message,$date,$heure){
		
		// Insert du message
		
		$requeteInsert_conversation=$this->_db->prepare("INSERT INTO conversation(idenv,idrec,message,date,heure,lu) VALUE('$idenv','$idrec','$message','$date','$heure','nonlu')");
		
		$requeteInsert_conversation->execute();
		
		$messageInsert="Votre message a été envoyé";
		
		return($messageInsert);
	}
}


?>

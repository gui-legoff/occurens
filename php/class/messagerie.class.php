<?php 

class messagerie extends connexion {

	function __construct($db){
	parent::__construct($db);
	}	

	
	// nombre de notif
	public function notif_fonction($idEnv){
		
		$reqNotif=$this->_db->prepare("SELECT * FROM conversations WHERE lu='nonLu' AND idRec=$idEnv ");
		
		$reqNotif->execute();
		
		$nb=$reqNotif->rowcount();

		return($nb);
	}
	
	
	// Update des notif
	public function notif_update($idRec,$idEnv){
		
		$udpate_notif=$this->_db->prepare(" UPDATE conversations SET lu='lu' WHERE idEnv=$idRec AND idRec=$idEnv ");
			
		$udpate_notif->execute();
	}
	
	
	// Qui a envoyer la notif ?
	public function perso_notif_fonction($idEnv){
		
		$reqNotif=$this->_db->prepare("SELECT * FROM conversations WHERE lu='nonLu' AND idRec=$idEnv ");
		
		$reqNotif->execute();

		return($reqNotif);
	}
 			

	// Affichage de la messagerie
	public function messagerie_affichage_fontion($idEnv,$idRec){
		
		$req=$this->_db->prepare(" SELECT * FROM conversations WHERE idrec IN('$idRec','$idEnv') AND idenv IN('$idRec','$idEnv') ORDER BY id ASC");

		$req->execute();

		return($req);
	
	}	
	
	
	// Insert du message
	public function messagerie_envoye_fonction($idEnv,$idRec,$message,$date,$heure){
		
		$requeteInsert_conversation=$this->_db->prepare("INSERT INTO conversations(idEnv,idRec,message,date,heure,lu) VALUE('$idEnv','$idRec','$message','$date','$heure','nonlu')");
		
		$requeteInsert_conversation->execute();
		
		$messageInsert="<span style='color: green'>Votre message a été envoyé !</span>";
		
		return($messageInsert);
	
	}
	
	// Supprimer un message
	public function supprimer_message_fonction($idRec,$idEnv,$idmessage){
		
		$requeteSup=$this->_db->prepare(" DELETE FROM conversations WHERE idEnv=$idEnv AND idRec=$idRec AND id=$idmessage ");

		$requeteSup->execute();
		
		$message="<span style='color: green'>Votre message a été supprimer !</span>";

		return($message);
	}
}

?>
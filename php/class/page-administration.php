<?php 

// Variable par default 
	$messageUpload="";
	$messageUpdate="";
	$id;
	$mail;
	$pass;
	$pseudo;
	$date;
	$sexe;
	$interet;
	$ville;
	$bio;

	
	
	//______________________________________________________//
	//                                                      //
	//               Instantiation des objet                //
	//                                                      //
	//           ATTENTION L'OBJET CREE DOIT PORTE          //
	//             LE MEME NOM QUE LE FICHIER !!!           //
	//______________________________________________________//
             
	$renseignements_user_objet = new renseignements_user($db);
	$upload_image_objet = new upload_image($db);
	$update_user_objet = new update_user($db);
	
		
	//______________________________________________________//
	//                                                      //
	//           Execution des fonctions des class          //
	//______________________________________________________//
	
	// sert a recuperer les informations de l'internaute connecté depuis la BDD

	$affMail = $_SESSION['mail'];
	$affPass = $_SESSION['pass'];

	$exec_renseignements_user=$renseignements_user_objet->renseignements_user_fonction($affMail,$affPass);

	while( $r=$exec_renseignements_user->fetch(PDO::FETCH_OBJ) ){
		
		$id = $r->id;
		$mail = $r->mail;
		$pass = $r->pass;
		$pseudo = $r->pseudo;
		$date = $r->date;
		$sexe = $r->sexe;
		$interet = $r->interet;
		$ville = $r->ville;
		$bio = $r->bio;
		$img = $r->img;
	}

	// upload d'une image de profil
	
	if(isset($_POST['envoiImg'])){
		
		$dossier="img/image_profil/";

		$messageUpload = $exec_upload_image=$upload_image_objet->upload_image_objet_fonction($dossier);
	}



	// Requete de mise a jour des informations de l'internaute connecté
		
	if(isset($_POST['updateRens'])){
	
		$id=htmlentities($_POST['id']);
		$mail=htmlentities($_POST['mail']);
		$pass=htmlentities($_POST['pass']);
		$pseudo=htmlentities($_POST['pseudo']);
		$date=htmlentities($_POST['date']);
		$sexe=htmlentities($_POST['sexe']);
		$interet=htmlentities($_POST['interet']);
		$ville=htmlentities($_POST['ville']);
		$bio=htmlentities($_POST['bio']);
		
		$messageUpdate = $exec_update_user=$update_user_objet->update_user_fontion($id,$mail,$pass,$pseudo,$date,$sexe,$interet,$ville,$bio);
	
}

?>

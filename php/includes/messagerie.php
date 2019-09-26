<?php

	if(isset($_GET['messagerie'])){
		// Include de la structure html de la messagerie
		include"php/includes/html/messagerie.php";
	}

	//_______________________  AUTOLOAD _____________________________//
	
	function chargerClasseAjax($classe){
    	require '../../php/class/'.$classe.'.class.php'; 
	}
	spl_autoload_register('chargerClasseAjax'); 

	include"../../config.php";

	// Variable par default


	//______________________________________________________//
	//                                                      //
	//               Instantiation des objet                //
	//______________________________________________________//

	$messagerie_affichage_objet = new messagerie($db); 
	$messagerie_insert_objet = new messagerie($db); 
	
	//______________________________________________________//
	//                                                      //
	//           Execution des fonctions des class          //
	//______________________________________________________//


	// Fonction pour afficher le tchat

	$idEnv=$_SESSION['id']; // id de l'user connecté
	$idRec=$_GET['id']; // id de l'user a qui l'on envoie le message

	$conversation = $messagerie_affichage_objet->messagerie_affichage_fontion($idEnv,$idRec);

	while( $r = $conversation->fetch(PDO::FETCH_OBJ) ){
		
		$message = $r->message;
		
		echo $message;
	}

						




	// Fonction pour envoyer un message 

	if(isset($_POST['envoie'])){
		if( !empty($_POST['message']) ){   
			
			$message = $_POST['message'];
			$date=date('y-m-d');
			$heure_hiver=date('H')+1;
			$heure=date($heure_hiver.':i:s');
			
			$messagerie_insert_objet->messagerie_insert_fonction($idEnv,$idRec,$message,$date,$heure);
	
		}else{
			echo"<p style='color: red'>Champs vides</p>";
		}
	}
	
	////////////////////////////////////////////////////



	
?>


	
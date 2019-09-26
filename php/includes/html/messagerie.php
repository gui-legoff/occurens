<?php
	
	// Variable par default
	
	$messageErreur="";
	$message = "";
	$heure = "";
	$date = "";
	$idEnv = $_SESSION['id'];
	
	if(isset($_GET['id'])){
		$idRec = $_GET['id'];
	}else{
		$idRec = "";
	}

	//______________________________________________________//
	//                                                      //
	//               Instantiation des objet                //
	//______________________________________________________//
	
	//$notif_objet = new messagerie($db);
	$notif_update_objet = new messagerie($db);
	$messagerie_affichage_objet = new messagerie($db);
	$messagerie_envoye_objet = new messagerie($db);
	$supprimer_message_objet = new messagerie($db);
		
	//______________________________________________________//
	//                                                      //
	//           Execution des fonctions des class          //
	//______________________________________________________/


	// Envoye message
	if(isset($_POST['envoie'])){
		if( !empty($_POST['message']) ){
			
			$message=htmlentities($_POST['message']);
			$date=date('y-m-d');
			$heure_hiver=date('H')+2;
			$heure=date($heure_hiver.':i:s');
			
			$messageErreur = $messagerie_envoye_objet->messagerie_envoye_fonction($idEnv,$idRec,$message,$date,$heure);
			
		}else{
			$messageErreur= "<span style='color: red'>Champs vides !</span>";
		}
	}

	// Suprimer un message
	if(isset($_POST['supprimerMessage'])){
		$idmessage = $_POST['idmessage'];
		
		$messageErreur = $supprimer_message_objet->supprimer_message_fonction($idRec,$idEnv,$idmessage);
	}
?>

						
<h3 class="titre">Conversation :</h3>


<div class="global_tchat">
	<div id="tchat">
		<!-- Le tchat s'affiche ici -->
		<?php 
			include"php/class/affichage-messagerie.php"; 
			$notif_update_objet->notif_update($idRec,$idEnv);
		?>
	</div>

	<form method="post">
			<textarea type="text" name="message" placeholder="Votre message..."></textarea>
			<input type="submit" value="Envoyer" name="envoie">
	</form>
	<div style="clear: both"></div>
	<p class='erreur'><?php echo $messageErreur ?></p>
</div>



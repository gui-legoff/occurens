<?php 

	
	include"php/class/page-index.php";
















//////////////////////////////////////////////////////////




// Variable par default

		$message="";		
		
		//______________________________________________________//
		//                                                      //
		//               Instantiation des objet                //
		//                                                      //
		//           ATTENTION L'OBJET CREE DOIT PORTE          //
		//             LE MEME NOM QUE LE FICHIER !!!           //
		//______________________________________________________//
             
		$inscription_objet = new inscription($db);                
	
		
		//______________________________________________________//
		//                                                      //
		//           Execution des fonctions des class          //
		//______________________________________________________//
		
			if(isset($_POST['envoi'])){
				
				// Sécurisation
				$mail=htmlentities($_POST['mail']); 
				$pass=htmlentities($_POST['pass']);
				$pseudo=htmlentities($_POST['pseudo']);
				$date=htmlentities($_POST['date']);
				$sexe=htmlentities($_POST['sexe']);
				$envoi=htmlentities($_POST['envoi']);	
				
				$message = $exec_inscription=$inscription_objet->inscription_fonction($mail,$pass,$pseudo,$date,$sexe,$envoi);	
			}

	
	

?>
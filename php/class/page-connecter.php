<?php 

// Variable par default
		$message="";
	
		//______________________________________________________//
		//                                                      //
		//               Instantiation des objet                //
		//                                                      //
		//           ATTENTION L'OBJET CREE DOIT PORTE          //
		//             LE MEME NOM QUE LE FICHIER !!!           //
		//______________________________________________________//
             
		$login_verif_objet = new login_verif($db);                
	
		
		//______________________________________________________//
		//                                                      //
		//           Execution des fonctions des class          //
		//______________________________________________________//
		
		if(isset($_POST['connect'])){
				
			// Sécurisation
			$login=htmlentities($_POST['log']); 
    		$password=htmlentities($_POST['pass']);
				
			$message = $exec_login_verif=$login_verif_objet->login_verif_fonction($login,$password);
				
		}
			
?>

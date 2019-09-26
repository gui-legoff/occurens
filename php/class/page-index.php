<?php 

		//______________________________________________________//
		//                                                      //
		//               Instantiation des objet                //
		//______________________________________________________//
                            
		$affichage_users_objet = new affichage_users($db);                
		
		//______________________________________________________//
		//                                                      //
		//           Execution des fonctions des class          //
		//______________________________________________________//

		// Fonctions d'affichage des membres inscrit	
		
		$id="";
		$constante="";

		if(!isset($_SESSION['user'])){
			$constante=" AND actif='activé' ";
			
		}elseif(!isset($_GET['id'])){	
			$id = $_SESSION['id'];
			$constante=" AND actif='activé' AND id!='$id' ";
			
		}else{
			$id = $_GET['id'];
			$constante=" AND actif='activé' AND id='$id' ";

		}
		
		$exec_affichage_users = $affichage_users_objet->affichage_users_fonction($constante);	

?>
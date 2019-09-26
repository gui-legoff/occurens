<?php
		

	//______________________________________________________//
	//                                                      //
	//               Instantiation des objet                //
	//                                                      //
	//           ATTENTION L'OBJET CREE DOIT PORTE          //
	//             LE MEME NOM QUE LE FICHIER !!!           //
	//______________________________________________________//

	
	$affichageUsers_objet = new affichageUsers($db);

	//______________________________________________________//
	//                                                      //
	//           Execution des fonctions des class          //
	//______________________________________________________//

	$exec_affichageUsers = $affichageUsers_objet->affichageUsers_fonction();
	
	
	//______________________________________________________//
	//                                                      //
	//                      CODE HTML                       //
	//______________________________________________________//


?>

	<h1 style="color: #83B8F1">Bienvenue sur votre panel d'administration ADMIN</h1>
	<hr>
	<h2 style="color: #3D4146">Listing des users sur le site :</h2>
	
	<?php
	
		while( $r = $exec_affichageUsers->fetch(PDO::FETCH_OBJ)){
		
			$id = $r->id;
			include("aff_list_users.php");		
		
		}
	
	?>


	<hr>
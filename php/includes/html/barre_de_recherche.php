<?php 

if(isset($_SESSION['user']) or isset($_SESSION['admin'])){
	
	// Variable par default 
	$res="";
	$nb="";
	$id="";
	
	
	//______________________________________________________//
	//                                                      //
	//               Instantiation des objet                //
	//______________________________________________________//
             
	$barre_de_recherche_objet = new barre_de_recherche($db);
	$nb_resultat_recherche_objet = new barre_de_recherche($db);
	$notif_objet = new messagerie($db);

	//______________________________________________________//
	//                                                      //
	//           Execution des fonctions des class          //
	//______________________________________________________//
	
	
	// Notifications
	
	$idEnv = $_SESSION['id'];
	$nbNotif = $notif_objet->notif_fonction($idEnv);
	
?>	
	<div class="barre_de_recherche">
		
		<form method="post">
			<input type="text" name="recherche" placeholder="Rechercher des membres"/>
			<input type="submit" name="go" value="go"/>
		</form>
		
		<?php
			// Barre de recherche
		
			if(isset($_POST['go'])){
				if(!empty($_POST['recherche'])){
			
					// Sécurisation
					$recherche=htmlentities($_POST['recherche']);

					
					// Nombre de résultats
					$nb=$nb_resultat_recherche_objet->nb_resultat_recherche($recherche);
					?>
						<span style="color: green"><?php echo $nb ?></span>
					<?php
						
						
					// Résultat
					$rechercheaff = $barre_de_recherche_objet->barre_de_recherche_fonction($recherche);
					
						while($r=$rechercheaff->fetch(PDO::FETCH_OBJ)){
							$id = $r->id;
							$pseudo = $r->pseudo;		
					?>				
						<i class="far fa-user"></i>
						<a href="?id=<?php echo $id ?>" style="text-transform: capitalize"><?php echo $pseudo ?></a>
					<?php
						}
				}else{
					$messageError = "Le champs est vide !";
				}	
			}
		?>
		
		<p style='color:red'><?php echo $messageError ?> </p>
	</div>

	<!-- Les notifs s'affiche ici -->
	<i class="far fa-comment" style="float: left;margin-right: 10px"></i>
	<div id="notif"><a href="?page=messagerie"><?php echo"Nombre de notifications : ".$nbNotif."<hr>"; ?></a></div>
	
<?php											  
}
?>

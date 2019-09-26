<?php 
	
	//______________________________________________________//
	//                                                      //
	//                       PANEL USER                     //
	//______________________________________________________//

	if(isset($_SESSION['user'])){
	
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

	<div class="panel">
		<h1>Bienvenue sur votre panel d'administration : <?php echo $pseudo; ?></h1><hr>
			<!-- PARTIE POUR METTRE A JOUR SON IMAGE DE PROFIL -->

			<h2>Editer votre photo de profil :</h2>

			<img alt="" src="<?php echo $img ?>"/> 
			<form method="post" enctype="multipart/form-data" class="form_img">
				<input type="file" name="pictures"/>
				<input type="submit" name="envoiImg" value="upload"/>
			</form>
			<div style="clear: both"></div>
			
			<?php echo $messageUpload; ?>  <!-- MESSAGE DE L'UPLOAD --> 
			
			<hr style="margin-top: 15px">


			<!-- PARTIE POUR MODIFIER CES INFORMATIONS PERSONNELLES-->

			<h2>Mettre a jour mes informations personnelles :</h2>

			<form method="post" class="form_update">
				<input class="input_insc" type="hidden" name="id" value="<?php echo $id ?>"/> 
				<label>Adresse mail : </label>
				<input class="input_insc" type="texte" name="mail" value="<?php echo $mail ?>"/>
				<label>Mot de passe : </label>
				<input class="input_insc" type="texte" name="pass" value="<?php echo $pass ?>"/>
				<label>Pseudo : </label>
				<input class="input_insc" type="texte" name="pseudo" value="<?php echo $pseudo ?>"/>
				<label>Date de naissance : </label>
				<input class="input_insc" type="date" name="date" value="<?php echo $date ?>"/>
				<label>Sexe : </label>
				<input class="input_insc" type="texte" name="sexe" value="<?php echo $sexe ?>"/>
				<label>centre d'intérêt : </label>
				<input class="input_insc" type="texte" name="interet" value="<?php echo $interet ?>"/>
				<label>Ville : </label>
				<input class="input_insc" type="texte" name="ville" value="<?php echo $ville ?>"/>
				<label>Biographie : </label>
				<textarea class="input_insc" type="texte" name="bio"><?php echo $bio ?></textarea>
				<input class="btn" type="submit" name="updateRens" value="mettre a jour"/>
			</form>	
			<p style="color: green"><?php echo $messageUpdate; ?></p>   <!-- MESSAGE DE L'UPDATE --> 	
		</div>


<?php }else{
		
	//______________________________________________________//
	//                                                      //
	//                      PANEL ADMIN                     //
	//______________________________________________________//
		
		
	//______________________________________________________//
	//                                                      //
	//               Instantiation des objet                //
	//______________________________________________________//

	
	$affichage_users_objet = new affichage_users($db);

	//______________________________________________________//
	//                                                      //
	//           Execution des fonctions des class          //
	//______________________________________________________//
		
	$constante="";		
			
	$exec_affichage_users = $affichage_users_objet->affichage_users_fonction($constante);
	
	
	//______________________________________________________//
	//                                                      //
	//                      CODE HTML                       //
	//______________________________________________________//


?>

	<h1 style="color: #83B8F1">Bienvenue sur votre panel d'administration ADMIN</h1>
	<hr>
	<h2 style="color: #3D4146">Listing des users sur le site :</h2>
	
<?php
	
	while( $r = $exec_affichage_users->fetch(PDO::FETCH_OBJ)){
		
		$id = $r->id;
		include("aff_list_users.php");		
		
	}
} ?>

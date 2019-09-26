<?php
	
	// Include du fichier : ami 
	// ou 
	// Include du fichier : messagerie 
	// Sinon 
	// Include du panel administration pour parametrer son profil



	if(isset($_GET['ami'])){
		
		include"includes/ami.php";
		
		}else if(isset($_GET['messagerie'])){
		
		include"includes/messagerie.php";
		
	}else{
		
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

	//______________________________________________________//
	//                                                      //
	//                      CODE HTML                       //
	//______________________________________________________//


?>
	<div class="inscription panel">
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
		<input type="hidden" name="id" value="<?php echo $id ?>"/> 
		<label>Adresse mail : </label>
		<input type="texte" name="mail" value="<?php echo $mail ?>"/>
		<label>Mot de passe : </label>
		<input type="texte" name="pass" value="<?php echo $pass ?>"/>
		<label>Pseudo : </label>
		<input type="texte" name="pseudo" value="<?php echo $pseudo ?>"/>
		<label>Date de naissance : </label>
		<input type="date" name="date" value="<?php echo $date ?>"/>
		<label>Sexe : </label>
		<input type="texte" name="sexe" value="<?php echo $sexe ?>"/>
		<label>centre d'intérêt : </label>
		<input type="texte" name="interet" value="<?php echo $interet ?>"/>
		<label>Ville : </label>
		<input type="texte" name="ville" value="<?php echo $ville ?>"/>
		<label>Biographie : </label>
		<textarea type="texte" name="bio"><?php echo $bio ?></textarea>
		<input type="submit" name="updateRens" value="mettre a jour"/>
	</form>	
	<p style="color: green"><?php echo $messageUpdate; ?></p>   <!-- MESSAGE DE L'UPDATE --> 	
	</div>
	<hr>

	<?php 
	}
	?>


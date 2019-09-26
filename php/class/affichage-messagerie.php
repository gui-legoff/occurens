<?php 
// Affichage message 
			
	$aff = $messagerie_affichage_objet->messagerie_affichage_fontion($idEnv,$idRec);

	// Requete pour recuperer le chemin d'accès de l'img de l'utilisateur connecté
	$req=$db->query(" SELECT img FROM users WHERE id='$idEnv' ");
	$res=$req->fetchAll();
	foreach($res as $r){$imgMoi = $r['img'];}

		while( $a = $aff->fetch(PDO::FETCH_OBJ) ){
			
			$idmessage= $a->id;
			$idrec= $a->idRec;
			$idenv= $a->idEnv;
			$message= $a->message;
			$date= $a->date;
			$heure= $a->heure;
			
			if($idenv == $idEnv){
?>			
					<div class="content_right">
						<p class="message_conv"><?php echo $message; ?></p>
						<img src="<?php echo $imgMoi; ?>">
						<div class="bulle_message">
							<p>Envoyé le : <?php echo $date; ?></p>
							<p>à <?php echo $heure; ?></p>
							<form method="post">
								<input type=hidden value="<?php echo $idmessage ?>" name='idmessage'>
								<button type="submit" class="reset_btn" name="supprimerMessage">
									<i class="far fa-trash-alt icone"></i>
								</button>
							</form>
						</div>
						<div style="clear: both"></div>
						
					</div>
					
		<?php
			}else{
				// Requete pour afficher les renseignement des users avec qui on tchat
				$idreq=$_GET['id'];
				$req=$db->query(" SELECT * FROM users WHERE id='$idreq' ");
				$res=$req->fetchAll();
		
				foreach($res as $r){
					$img=$r['img'];
				}
		?>			
			
				<div class="content_left">
					<img src="<?php echo $img; ?>">
					<p class="message_conv"><?php echo $message; ?></p>
					<div class="bulle_message">
						<p>Envoyé le : <?php echo $date; ?></p>
						<p>à <?php echo $heure; ?></p>
					</div>
					<div style="clear: both"></div>
				</div>
		<?php			
			}
		}
		?>
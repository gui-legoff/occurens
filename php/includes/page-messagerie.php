<?php

	// Variable par default

	$idEnv = $_SESSION['id'];
	$pseudo="";
	$array=array();
	$arrayNotif=array();
	$couleur="";
	//______________________________________________________//
	//                                                      //
	//               Instantiation des objet                //
	//______________________________________________________//

	$affichage_ami_messagerie_objet = new affichage_ami($db);
	$perso_notif_objet = new messagerie($db);

	//______________________________________________________//
	//                                                      //
	//           Execution des fonctions des class          //
	//______________________________________________________//


	// ID des personnes qui nous on envoyer un message 
	$perso=$perso_notif_objet->perso_notif_fonction($idEnv);

	while($p=$perso->fetch(PDO::FETCH_OBJ)){
		array_push( $arrayNotif,$p->idEnv );
	}


	// Requete pour récuperer les ID des personnes a qui l'on a envoyer un message

	$reqRecupIDs=$db->query(" SELECT * FROM conversations where idEnv=$idEnv OR idRec=$idEnv ");
	$resRecupIDs=$reqRecupIDs->fetchAll();
	
?><div class="block_left"><?php

	foreach($resRecupIDs as $r){
		$idREC=$r['idRec'];
		$idENV=$r['idEnv'];
		
		$res=$affichage_ami_messagerie_objet->affichage_ami_messagerie_fonction($idREC,$idENV);
			
		while($r=$res->fetch(PDO::FETCH_OBJ)){
			
			if($r->id !== $idEnv ){
				
				// On ajoute les ID au array
				if( !in_array($r->id,$array) ){
					array_push( $array,$r->id );
				}
			}
		}		
	}
	
	foreach($array as $a){
	
		// Requete pour afficher les renseignement des users avec qui on tchat
		$req=$db->query(" SELECT * FROM users WHERE id='$a' ");
		$res=$req->fetchAll();
		
		foreach($res as $r){
			if( in_array($r['id'],$arrayNotif) ){
				$couleur = "background: rgba(0,140,255,0.16)";
			}else{
				$couleur="background: rgba(228,228,228,0.7)";
			}

			$img=$r['img'];
			?>					
			<div class="content_user" style="<?php echo $couleur ?>">
				<a href="?page=messagerie&id=<?php echo $r['id'] ?>">
					<div class="cont_u">
						<img src="<?php echo $img ?>" class="tchat_img"/>
						<p><?php echo $r['pseudo'] ?></p>
						<?php 
							if( in_array($r['id'],$arrayNotif) ){
								echo"<i class='far fa-bell'></i>";
							}
						?>
						<div style="clear: both"></div>
					</div>					
				</a>
			</div>
		<?php
		}
	}
	
	
?></div>
<div class="content_right right">
	<?php include"php/includes/html/messagerie.php"; ?>
</div>
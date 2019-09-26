<?php 

	// Variable par default


	//______________________________________________________//
	//                                                      //
	//               Instantiation des objet                //
	//______________________________________________________//
	
	$affichage_ami_objet = new affichage_ami($db);
	$supprAmi_objet = new affichage_ami($db);

	//______________________________________________________//
	//                                                      //
	//           Execution des fonctions des class          //
	//______________________________________________________//
	
	$id = $_SESSION['id'];
	
	$exec_affichage_ami = $affichage_ami_objet->affichage_ami_fonction($id);

	// Supprimer un membre 

	if(isset($_POST['buttonsuppr'])){
		
		$idPersoLiker=$_POST['idPersoLiker'];
		$idPersoQuiLike=$_POST['idPersoQuiLike'];
		
		$supprAmi_objet->supprAmi_fonction($idPersoLiker,$idPersoQuiLike);
	}

	//______________________________________________________//
	//                                                      //
	//                      CODE HTML                       //
	//______________________________________________________//


	while( $r = $exec_affichage_ami->fetch(PDO::FETCH_OBJ) ){
		
		$idAmi = $r->id;
		$img = $r->img;
		$pseudo = $r->pseudo;
					
?>
	
	<a href="?id=<?php echo $r->id ?>">
		<div class="affUsers">
			<div class="block_top">
				<p><?php echo $r->pseudo;	?></p>
				<img src="<?php echo $r->img; ?>"/>
			</div>
	</a>
	<form method="post">
		<input type="hidden" value="<?php echo $r->id ?>" name="idPersoLiker">
		<input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="idPersoQuiLike">
		<button type="submit" class="reset_btn" name="buttonsuppr">
			<i class="far fa-times-circle i"></i>
		</button>
	</form>	
		</div>		
<?php
	}
?>
	
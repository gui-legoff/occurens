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

			if(!isset($_SESSION['user'])){
			
?>

	<div class="global_body">
		<div class="inscription">
			<h3>Formulaire d'inscription</h3>
				<div class="global_formInsc">
					<h4>Renseignements nécessaire :</h4>
						<form method="post">
							<input class="input_insc" type="text" name="mail" placeholder="Mail"/>
							<input class="input_insc" type="password" name="pass" placeholder="Mot de passe"/>
							<input class="input_insc" type="text" name="pseudo" placeholder="Pseudo"/>
							<input class="input_insc" type="date" name="date" placeholder="Date de naissance">
							<input class="btn_radio" type="radio" name="sexe" value="femme"/>
								<label>Femme</label>
							<input type="radio" name="sexe" value="homme" checked/>
								<label>Homme</label>
							<input class="btn_insc" type="submit" name="envoi" value="C'est parti !">
						</form>
				</div>
				<p style="color: red;text-align: center;margin-top: 10px"><?php echo $message; ?></p>
		</div>
	</div>
<?php
				}else{
				
				// Fonction qui récupère l'ID généré par l'inscription
					
				$user=$_SESSION['user'];
				
				$recupid=$db->query(" SELECT * FROM users where pseudo='$user' ");
				$resrecupid=$recupid->fetchAll();
				foreach($resrecupid as $r){
					$_SESSION['id']=$r['id'];
				}
				
				//
				include("php/includes/page-connecter.php");
			}
?>
				
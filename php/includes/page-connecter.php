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
			
	if( (!isset($_SESSION['user'])) and (!isset($_SESSION['mail'])) and (!isset($_SESSION['pass'])) ){
		
?>

	<section class="body">
		<div class="global_body">
			<div class="inscription">
				<h3>Connectez-vous ici :</h3>

				<div class="global_formInsc">
				<h4>Renseignements nécessaire :</h4>
				<form method="post">
					<input  class="input_insc" type="text" name="log" placeholder="adresse mail" />
					<input  class="input_insc" type="password" name="pass" placeholder="mot de passe" />
					<input  class="btn_insc" type="submit" name="connect" value="Se connecter"/>
					<div style="clear: both"></div>
				</form>
				<?php echo "<p style='color:red'>".$message."</p>" ?>
				</div>
			</div>
		</div>
	</section>

<?php
	}else{
		include("php/includes/page-administration.php");
	}
?>			  
			  
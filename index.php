<?php 

	session_start();
	
	// Include du fichier de config
	include"config.php";

	// Include du fichier de debug
	//include"debug_mode.php";	
	
?>

<!doctype html>
<html>
	<head>
		<title>Inscription OCCURENS</title>
		<link rel="stylesheet" type="text/css" href="css/commun.css"/>
		<script src="script/jquery-3.2.1.compressed.js" type="text/javascript"></script>
	</head>

	<body>
		
		<?php 
			
		// Variable par default sur index.php
		
		$messageError="";
		
		//_______________________________________//
		
		// Gestionnaires des Titres
		include"php/includes/gestionnaires_titre.php";
		
		
		// Barre de navigation
		include"php/includes/html/header.php";
		
		?>
	
		<div class="banniere">
			<!-- MESSAGE BANNIERE -->
				<?php echo"<h1>".$titre."</h1>"; ?>
		</div>
		
		<section class="body_acc">
	
			<?php
				// Barre de recherche
				include"php/includes/html/barre_de_recherche.php";
		
		
				// Gestionnaires de pages
				if(isset($_GET['page'])){
					if(file_exists('php/includes/page-'.$_GET['page'].'.php')){
						include'php/includes/page-'.$_GET['page'].'.php';
					}
				}else{
				
				// Class de l'index
				include"php/class/page-index.php";
				
					// Attribution des valeurs recuperer par la requete affichage aux variables
					while( $r = $exec_affichage_users->fetch(PDO::FETCH_OBJ) ){
						
						$id = $r->id;
						$pseudo = $r->pseudo;
						$img = $r->img;
						$sexe = $r->sexe;
						$mail = $r->mail;
						$pass = $r->pass;
						$date = $r->date;
						$interet = $r->interet;
						$ville = $r->ville;
						$bio = $r->bio;
					?>
			
					<a href='?id=<?php echo $id ?>'>	
						<div class="affUsers">
							<div class="block_top">
								<p><?php echo $pseudo;	?></p>
								<img src="<?php echo $img; ?>"/>
							</div>
							<div class="block_bottom">
								<i class="far fa-user icn"></i>
								<p><?php echo $sexe;	?></p>
								<i class="fas fa-birthday-cake icn"></i>
								<p><?php echo $date;	?></p>
								<?php 
									if(isset($_GET['id'])){
										echo"<p>$interet</p>";
										echo"<p>$ville</p>";
										echo"<p>$bio</p>";
									}
								?>
							</div>
						
							<?php 
							if(isset($_SESSION['user'])){
							
							// Include du fichier pour pouvoir liker un membre
							include"php/includes/likePerso.php";	
							?>
							<form method="post">
								<input type="hidden" value="<?php echo $r->id ?>" name="idPersoLiker" id="idenv">
								<input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="idPersoQuiLike">
								<button type="submit" class="reset_btn like" name="button">
									<i class="far fa-heart coeur"></i> <!-- ici faire une condition pour charger on non le bon icone -->
									Like
								</button>
							</form>
					
							<?php } ?>
						</div>
					</a>
				<?php
					}	
					if(isset($_GET['id']) and isset($_SESSION['user']) or isset($_SESSION['admin'])){
				?>
						<div class="block_right">
				<?php 
							// Include de la structure html de la messagerie
							include"php/includes/html/messagerie.php";
					}
				?>
						</div>
				<?php
			}
			?>
			
		</section>
		
		<!-- INCLUDE DU FOOTER -->
		<?php //include"php/includes/html/footer.php" ?>
		
	</body>
</html>


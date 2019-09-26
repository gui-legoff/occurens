	<header>
		<a href="index.php">	
			<img src="img/icone.png" alt="icone" title="icone" class="icone-top"/>
			<h3 class="titre_header">occurrens</h3>
		</a>
		<?php include"php/includes/html/bouton.php" ?>
		<div class="nav" id="menu">
			<nav>
				<ul>
					<li><a href="index.php">Accueil</a></li>			
					<li><a href="?page=nos_offres">Nos offres</a></li>
					<li><a href="?page=contact">Contact</a></li>
					
					<?php 
						if( (isset($_SESSION['admin'])) or (isset($_SESSION['user'])) ){
					?>		
						<li class="none">
							<div id="div1" tabindex="0">
								<h4>MON PROFIL</h4>
								<ul>
									<li class="none"><a href="?page=administration">Modier profil</a></li>
									<li class="none"><a href="?page=conquete">Futures conquête</a></li>
									<li class="none"><a href="?page=messagerie">Ma messagerie</a></li>
									<li class="none"><a href="php/includes/deconnexion.php">Déconnexion</a></li>
								</ul>
							</div>
						</li>	
					<?php	
						}else{
					?>
						<li><a href="?page=enregistrer">S'inscrire</a></li>
						<li><a href="?page=connecter">Se connecter</a></li>
					<?php 
						}
					?>

				</ul>
			</nav>
		</div>	
	</header>
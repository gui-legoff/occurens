<link rel="stylesheet" type="text/css" href="css/contact.css"/>

<?php include"php/includes/mail.php" ?>

<section class="section-3">
				<section class="section-3_c">
					<h1>Vous souhaitez nous contacter ? Remplissez le formulaire ci-dessous:</h1>
					<div class="content_form">
						
						<h3 class="titre_article">Formulaire</h3>
						<p>* Remplir ce formulaire pour m'envoyer votre demande</p>
						
						<form method="post" class="formulaire">
							<p>Votre nom :</p>
							<input type="text" name="nom" value=""/>
							<p>Objet :</p>
							<input type="text" name="objet" value=""/>
							<p>Votre mail :</p>
							<input type="mail" name="mail" value="" placeholder="ex: your@email.com"/>
							<p>Votre demande :</p>
							<textarea name="text"></textarea>
							<input type="submit" name="submit" class="btn"/>
							<div style="clear: both"></div>
						</form>
						<p><?php echo $errormail ?></p>
					</div>				
				
					<section class="content_form_c">
						<h3 class="titre_article h3">Informations :</h3>
						<div>
							<img class="" src="img/contact/icone-1.png" alt="75015 Paris" title="75015 Paris">
							<p>050580 Miami</p>
							<div style="clear: both"></div>
						</div>
						<div>
							<img class="" src="img/contact/icone-2.png" alt="legoff.guillaume@live.fr" title="legoff.guillaume@live.fr">
							<p>occurens-contact@bonheur.fr</p>
							<div style="clear: both"></div>
						</div>
						<div>
							<img class="" src="img/contact/icone-3.png" alt="0760100186" title="0760100186">
							<p>+19 19198118</p>
							<div style="clear: both"></div>
						</div>
					</section>
					<div style="clear: both"></div>
				</section>
			</section>
	  
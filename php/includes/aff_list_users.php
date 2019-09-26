

	<div class="affUsers">
		<p>
			<?php echo $r->pseudo; echo " est :"; ?>
		</p>
		
		<form method="post" onChange="submit()">
			<select name="<?php echo $r->id; ?>">
				<option value="">Statut</option>;
				<option value="activé"
						<?php 
							if($r->actif == 'activé' ){
							echo " selected='selected' ";
							}
						?>
				>activé</option>
				<option value="desactivé"
						<?php 
							if($r->actif == 'desactivé' ){
							echo " selected='selected' ";
							}
						?>
				>desactivé</option>
			</select>
		</form> 
		
		
		<!----   COMMANDE SQL POUR POURVOIR UPDATER L'USERS CIBLE  ------>
		<?php 
		
		if(isset($_POST[$id])){
			
			$actif = $_POST[$id];
				
			$updateActif=$db->exec(" UPDATE users SET actif='$actif' WHERE id='$id' ");
			
			if( $_POST[$id] == 'desactivé' ){
				echo"<p style='color:green'>l'utilisateur est desactivé</p>";
			}else if( $_POST[$id] == 'activé' ){
				echo"<p style='color:green'>l'utilisateur est activé</p>";
			}
			
		}
		
		?>
		
		<div style="clear: both"></div>
		
	</div>

		




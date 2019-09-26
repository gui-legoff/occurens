<?php 

class login_verif extends connexion {

	function __construct($db){
	parent::__construct($db);
	}
	
	public function login_verif_fonction($login,$password){
		
		// Requète
		$requeteLogin_verif=$this->_db->prepare(" SELECT * FROM users WHERE mail='$login' AND pass='$password' AND actif='activé' ");
		
		$requeteLogin_verif->execute();
		
		$resultat=$requeteLogin_verif->fetchAll();
		
		$nb=$requeteLogin_verif->rowcount();
		
		
		
		if( ( !empty($login) ) or ( !empty($password) ) ){	
			if($nb>0){
				foreach($resultat as $r){
					if( $r['niveau'] == 'user'){

						/* PARTIE OU L'ON STOCKERA LE LOGIN ET LE PASS DE L'UTILISATEUR CONNECTE */

						$_SESSION['user'] = $r['niveau'];
						$_SESSION['mail'] = $r['mail'];
						$_SESSION['pass'] = $r['pass'];
						$_SESSION['id'] = $r['id'];
						$msglog="";

					}else if( $r['niveau'] == 'admin'){

						$_SESSION['admin'] = $r['niveau'];
						$_SESSION['mail'] = $r['mail'];
						$_SESSION['pass'] = $r['pass'];
						$_SESSION['id'] = $r['id'];
						$msglog="";
					}

					// MESSAGE D'ERREUR SI LE COMPTE EST INACTIF
	
					if($r['actif'] == 'desactivé'){
					
						$msglog="<p style='color: red'>Votre compte est inactif ... </p>";
					}
				}
			}else{
				$msglog="Mauvais identifant ou mot de passe !";
			}
		}else{
			$msglog="Champs vides !";
		}
		
	return($msglog);	
	}	
}

?>

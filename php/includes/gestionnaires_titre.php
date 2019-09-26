<?php

if(isset($_GET['page'])){
	if($_GET['page'] == 'connecter'){
		$titre='Déja membre ?';	
		
	}elseif($_GET['page'] == 'enregistrer'){
		$titre='Nouveau sur OCCURRENS ?';
	
	}elseif($_GET['page'] == 'administration'){
		$titre='Administration';
	
	}elseif($_GET['page'] == 'conquete'){
		$titre='Mes futures conquête';
	
	}elseif($_GET['page'] == 'messagerie'){
		$titre='Ma messagerie';
		
	}elseif($_GET['page'] == 'nos_offres'){
		$titre='Nos offres';	
		
	}elseif($_GET['page'] == 'contact'){
		$titre='Contactez-nous';		
		
	}
}else{
	$titre="Liste de nos membres inscrits :";
}

?>

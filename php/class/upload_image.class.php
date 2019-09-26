<?php 

class upload_image extends connexion{
	
	function __construct($db){
	parent::__construct($db);
	}
	
	public function upload_image_objet_fonction($dossier){
		
		$message="";


		$nouveaunomimage="";

		$name=$_FILES['pictures']['name'];
		$tmp_name=$_FILES['pictures']['tmp_name'];
		$error=$_FILES['pictures']['error'];
	 
	 	if($error==0){
		 
			move_uploaded_file($tmp_name,$dossier.$id.'_profil.jpg');  
			$nouveaunomimage=$dossier.$id.'_profil.jpg';
		 
			$requeteUpload_image=$this->_db->prepare("UPDATE users SET img='$nouveaunomimage' WHERE id='$id'");
			
			$requeteUpload_image->execute();
			
			$message = "Bravo ton image de profil a bien été mise a jour !";
			
		}else{
			$message = "erreur N° .$error";
	 	}
		return($message);
	}
}

?>
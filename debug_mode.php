<?php 

if($db){echo"Vous-êtes connecté à la base de données";echo"<hr>";}	
	
	echo"POST :"."<br>";
	var_dump($_POST);
	echo"<hr>";
	
	echo"GET :"."<br>";
	var_dump($_GET);
	echo"<hr>";

	echo"SESSION :"."<br>";
	var_dump($_SESSION);	
	echo"<hr>";

?>
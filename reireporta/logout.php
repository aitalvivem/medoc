<?php   
	//cette page ferme la session et redirige vers la page connexion.php
	session_start(); 
	session_destroy();
	header("Location: connexion.php"); //la faudra que ça renvoie sur la page d'acceuil du site
	exit();
?>
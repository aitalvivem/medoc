<?php
	try{
			$bdd = new PDO('mysql:host=localhost;dbname=bddMedoc;charset=utf8', 'root', 'blackdream', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (exeption $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
?>
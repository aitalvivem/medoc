<?php

//si les logs de connexions existent ET l'utilisateur a entré les bons identifiants
if(isset($_POST['mot_de_passe']) && isset($_POST['identifiant']) && $_POST['identifiant'] == 'medoc_montpelhier' )// && $_POST['mot_de_passe'] == '666ccitania')
{
	$mdp = hash("md5", $_POST['mot_de_passe']);
	
	$debutMdp = substr($mdp, 0, -3);
	$finMdp= substr($mdp, -2);
	$mdp = $debutMdp.'2sd$'.$finMdp;
	
	if($mdp == '61f2d8967a4a17708c92b1e640f8f2sd$ac'){
		//on crée la session(), on indique qu'on est co en admin et on recharge la page
		session_start();
		$_SESSION['login'] = 'administrator';
		header("Location: admin.php");
		exit();
	}
	else
	{
		//on redirige vers la page de connexion
		header('Location: connexion.php');
		exit();
	}
}
else
{
	//on redirige vers la page de connexion
	header('Location: connexion.php');
	exit();
}

?>
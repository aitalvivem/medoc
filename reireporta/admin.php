<?php

session_start();

//si la session existe 
if(isset($_SESSION['login']) && $_SESSION['login'] == 'administrator')
{	
	/*
		on vérifie de qu'elle page est demandée et on l'affiche
		si aucune page n'est demandée on affiche la page d'acceuil admin
	*/
	if(isset($_GET['idPage']))
	{
		switch($_GET['idPage'])
		{
			case 1:
				include('messatgesNovels.php');
				break;
			case 2:
				include('prepausicionDArticles.php');
				break;
			case 3:
				include('apondreEveniment.php');
				break;
			case 4:
				include('modificarEveniment.php');
				break;
			case 5: 
				include('apondreFoto.php');
				break;
			case 6:
				include('apondDArticle.php');
				break;
			default:
				include('messatgesNovels.php');
		}
	}
	else
	{
		include('messatgesNovels.php');
	}
}
else
{
	header("Location: logout.php");
	exit();
}
?>
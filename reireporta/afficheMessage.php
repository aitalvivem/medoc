<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] == 'administrator')
{
	//on récupère l'id du message
	if(isset($_GET['idMessage']))
	{
		?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="scriptReirePorta.css" />
		<link href="images/s-l30.jpg" rel="shortcut icon" />
        <title>Messatges novèls</title>
    </head>

    <body>
		<?php
		include('nav.php');
		?>
		<div class="corps">
		<?php
		include('coBDD.php');
		
		//si 'j'ai repondu'
		if(isset($_POST['repondu']) && $_POST['repondu'] == 1)
		{
			//on met a jour la BD et on recharge la page
			$req = $bdd->prepare('UPDATE
									contact
								SET
									repondu = :repondu
								WHERE
									id = :id');
									
			$req->execute(array(
							'repondu' => 1,
							'id' => $_GET['idMessage']
						));
						
			$message = '<p class="confirme" >Vous avez bien répondu au message</p>';
		}
		
		//on récupère le msg de la BD
		$reponse = $bdd->query('SELECT
									email,
									objet,
									date,
									message,
									repondu
								FROM
									contact
								WHERE
									id = '.$_GET['idMessage']);
		
		//on met en page le message
		while($donnees = $reponse->fetch())
		{
		?>
			<fieldset>
				<?php if(isset($message)) { echo $message ; } ?>
				<p><strong>Mandator :</strong> <?php echo htmlspecialchars($donnees['email']) ; ?><br />
				<strong>Objecte :</strong> <?php echo htmlspecialchars($donnees['objet']) ; ?><br />
				<strong>Data :</strong> <?php echo htmlspecialchars($donnees['date']) ; ?><br />
				<strong>Responsa : </strong>
				<?php if($donnees['repondu'] == 1)
				{
					echo 'facha';
				}
				else
				{
					echo 'Dins l\'espèra';
				} ?>
				</p>
				<p><strong>Messatge :</strong></p>
				<p><?php echo htmlspecialchars($donnees['message']); ?></p>
				<a href="admin.php?idPage=1" ><button type="button" >Retorn a la tièra de messatges</button></a>
				<?php
				if(!(isset($donnees['repondu']) && $donnees['repondu'] == 1))
				{ 
				?>
				<form action="afficheMessage.php?idMessage=<?php echo $_GET['idMessage']; ?>" method="post">
					<button type="submit">Ai plan respondut an aquel messatge</button>
					<input type="hidden" name="repondu" value="1" />
				</form>
				<?php
				}
				?>
			</fieldset>
		<?php
		}
		?>
		</div>
	</body>
</html>
		<?php
	}
	else
	{
		//on affiche la page messatgesNovels
		include('messatgesNovels.php');
	}
}
else
{
	header("Location: logout.php");
	exit();
}

?>
<?php
if(isset($_SESSION['login']) && $_SESSION['login'] == 'administrator')
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
			<h2>Messatges novèls</h2>
			<p>Aquì la tièra dels messatges novèls mandats pels utilisator del site. Se pòt pas respondre aquì directament, cal passar pel mail dau med'òc.</p>
			<p>Se respondètz a un messatge pensatz plan de cliquar sul boton "Ai respondut an aquel messatge".</p>
		
		<?php
		include('coBDD.php');
		
		//requete sql
		$reponse = $bdd->query('SELECT
									id,
									email,
									objet,
									date
								FROM
									contact
								WHERE
									repondu = 0
								ORDER BY
									date');
								
		$i = 0;
		//affichage des résultats
		while($donnees = $reponse->fetch())
		{
			//on compte les messages
			$i++;
			?>
			<fieldset>
				<p><strong>Mandator :</strong> <?php echo htmlspecialchars($donnees['email']) ; ?><br />
				<strong>Objecte :</strong> <?php echo htmlspecialchars($donnees['objet']) ; ?><br />
				<strong>Data :</strong> <?php echo htmlspecialchars($donnees['date']) ; ?></p>
				<a href="afficheMessage.php?idMessage=<?php echo htmlspecialchars($donnees['id']) ; ?>" ><button type="button" >Veire lo messatge</button></a>
			
			</fieldset>
			<?php
		}
		if($i==0)
		{
			echo '
			<fieldset><p><strong>Pas cap de messatges novèls</strong></p></fieldset>';
		}
		
		?>
		</div>
	</body>
</html>
<?php
}
else
{
	header("Location: logout.php");
	exit();
}

?>
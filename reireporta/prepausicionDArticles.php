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
        <title>Prepausicions d'articles</title>
    </head>

    <body>
		<?php include('nav.php'); ?>
		
		<div class="corps">
			<h2>Prepausicions d'articles</h2>
			<p>Aquì las prepausicions d'articles mandadas pels utilisators.</p>
			<p>Podètz acceptar on refusar un article aqui directament. Se n'acceptatz un, serà mes a jorn automaticamant sul site. Se ne refusatz un pensatz de mandar un mail a l'autor per li dire la rason del refus (que sèm pas de bèstias).</p>
		
		<?php
		include('coBDD.php');
		
		//requete sql
		$reponse = $bdd->query('SELECT
									id,
									titre,
									auteur,
									email,
									date
								FROM
									proparticle');
		
		$i = 0;
		
		while($donnees = $reponse->fetch())
		{
			//on compte les articles affichés
			$i++;
			//presentation des articles
			?>
			<fieldset>
				<p><strong>Titol :</strong> <?php echo htmlspecialchars($donnees['titre']); ?><br />
				<strong>Autor :</strong> <?php echo htmlspecialchars($donnees['auteur']); ?><br />
				<strong>Adreiça e-mail :</strong> <?php echo htmlspecialchars($donnees['email']); ?><br />
				<strong>Data :</strong> <?php echo htmlspecialchars($donnees['date']); ?></p>
				<a href="afficheArticle.php?idArticle=<?php echo htmlspecialchars($donnees['id']); ?>" ><button type="button" >Veire l'article</button></a>
			</fieldset>
			<?php
		}
		
		if($i==0)
		{
			echo '<fieldset><p><strong>Pas cap de prepausicions d\'articles per ara</strong></p></fieldset>';
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
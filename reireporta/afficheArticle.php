<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] == 'administrator')
{
	if(isset($_GET['idArticle']))
	{
		?>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="scriptReirePorta.css" />
		<link href="images/s-l30.jpg" rel="shortcut icon" />
        <title>Prepausicions d'articles</title>
    </head>

    <body>		
		<?php
		include('nav.php');
		?>
		<div class="corps">
		<?php
		include('coBDD.php');
		
		//récupération de l'article
		$response = $bdd->query('SELECT
									titre,
									auteur,
									email,
									date,
									texte
								FROM
									proparticle
								WHERE
									id = '.$_GET['idArticle']);
		
		//affichage de l'article
		while($donnees = $response->fetch())
		{
		//on récupère les champs dans session
		$_SESSION['article']=array(
								'titre' => $donnees['titre'],
								'auteur' => $donnees['auteur'],
								'date' => $donnees['date'],
								'texte' => $donnees['texte']
								);
		
		?>
			<fieldset>
				<h2>Titol : <?php echo htmlspecialchars($donnees['titre']); ?></h2>
				<p>
					<strong>Autor :</strong> <?php echo htmlspecialchars($donnees['auteur']); ?><br />
					<strong>E-mail :</strong> <?php echo htmlspecialchars($donnees['email']); ?><br />
					<strong>Data :</strong> <?php echo htmlspecialchars($donnees['date']); ?>
				</p>
				<p><?php echo nl2br(htmlspecialchars($donnees['texte'])); ?></p>
				<?php 
				//si accepté
				if(isset($_POST['accepte']) && $_POST['accepte'] == 1)
				{
					echo '<p class="confirme" >L\'article foguèt acceptat</p>'; 
				}
				//sinon si refusé
				elseif(isset($_POST['refus']) && $_POST['refus'] == 1)
				{
					echo '<p class="erreur" >L\'article foguèt refusat, pensatz de mandar un mail a l\'autor per li dire la rason del refus !</p>';
				}
				else
				{
				//sinon on affiche les bouttons ?>
				<form action="afficheArticle.php?idArticle=<?php echo $_GET['idArticle']; ?>" method="post">
					<button type="submit">Validar aquel article</button>
					<input type="hidden" name="accepte" value="1" />
				</form>
				<form action="afficheArticle.php?idArticle=<?php echo $_GET['idArticle']; ?>" method="post">
					<button type="submit">Refusar aquel article</button>
					<input type="hidden" name="refus" value="1" />
				</form>
				<?php
				}
				?>
				<br />
				<br />
				<a href="admin.php?idPage=2" ><button type="button" >Retorn a la tièra de prepausicions d'articles</button></a>
			</fieldset>
		<?php
		}	
		
		//si accepté
		if(isset($_POST['accepte']) && $_POST['accepte'] == 1)
		{
			//on enregistre dans article
			$req = $bdd->prepare('INSERT INTO
										article(
											titre,
											auteur,
											date,
											texte)
										VALUES(
											:titre,
											:auteur,
											:date,
											:texte
											)');
				
			$req->execute(array(
			'titre' => $_SESSION['article']['titre'],
			'auteur' => $_SESSION['article']['auteur'],
			'date' => $_SESSION['article']['date'],
			'texte' => $_SESSION['article']['texte']
			));
			
			//on supprime de proparticle
			$req = $bdd->prepare('DELETE FROM
										proparticle
									WHERE
										id = :id');
										
			$req->execute(array(
			'id' => $_GET['idArticle']
			));
		}
		//si refusé
		if(isset($_POST['refus']) && $_POST['refus'] == 1)
		{
			//on supprime de proparticle
			$req = $bdd->prepare('DELETE FROM
										proparticle
									WHERE
										id = :id');
										
			$req->execute(array(
			'id' => $_GET['idArticle']
			));
		}
		?>
		</div>
	</body>
</html>
		<?php	
	}
	else
	{
		include('prepausicionDArticles.php');
	}
}
else
{
	header("Location: logout.php");
	exit();
}
?>
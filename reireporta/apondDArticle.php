<?php
if(isset($_SESSION['login']) && $_SESSION['login'] == 'administrator')
{
	//si un article a été envoyé
	if(isset($_POST['sent']) && $_POST['sent'] == 1)
	{
		if(isset($_POST['auteur']) && isset($_POST['titre']) && isset($_POST['texte']))
		{
			//on vérifie les espaces a la fin des variable
			while (substr($_POST['auteur'],-1) == ' ') {
					$_POST['auteur'] = substr($_POST['auteur'],0,-1);
			}
			while (substr($_POST['titre'],-1) == ' ') {
					$_POST['titre'] = substr($_POST['titre'],0,-1);
			}
			while (substr($_POST['texte'],-1) == ' ') {
					$_POST['texte'] = substr($_POST['texte'],0,-1);
			}
			
			if($_POST['auteur'] != '' && $_POST['titre'] != '' && $_POST['texte'] != '')
			{
				//on récupère la date
				$datetime = date('Y-m-d H:i:s');
				
				include('coBDD.php') ;
				
				//requete sql insert into
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
												:texte)');
												
				$req->execute(array(
				'titre' => $_POST['titre'],
				'auteur' => $_POST['auteur'],
				'date' => $datetime,
				'texte' => $_POST['texte']
				));
				
				$message = '<p class="confirme" ><b>L\'article foguèt plan mandat ! òsca !</b></p>' ;
			}
			else
			{
				$message = '<p class="erreur" ><b>Error :</b> Mèrces d\'emplener cada seccions del formulari</p>' ;
			}
		}
		else
		{
			$message = '<p class="erreur" ><b>Error :</b> Mèrces d\'emplener cada seccions del formulari</p>' ;
		}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="scriptReirePorta.css" />
		<link href="images/s-l30.jpg" rel="shortcut icon" />
        <title>Apondre un article</title>
    </head>

    <body>
		<?php include('nav.php'); ?>
		
		<div class="corps">
			<h2>Apondre un article</h2>
			<p>
			Per apondre un article mercès d'emplener lo formulari seguènt. Mèfi que la sola possibilitat de faire de mèsa en pagina es de la faire dins la zona de texte amb
			d'espacis e de retorns a la linha.
			</p>
			
			<div>
				<fieldset>
				<?php 
				if(isset($message))
				{
					echo $message ;
				}
				?>
					<form action="admin.php?idPage=6" method="post">
						<label for="auteur" >Nom d'autor : </label>
						<input type="text" name="auteur" id="auteur" <?php if(isset($_POST['auteur'])){ echo 'value="' . htmlspecialchars($_POST['auteur']) .'"';} ?> />
						
						<hr />
						
						<label for="titre" >Titol de l'article : </label>
						<input type="text" name="titre" id="titre" <?php if(isset($_POST['titre'])){ echo 'value="' . htmlspecialchars($_POST['titre']) .'"';} ?> />
						
						<p>
							<textarea name="texte" id ="texte" rows="10" cols="160" placeholder="Vòstre article"><?php if(isset($_POST['texte'])){ echo htmlspecialchars($_POST['texte']);} ?></textarea>
						</p>
						
						<div>
							<button type="submit">Mandar vòstre article</button>
						</div>
						
						<input type="hidden" name="sent" value="1" />
					</form>
				</fieldset>
			</div>
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
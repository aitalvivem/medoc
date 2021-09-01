<?php
if(isset($_SESSION['login']) && $_SESSION['login'] == 'administrator')
{
	//traitement du formulaire
	if(isset($_POST['sent']) && $_POST['sent'] == 1)
	{
		//on vérifie que les varibles existent
		if(isset($_POST['nom']) && isset($_POST['alt']) && isset($_FILES['nouvellePhoto']))
		{
			//on vérifie les espaces a la fin des variable
			while (substr($_POST['nom'],-1) == ' ') {
					$_POST['nom'] = substr($_POST['nom'],0,-1);
			}
			while (substr($_POST['alt'],-1) == ' ') {
					$_POST['alt'] = substr($_POST['alt'],0,-1);
			}
			
			//on vérifie que les variables ne soient pas vides et qu'il n'y ait pas d'erreurs
			if($_POST['nom'] != '' && $_POST['alt'] != '' && $_FILES['nouvellePhoto']['error'] == 0)
			{
				//on vérifie la taille du fichier
				if($_FILES['nouvellePhoto']['size'] <= 2000000)
				{
					//on récupère l'extension du fichier
					$infoFichier = pathinfo($_FILES['nouvellePhoto']['name']);
					$extension_upload = $infoFichier['extension'];
					
					//les extensions autorisées
					$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
					
					//on vérifie l'extension du fichier
					if (in_array($extension_upload, $extensions_autorisees))
					{
						//on génère un nom random
						$nom = md5(uniqid(rand(), true));
						$nom = $nom.'.'.$extension_upload;
						
						//on envoie le fichier
						$resultat = move_uploaded_file($_FILES['nouvellePhoto']['tmp_name'], '../images/galerie/'.$nom);
						
						//si le fichier a été envoyé
						if($resultat)
						{
							include('coBDD.php') ;
							//ajout du fichier dans la bdd
							$req = $bdd->prepare('INSERT INTO
														galerie(
															nom,
															photo,
															alt)
														VALUES(
															:nom,
															:photo,
															:alt)');
							
							$req->execute(array(
							'nom' => $_POST['nom'],
							'photo' => $nom,
							'alt' => $_POST['alt']
							));
							
							$message = '<p class="confirme" ><b>La fòto foguèt plan mandada</b></p>' ;
						}
						else
						{
							$message = '<p class="erreur" ><b>Error :</b> dins l\'upload de la fòto, merces de tornar ensajar</p>' ;
						}
					}
					else
					{
						$message = '<p class="erreur" ><b>Error :</b> l\'extension dau fichier es pas valide</p>' ;
					}					
				}
				else
				{
					$message = '<p class="erreur" ><b>Error :</b> la fòto es tròp gròssa</p>' ;
				}
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
        <title>Apondre una fòto</title>
    </head>

    <body>
		<?php include('nav.php'); ?>
		
		<div class="corps">
			<h2>Apondre una fòto</h2>
			<p>
			Per apondre una fòto a la galeria avètz pas que d'emplener aqueste fomulari. Pensatz d'entresenhar lo titol de la fòto (que s'afficharà al passatge de la mirgeta sus la
			fòto, e lo messatge alternatiu (messatge que s'afficharà se la fòto se pòs pas cargar).
			</p>
			<p>
			La fòto dèu pas faire mai d'1Go e lo formats autorisats son : jpg, jepg, png e gif.
			</p>
			<div>
				<fieldset>
					<?php
					//afficher le message si y en a un
					if(isset($message))
					{
						echo $message ;
					}
					?>
					<form action="admin.php?idPage=5" method="post" enctype="multipart/form-data">
						<table>
							<tr>
								<td><label for="nom" >Titol de la fòto : </label></td>
								<td><input type="text" name="nom" id="nom" <?php if(isset($_POST['nom'])){ echo 'value="'.htmlspecialchars($_POST['nom']).'"' ; } ?>/></td>
							</tr>
							<tr>
								<td><label for="alt" >Messatge alternatiu : </label></td>
								<td><input type="text" name="alt" id="alt" <?php if(isset($_POST['alt'])){ echo 'value="'.htmlspecialchars($_POST['alt']).'"' ; } ?>/></td>
							</tr>
							<tr>
								<td><label for="nouvellePhoto" >La fòto : </label></td>
								<td><input type="file" name="nouvellePhoto" /></td>
							</tr>
						</table>
						
						<input type="hidden" name="sent" value="1" />
						<br />
						
						<div>
							<button type="submit" >Mandar la fòto</button>
						</div>
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
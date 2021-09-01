<?php
if(isset($_SESSION['login']) && $_SESSION['login'] == 'administrator')
{	
	//traitement du formulaire
	if(isset($_POST['sent']))
	{
		//on vérifie l'existence des données
		if(isset($_POST['titre']) && isset($_POST['lieu']) && isset($_POST['organisateur']) && isset($_POST['jour']) && isset($_POST['mois']) && isset($_POST['annee']) && isset($_POST['heure']) && isset($_POST['minute']) && isset($_POST['description']) && isset($_FILES['affiche']))
		{
			//on vérifie les espaces a la fin des variable
			while (substr($_POST['titre'],-1) == ' ') {
					$_POST['titre'] = substr($_POST['titre'],0,-1);
			}
			while (substr($_POST['lieu'],-1) == ' ') {
					$_POST['lieu'] = substr($_POST['lieu'],0,-1);
			}
			while (substr($_POST['organisateur'],-1) == ' ') {
					$_POST['organisateur'] = substr($_POST['organisateur'],0,-1);
			}
			while (substr($_POST['description'],-1) == ' ') {
					$_POST['description'] = substr($_POST['description'],0,-1);
			}
			
			//idem pour lien si il existe
			if(isset($_POST['lien']))
			{
				while (substr($_POST['lien'],-1) == ' ') {
					$_POST['lien'] = substr($_POST['lien'],0,-1);
				}
			}
			
			//on vérifie que les variables ne soient pas vides et qu'il n'y ait pas d'erreurs
			if($_POST['titre'] != '' && $_POST['lieu'] != '' && $_POST['organisateur'] != '' && $_POST['description'] != '' && $_FILES['affiche']['error'] == 0)
			{
				//on vérifie la taille du fichier
				if($_FILES['affiche']['size'] <= 2000000)
				{
					//on récupère l'extension du fichier
					$infoFichier = pathinfo($_FILES['affiche']['name']);
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
						$resultat = move_uploaded_file($_FILES['affiche']['tmp_name'], '../images/events/'.$nom);
						
						//si le fichier a été envoyé
						if($resultat)
						{
							//on construit la date
							$annee = (string) $_POST['annee'];
							$mois = (string) $_POST['mois'];
							$jour = (string) $_POST['jour'];
							$heure = (string) $_POST['heure'];
							if($_POST['minute'] < 10)
							{
								$minute = (string) $_POST['minute'];
								$minute = '0'.$minute;
							}
							else
							{
								$minute = (string) $_POST['minute'];
							}
							$datetime = $annee.'-'.$mois.'-'.$jour.' '.$heure.':'.$minute.':00' ;
							
							include('coBDD.php');
							
							if(isset($_POST['lien']))
							{
								//requete sql
								$req = $bdd->prepare('INSERT INTO
															evenements(
																titre,
																date,
																lieux,
																description,
																photo,
																organisateurs,
																lienFB)
															VALUES(
																:titre,
																:date,
																:lieux,
																:description,
																:photo,
																:organisateurs,
																:lienFB)');
																
								$req->execute(array(
								'titre' => $_POST['titre'],
								'date' => $datetime,
								'lieux' => $_POST['lieu'],
								'description' => $_POST['description'],
								'photo' => $nom,
								'organisateurs' => $_POST['organisateur'],
								'lienFB' => $_POST['lien']
								));
							}
							else
							{
								//requete sql
								$req = $bdd->prepare('INSERT INTO
															evenements(
																titre,
																date,
																lieux,
																description,
																photo,
																organisateurs)
															VALUES(
																:titre,
																:date,
																:lieux,
																:description,
																:photo,
																:organisateurs)');
																
								$req->execute(array(
								'titre' => $_POST['titre'],
								'date' => $datetime,
								'lieux' => $_POST['lieu'],
								'description' => $_POST['description'],
								'photo' => $nom,
								'organisateurs' => $_POST['organisateur']
								));
							}
							
							$message = '<p class="confirme" ><b>L\'eveniment foguèt plan creat</b></p>' ;
						}
						else
						{
							$message = '<p class="erreur" ><b>Error :</b> Error dins l\'upload de la fòto, merces de tornar ensajar</p>' ;
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
				$message = '<p class="erreur" ><b>Error :</b> Mèrces d\'emplener cada seccions del formulari (lo ligam FB es facultatiu)</p>' ;
			}
		}
		else
		{
			$message = '<p class="erreur" ><b>Error :</b> Mèrces d\'emplener cada seccions del formulari (lo ligam FB es facultatiu)</p>' ;
		}
	}
	
	//formulaire
	?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="scriptReirePorta.css" />
		<link href="images/s-l30.jpg" rel="shortcut icon" />
        <title>Apondre un eveniment</title>
    </head>

    <body>
		<?php include('nav.php'); ?>
		
		<div class="corps">
			<h2>Apondre un eveniment</h2>
			<p>
			Per apondre un eveniment i a pas que d'emplener aquel formulari.</p>
			<p>
			Lo ligam per l'eveniment Facebook es pas obligatòria mentre que los autres camps o son. Mas pas de lagui, se sètz pas segur d'una informacion
			aurètz totjorn la possibilitat de la modificar mai tard dins la seccion "Modificar un eveniment".
			</p>
			<p>
			Per la descripcion de l'eveniment la sola possibilitat de faire de mèsa en pagina es de la faire dins la zona de texte amb
			d'espacis e de retorns a la linha. Es pas gaire polit mas pòdi pas faire mai (e es çò parièr sus FB :p).
			</p>
			
			<div>
				<fieldset>
					<?php if(isset($message)) echo $message ; ?>
					<form action="admin.php?idPage=3" method="post" enctype="multipart/form-data" >
						<table>
							<tr>
								<td><label for="titre">Titol de l'eveniment : </label></td>
								<td><input type="text" name="titre" id="titre" <?php if(isset($_POST['titre'])){ echo 'value="' . htmlspecialchars($_POST['titre']) .'"';} ?> /></td>
							</tr>
							<tr>
								<td><label for="lieu">Luòc : </label></td>
								<td><input type="text" name="lieu" id="lieu" <?php if(isset($_POST['lieu'])){ echo 'value="' . htmlspecialchars($_POST['lieu']) .'"';} ?> /></td>
							</tr>
							<tr>
								<td><label for="organisateur">Organisator : </label></td>
								<td><input type="text" name="organisateur" id="organisateur" <?php if(isset($_POST['organisateur'])){ echo 'value="' . htmlspecialchars($_POST['organisateur']) .'"';} ?> /></td>
							</tr>
							<tr>
								<td><label for="lien">Ligam de l'eveniment FB : </label></td>
								<td><input type="text" name="lien" id="lien" <?php if(isset($_POST['lien'])){ echo 'value="' . htmlspecialchars($_POST['lien']) .'"';} ?> /></td>
							</tr>
							<tr>
								<td><label for="affiche">Aficha de l'eveniment : </label></td>
								<td><input type="file" name="affiche" /></td>
							</tr>
						</table>
						<p>
							Date : 
							<select name="jour" >
							<?php 
							for($i=1; $i<32; $i++)
							{
								echo '<option value="'.$i.'"';
								if(isset($_POST['jour']) && $_POST['jour'] == $i)
								{
									echo ' selected ';
								}
								elseif(date('j') == $i)
								{
									echo ' selected ';
								}
								echo '>'.$i.'</option>';
							}
							?>
							</select>
							<select name="mois" >
								<option value="1" <?php if(isset($_POST['mois']) && $_POST['mois'] == $i){ echo ' selected' ; }elseif(date('n') == 1){ echo 'selected' ; } ?> >Genièr</option>
								<option value="2" <?php if(isset($_POST['mois']) && $_POST['mois'] == $i){ echo ' selected' ; }elseif(date('n') == 2){ echo 'selected' ; } ?> >Febrièr</option>
								<option value="3" <?php if(isset($_POST['mois']) && $_POST['mois'] == $i){ echo ' selected' ; }elseif(date('n') == 3){ echo 'selected' ; } ?> >Març</option>
								<option value="4" <?php if(isset($_POST['mois']) && $_POST['mois'] == $i){ echo ' selected' ; }elseif(date('n') == 4){ echo 'selected' ; } ?> >Abrial</option>
								<option value="5" <?php if(isset($_POST['mois']) && $_POST['mois'] == $i){ echo ' selected' ; }elseif(date('n') == 5){ echo 'selected' ; } ?> >Mai</option>
								<option value="6" <?php if(isset($_POST['mois']) && $_POST['mois'] == $i){ echo ' selected' ; }elseif(date('n') == 6){ echo 'selected' ; } ?> >Junh</option>
								<option value="7" <?php if(isset($_POST['mois']) && $_POST['mois'] == $i){ echo ' selected' ; }elseif(date('n') == 7){ echo 'selected' ; } ?> >Julh</option>
								<option value="8" <?php if(isset($_POST['mois']) && $_POST['mois'] == $i){ echo ' selected' ; }elseif(date('n') == 8){ echo 'selected' ; } ?> >Agost</option>
								<option value="9" <?php if(isset($_POST['mois']) && $_POST['mois'] == $i){ echo ' selected' ; }elseif(date('n') == 9){ echo 'selected' ; } ?> >Setembre</option>
								<option value="10" <?php if(isset($_POST['mois']) && $_POST['mois'] == $i){ echo ' selected' ; }elseif(date('n') == 10){ echo 'selected' ; } ?> >Octòbre</option>
								<option value="11" <?php if(isset($_POST['mois']) && $_POST['mois'] == $i){ echo ' selected' ; }elseif(date('n') == 11){ echo 'selected' ; } ?> >Novembre</option>
								<option value="12" <?php if(isset($_POST['mois']) && $_POST['mois'] == $i){ echo ' selected' ; }elseif(date('n') == 12){ echo 'selected' ; } ?> >Decembre</option>
							</select>
							<select name="annee" >
							<?php 
							for($i=1999; $i<2101; $i++)
							{
								echo '<option value="'.$i.'"';
								if(isset($_POST['annee']) && $_POST['annee'] == $i)
								{
									echo ' selected ';
								}
								elseif(date('Y') == $i)
								{
									echo ' selected ';
								}
								echo '>'.$i.'</option>';
							}
							?>
							</select>
							<br /><br />
							Ora : 
							<select name="heure" >
							<?php 
							for($i=1; $i<=24; $i++)
							{
								echo '<option value="'.$i.'"';
								if(isset($_POST['heure']) && $_POST['heure'] == $i){ echo ' selected' ; }
								echo '>'.$i.'</option>';
							}
							?>
							</select>
							h
							<select name="minute"> 
							<?php 
							for($i=0; $i<=60; $i++)
							{		
								echo '<option value="'.$i.'"';
								if(isset($_POST['minute']) && $_POST['minute'] == $i){ echo ' selected' ; }
								echo '>';
								if($i < 10) echo '0';
								echo $i.'</option>';
							}
							?>
							</select>
						</p>
						<hr />
						
						<p>
							Descripcion de l'eveniment :<br />
							<textarea name="description" id ="description" rows="10" cols="150" placeholder="Vòstre article"><?php if(isset($_POST['description'])){ echo htmlspecialchars($_POST['description']);} ?></textarea>
						</p>
						
						<div>
							<button type="submit" >Crear l'eveniment</button>
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
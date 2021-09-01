<?php
if(isset($_SESSION['login']) && $_SESSION['login'] == 'administrator')
{
	include('coBDD.php');
	
	?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="scriptReirePorta.css" />
		<link href="images/s-l30.jpg" rel="shortcut icon" />
        <title>Modificar un eveniment</title>
    </head>

    <body>
		<?php include('nav.php'); ?>
		
		<div class="corps">
			<h2>Modificar un eveniment</h2>
	<?php
	//si des modif ont été envoyées
	if(isset($_POST['sent']) && $_POST['sent'] == 1)
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
		
		//on vérifie les données
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
		
		//requete UPDATE
		$req = $bdd->prepare('UPDATE
								evenements
							SET
								titre = :titre,
								date = :date,
								lieux = :lieux,
								description = :description,
								organisateurs = :organisateurs,
								lienFB = :lienFB
							WHERE 
								id = '.$_POST['idEvent']);
									
		$req->execute(array(
		'titre' => $_POST['titre'],
		'date' => $datetime,
		'lieux' => $_POST['lieu'],
		'description' => $_POST['description'],
		'organisateurs' => $_POST['organisateur'],
		'lienFB' => $_POST['lien']
		));
		
		//message confirmation/erreur
		$message = '<p class="confirme" ><b>L\'eveniment foguèt plan modificat </b></p>' ;
		
		//requete spéciale pour l'affiche
		if(isset($_FILES['affiche']) && $_FILES['affiche']['name'] != '')
		{
			if($_FILES['affiche']['error'] == 0)
			{
				//on vérifie la taille du fichier
				if($_FILES['affiche']['size'] <= 1000000)
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
							$req2 = $bdd->prepare('UPDATE
													evenements
												SET
													photo = :photo
												WHERE 
													id = '.$_POST['idEvent']);
													
							$req2->execute(array(
							'photo' => $nom
							));
							
							$message = '<p class="confirme" ><b>L\'eveniment foguèt plan modificat !</b></p>' ;
						}
						else
						{
							$message = '<p class="erreur" ><b>Error :</b>error dins l\'upload de la fòto, merces de tornar ensajar</p>' ;
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
				$message = '<p class="erreur" ><b>Error :</b> error dins l\'upload de la fòto, merces de tornar ensajar</p>' ;
			}
		}
	}
	
	if(isset($_POST['idEvent']))
	{
		//requete SELECT qui recupère l'evenement
		$reponse = $bdd->query('SELECT
									id,
									titre,
									DAY(date) AS jour, 
									MONTH(date) AS mois, 
									YEAR(date) AS annee, 
									HOUR(date) AS heure, 
									MINUTE(date) AS minute, 
									lieux, 
									description, 
									photo, 
									organisateurs, 
									lienFB 
								FROM 
									Evenements 
								WHERE 
									ID = '.$_POST['idEvent']);
		
		//le form de modification de l'event
		while($donnees = $reponse->fetch())
		{
			include('formEvent.php') ;
		}
	}
	else
	{
		//affichage de la liste déroulante
		//on récupère les infos
		$day = date('d');
		$month = date('m');
		$year = date('Y');
		
		$reponse = $bdd->query('SELECT
								id,
								titre
							FROM
								evenements
							WHERE
								YEAR(date) > '.$year.' OR
								(YEAR(date) = '.$year.' AND MONTH(date) > '.$month.') OR
								(YEAR(date) = '.$year.' AND MONTH(date) = '.$month.' AND DAY(date) >= '.$day.')'
							);
		
		//mise en page
	?>
			<fieldset>
				<form action="admin.php?idPage=4.php" method="post" >
					<label for="idEvent" >Causissètz l'eveniment de modificar : </label>
					<select name="idEvent" >
	<?php
		while($donnees = $reponse->fetch())
		{
				echo '<option value="'.$donnees['id'].'" >'.$donnees['titre'].'</option>
				' ;
		}
		$reponse->closeCursor();
	
			?>
					</select>
					<br />
					<div>
						<button type="submit" >Modificar aqueste eveniment</button>
					</div>
				</form>
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
	header("Location: logout.php");
	exit();
}
?>
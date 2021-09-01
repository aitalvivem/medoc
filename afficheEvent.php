<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="scriptMedoc.css" />
                <link href="images/s-l30.jpg" rel="shortcut icon" >
                <?php if(isset($_GET['langue']) && $_GET['langue'] == 'fr'){?>
                        <title>Evénements</title><?php
                }else{?>
                        <title>Eveniments</title><?php
                }?>
        </head>
                        
        <body>
			<?php //la navigation spéciale qui concerve l'id de l'event lors du changement de langue ?>
			<header id="ancre">
				<div class="cadreLangues" >
					<div class="drapeaux" >
						<div class="langue" >
							<a href="?langue=fr&id=<?php echo $_GET['id'] ?>#ancre" ><img src="images/drapeauFr.jpg" alt="drapeau français" title="Site en Français"/></a>
						</div>
							<div class="langue" >
							<a href="?langue=oc&id=<?php echo $_GET['id'] ?>#ancre" ><img src="images/drapeauOc.jpg" alt="drapeau occitan" title="Site en Occitan"/></a>
						</div>
					</div>
				</div>

				<img src="images/logo.jpg" alt="photo" title="Med'òc dau Clapàs" />
				<nav>
					<ul>
						<?php if(isset($_GET['langue']) && $_GET['langue'] == 'fr'){?>
						<li><a href="index.php?langue=fr" >Accueil</a></li>
						<li><a href="presentation.php?langue=fr" >Présentation</a></li>
						<li><a href="events.php?langue=fr" >Evénements</a></li>
						<li><a href="photo.php?langue=fr" >Photos</a></li>
						<li><a href="articles.php?langue=fr" >Articles</a></li>
						<li><a href="contact.php?langue=fr" >Contacts</a></li><?php
						}else {?>
						<li><a href="index.php" >Accuelh</a></li>
						<li><a href="presentation.php" >Presentacion</a></li>
						<li><a href="events.php" >Eveniments</a></li>
						<li><a href="photo.php" >Fòtos</a></li>
						<li><a href="articles.php" >Articles</a></li>
						<li><a href="contact.php" >Contacts</a></li><?php
						}?>
					</ul>
				<nav>    
			</header>
			
			<?php
			
			include('coBDD.php') ;
			
			//on récupère l'id de l'evenement
			$idevent = $_GET['id'] ;
			
			//on fait la requete sql pour l'évenement à afficher
			$reponse = $bdd->query('SELECT 
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
										ID = '.$idevent.' ');
			?>
		        <div class="contenneurEvent">
			<?php
			while ($donnees = $reponse->fetch())
			{
				// on affiche l'event
				if(isset($_GET['langue']) && $_GET['langue'] == 'fr' ) {
					include('event.php') ;
				}else{
					include('eventOc.php') ;
				}
			}
			?>
			</div>
		</body>
</html>

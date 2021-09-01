<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="scriptMedoc.css" />
                <link href="images/s-l30.jpg" rel="shortcut icon" >
                <title>Article</title>
        </head>
        
        <body>
			<?php //navigation spéciale qui concerve l'id de l'article lors du changement de langue ?>
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
                
			<div class="corpsArticles">
			
					<?php 
					
					//connexion à la BDD
					include('coBDD.php') ;
					
					$idarticle = $_GET['id'];
					
					$reponse = $bdd->query('SELECT 
												ID, 
												titre, 
												DAY(date) AS jour, 
												MONTH(date) AS mois, 
												YEAR(date) AS annee, 
												HOUR(date) AS heure, 
												MINUTE(date) AS minute, 
												auteur, 
												texte 
											FROM 
												article 
											WHERE 
												ID = '.$idarticle.'');
					
					while ($donnees = $reponse->fetch()) {
							if(isset($_GET['langue']) && $_GET['langue'] == 'fr') { ?>
									<div class="presentationArticle">
											<h3><?php echo htmlspecialchars($donnees['titre']); ?></h3>
											<p>Publié par <strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <strong><?php echo htmlspecialchars($donnees['jour']).'/'.htmlspecialchars($donnees['mois']).'/'.htmlspecialchars($donnees['annee']).'</strong> à <strong>'.htmlspecialchars($donnees['heure']).'h';
											if($donnees['minute']<10){ echo '0';}
											echo htmlspecialchars($donnees['minute']).'.'; ?></strong>
											<a href="articles.php?langue=fr" id="retourTop" >Retour à la liste des articles</a></p>
									</div>
									<article>
											<p><?php echo nl2br(htmlspecialchars($donnees['texte'])); ?></p>
											<div>
													<a href="?langue=fr&id=<?php echo $_GET['id'] ?>#" >Retour en haut de la page</a>
													<a href="articles.php?langue=fr" >Retour à la liste des articles</a>
											</div>
									</article>                                          
							<?php }else{ ?>
									<div class="presentationArticle">
											<h3><?php echo htmlspecialchars($donnees['titre']); ?></h3>
											<p>Publicat per <strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> lo <strong><?php echo htmlspecialchars($donnees['jour']).'/'.htmlspecialchars($donnees['mois']).'/'.htmlspecialchars($donnees['annee']).'</strong> a <strong>'.htmlspecialchars($donnees['heure']).'h';
											if($donnees['minute']<10){ echo '0';}
											echo htmlspecialchars($donnees['minute']).'.'; ?></strong>
											<a href="articles.php" id="retourTop" >Retorn a la tièra d'articles</a></p>
									</div>
									<article class="textArt">
											<p><?php echo nl2br(htmlspecialchars($donnees['texte'])); ?></p>
											<div>
													<a href="?langue=oc&id=<?php echo $_GET['id'] ?>#">Retorn en naut de pagina</a>
													<a href="articles.php?langue=oc">Retorn a la tièra d'articles</a>
											</div>
									</article>										
							<?php } 
					} ?>
			</div>
        </body>
</html>

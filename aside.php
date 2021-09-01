<aside>
        <div class="info">
			<a href="https://www.facebook.com/medoc.dauclapas/" target="_blank"><img src="images/200px-Facebook_logo_(square).png" title="Facebook Med'òc dau Clapàs" alt="Facebook"/></a>
			<?php if(isset($_GET['langue']) && $_GET['langue'] == 'fr'){?>
				<h2>Infos pratiques :</h2>
				<p><br /><B>Adresse e-mail :</B> medoc_montpelhier@yahoo.com<br /><br />
				<B>Adresse postale :</B>
				<br />Local 101
				<br />Maison des Etudiants,
				<br />Université Paul Valéry - Montpellier III, 
				<br />Route de Mende, 34000 Montpellier</Br>
				</p>
				<h3 class="centre"><a href="contact.php?langue=fr">Nous contacter</a></h3><?php
			}else{?>
				<h2>Infos practicas :</h2>
				<p><br /><B>Adreiça e-mail :</B> medoc_montpelhier@yahoo.com<br /><br />
				<B>Adreiça postala :</B>
				<br />Local 101
				<br />Maison des Etudiants,
				<br />Université Paul Valéry - Montpellier III, 
				<br />Route de Mende, 34000 Montpellier</Br>
				</p>
				<h3 class="centre"><a href="contact.php">Nos contactar</a></h3><?php
	        }?>
        </div>

        <div class="nextEvent"><?php
				//connexion à la BDD
                include('coBDD.php') ;
				
				$day = date("d");
				$month = date("m");
				$year = date("Y");

                $reponse = $bdd->query('SELECT 
											ID,
											titre, 
											DAY(date) AS jour, 
											MONTH(date) AS mois, 
											YEAR(date) AS annee, 
											HOUR(date) AS heure, 
											MINUTE(date) AS minute, 
											lieux 
										FROM 
											Evenements 
										WHERE
											YEAR(date) > '.$year.' OR
											(YEAR(date) = '.$year.' AND MONTH(date) > '.$month.') OR
											(YEAR(date) = '.$year.' AND MONTH(date) = '.$month.' AND DAY(date) >= '.$day.')
										ORDER BY 
											date 
										LIMIT 2');

                if(isset($_GET['langue']) && $_GET['langue'] == 'fr'){
                        echo'<h2>Evénements à venir :</h2>';
                }else{
                        echo'<h2>Eveniments de venir :</h2>';
                }
				
				$i=0;
				
                while ($donnees = $reponse->fetch())
                {
					$i++;
					include('nextEvent.php');
                }           
				if($i==0){			//a mettre en page
					if(isset($_GET['langue']) && $_GET['langue']=='fr'){ ?>
							<div class="pasDEvent">
									<p>Malheureusement il n'y a pas d'événements à venir. Mais faites attention, d'autres serons bientôt prévus !</p>
							</div>
					<?php }else{ ?>
							<div class="pasDEvent">
									<p>Malorosament i a pas d'eveniments a venir. Mas mèfi que d'autras seràn lèu previstes !</p>
							</div>
					<?php }
				}
                $reponse->closeCursor();
				
				if(isset($_GET['langue']) && $_GET['langue']=='fr'){ ?>
					<h3 class="centre"><a href="events.php?langue=fr" />Liste des événements</a></h3>
				<?php }else{ ?>
					<h3 class="centre"><a href="events.php" />Tièra dels eveniments</a></h3>
				<?php } ?>
        </div>
</aside>

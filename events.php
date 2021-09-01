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
                <?php include('navigation.php') ; ?>
                
                <div class="corpsEvent" > 
                
					<?php

					//connexion à la BDD
					include('coBDD.php') ;
					
					//on récupère la date actuelle
					$day = date('d');
					$month = date('m');
					$year = date('Y');

					//la requete pour les shortEvent
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
								LIMIT 20 ');
					
					if(isset($_GET['langue']) && $_GET['langue'] == 'fr'){
							echo'<p>Dans cette section vous trouverez les informations (date, lieu, horaires et description de l\'évènement) concernant les prochains événements organisés par l\'association. On espère vous y voir nombreux, alors venez avec vos amis, vos parents et même la belle mère!</p>';
					}else{
							echo'<p>Dins aquesta seccion traparètz las informacions (data, luòc, oraris e description de l\'eveniment) que concernan los eveniments a venir organisats per l\'associacion. Esperam vos i veire nombroses o, coma se ditz, venètz banda de muscles !</p>';

					}
						
					//on initialise i pour compter le nb d'events affichés
					$i=0;
						
					while ($donnees = $reponse->fetch())
					{
						include('shortEvent.php');
						//on compte le nombre d'évènements affichés
						$i=$i+1;
					}                        
					$reponse->closeCursor();
						
					//si aucun événement est affiché on met un message pour prévenir
					if($i==0){
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
					?> 
                </div>        
        </body>
</html>

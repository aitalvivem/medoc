<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="scriptMedoc.css" />
                <link href="images/s-l30.jpg" rel="shortcut icon" > 
                <?php if(isset($_GET['langue']) && $_GET['langue'] == 'fr'){?>
                        <title>Photos</title><?php
                }else{?>
                        <title>Fòtos</title><?php
                }?>
        </head>
        
        <body>
                <?php include('navigation.php') ; ?>
                
                <div class="corpsGallerie" >
                        <?php if(isset($_GET['langue']) && $_GET['langue'] == 'fr'){?>
                                <p>Vous trouverez ici une gallerie de photos des derniers évènements, concerts, rencontres organisés par l'association.</p><?php
                        }else{?>
								<p>Traparètz aici tot una tièra de fòtos dels darrièrs eveniments, concèrts, aperetius o rescontras organizadas per l'associacion.</p><?php
                        }?>
                        <div class="galerie">
                                <?php include('gallerie.php') ; ?>
                        </div>
                </div>
        </body>
</html>

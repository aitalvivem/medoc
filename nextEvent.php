<div class="shortEvent">
        <div class="shortEventG"><?php
                if(isset($_GET['langue']) && $_GET['langue'] == 'fr'){
						echo '<a href="afficheEvent.php?id='.htmlspecialchars($donnees['ID']).'&langue=fr" title="Page événements" class="titreShortEvent">' . htmlspecialchars($donnees['titre']) . '</a>';
                }else{
						echo '<a href="afficheEvent.php?id='.htmlspecialchars($donnees['ID']).'" title="Pagina eveniments" class="titreShortEvent">' . htmlspecialchars($donnees['titre']) . '</a>';
                }
                echo '<p>' . htmlspecialchars($donnees['lieux']) . '</p>';
        echo '</div><div class="shortEventD">';
                echo '<p>' . htmlspecialchars($donnees['jour']) . '/' . htmlspecialchars($donnees['mois']) . '/' . htmlspecialchars($donnees['annee']) . '</p>';
                echo '<p>' . htmlspecialchars($donnees['heure']) . 'h';
                if($donnees['minute']<10){ echo '0';}
                echo htmlspecialchars($donnees['minute']) . '</p>';?>
        </div>
</div>

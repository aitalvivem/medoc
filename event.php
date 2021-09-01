<div class="evenement">
        <div class="infoEvent">
                <img src="images/events/<?php echo htmlspecialchars($donnees['photo']);?>" />
                <div class="preEvent" >
                        <h2><?php echo htmlspecialchars($donnees['titre']);?></h2>
                        <p><strong>Date : </strong><?php echo htmlspecialchars($donnees['jour']) . '/' . htmlspecialchars($donnees['mois']) . '/' . htmlspecialchars($donnees['annee']);?></p>
                        <p><strong>Heure : </strong><?php 
                                echo htmlspecialchars($donnees['heure']) . 'h';
                                if($donnees['minute']<10){ echo '0';}
                                echo htmlspecialchars($donnees['minute']);
                        ?></p>
                        <p><strong>Lieu : </strong><?php echo htmlspecialchars($donnees['lieux']);?></p><br/>
                        <p><strong>Organisateurs : </strong><?php echo htmlspecialchars($donnees['organisateurs']);?></p>
                        <p><strong>Lien de l'évènement Facebook : </strong><a href="<?php echo htmlspecialchars($donnees['lienFB']);?>" target="_blank"><?php echo htmlspecialchars($donnees['lienFB']);?></a></p>
                        <a href="events.php?langue=fr" class="retourPreEvent" >Retour à la liste des événements</a>
                </div>
        </div>

        <div class="description">
                <h4>Description de l'événement: </h4>
                <p><?php echo nl2br(htmlspecialchars($donnees['description']));?></p>
        </div>
</div>
<div class="retourEvent" >
        <a href="?langue=fr&id=<?php echo $_GET['id'] ?>#" >Retour en haut de page</a>
        <a href="events.php?langue=fr" >Retour à la liste des événements</a>
</div>

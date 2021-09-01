<div class="evenement">
        <div class="infoEvent">
                <img src="images/events/<?php echo htmlspecialchars($donnees['photo']);?>" />
                <div class="preEvent" >
                        <h2><?php echo htmlspecialchars($donnees['titre']);?></h2>
                        <p><strong>Data : </strong><?php echo htmlspecialchars($donnees['jour']) . '/' . htmlspecialchars($donnees['mois']) . '/' . htmlspecialchars($donnees['annee']);?></p>
                        <p><strong>Ora : </strong><?php 
                                echo htmlspecialchars($donnees['heure']) . 'h';
                                if($donnees['minute']<10){ echo '0';}
                                echo htmlspecialchars($donnees['minute']);
                        ?></p>
                        <p><strong>Luòc : </strong><?php echo htmlspecialchars($donnees['lieux']);?></p><br/>
                        <p><strong>Organisators : </strong><?php echo htmlspecialchars($donnees['organisateurs']);?></p>
                        <p><strong>Ligam de l'eveniment Facebook : </strong><a href="<?php echo htmlspecialchars($donnees['lienFB']);?>" target="_blank"><?php echo htmlspecialchars($donnees['lienFB']);?></a></p>
                        <a href="events.php?langue=oc" class="retourPreEvent" >Retorn a la tièra dels eveniments</a>
                </div>
        </div>

        <div class="description">
                <h4>Descripcion de l'eveniment: </h4>
                <p><?php echo nl2br(htmlspecialchars($donnees['description']));?></p>
        </div>    
</div>
<div class="retourEvent" >
        <a href="?langue=oc&id=<?php echo $_GET['id'] ?>#" >Retorn en naut de pagina</a>
        <a href="events.php?langue=oc" >Retorn a la tièra dels eveniments</a>
</div>

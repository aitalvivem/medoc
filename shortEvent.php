<?php  

if(isset($_GET['langue']) && $_GET['langue'] == 'fr') { ?>

	<div class="presentationEvent">
		<h3><?php echo htmlspecialchars($donnees['titre']); ?></h3>
		<a href="afficheEvent.php?langue=fr&id=<?php echo htmlspecialchars($donnees['ID']); ?>" title="Liens vers l'article">Voir l'événement</a>
		<p>Date : <strong><?php echo htmlspecialchars($donnees['jour']).'/'.htmlspecialchars($donnees['mois']).'/'.htmlspecialchars($donnees['annee']); ?></strong></p>
		<p>Heure : <strong><?php echo htmlspecialchars($donnees['heure']).'h';
			if($donnees['minute']<10){ echo '0';}
			echo htmlspecialchars($donnees['minute']).'.'; ?></strong>
		</p>
		<p>Lieu : <?php echo htmlspecialchars($donnees['lieux']) ; ?></p>	
	</div><?php
	
}else{ ?>

	<div class="presentationEvent">
		<h3><?php echo htmlspecialchars($donnees['titre']); ?></h3>
		<a href="afficheEvent.php?id=<?php echo htmlspecialchars($donnees['ID']); ?>" title="Ligam de l'eveniment">Veire l'eveniment</a>
		<p>Data : <strong><?php echo htmlspecialchars($donnees['jour']).'/'.htmlspecialchars($donnees['mois']).'/'.htmlspecialchars($donnees['annee']); ?></strong></p>
		<p>Ora : <strong><?php echo htmlspecialchars($donnees['heure']).'h';
			if($donnees['minute']<10){ echo '0';}
			echo htmlspecialchars($donnees['minute']).'.'; ?></strong>
		</p>
		<p>Luòc : <?php echo htmlspecialchars($donnees['lieux']) ; ?></p>	
	</div><?php
} 

?>

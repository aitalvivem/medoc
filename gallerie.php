<?php 
//connexion à la BDD
include('coBDD.php') ;

$reponse = $bdd->query('SELECT 
							id, 
							nom, 
							photo,
							alt							
						FROM 
							galerie 
						ORDER BY 
							id 
						DESC');

// $str = '<ul id="thumbs">';

// $i = 0;

$donnees = $reponse->fetchAll();

Require('Galerie.php');

$galerie = new Galerie($donnees);
$galerie->afficher();

// var_dump($galerie);

// while ($donnees = $reponse->fetch())
// {
	// $str .= '<li>
			// <a href="images/galerie/'.$donnees['photo'].'" target="_blank" >
					// <img src="images/galerie/'.$donnees['photo'].'" title="'.$donnees['nom'].'" alt="'.$donnees['alt'].'">
			// </a>
	// </li>';
		  
	// $i=$i+1;
// }

// $str .= '</ul>';

if($galerie->nbPhoto() == 0){
	if(isset($_GET['langue']) && $_GET['langue'] == 'fr')
		echo '<p>Il n\'y a pas de photos dans la galerie pour le moment</p>';
	else
		echo '<p>I a pas cap de fòtos dins la galeria per ara</p>';
}

?>

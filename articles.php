<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="scriptMedoc.css" />
                <link href="images/s-l30.jpg" rel="shortcut icon" >
                <title>Articles</title>
        </head>
        
        <body>
                <?php include('navigation.php') ; ?>
                
                <div class="corpsArticles">
                
                        <?php if(isset($_GET['langue']) && $_GET['langue'] == 'fr') { ?>
                                <p>
								Cette page à pour but de rassembler et de vous proposer des articles écrits par la communautée. C'est une sorte de tribune 
								d'expression.
								</p>
                                <p>
								Pour proposer un article, rien de plus simple : il suffit de remplir le formulaire en bas de cette page ! Votre demande sera 
								ensuite étudiée par les administrateurs du site (en cas de refus un message vous sera envoyé pour vous en expliquer les raisons).
								</p>
                        <?php }else{ ?>
								<p>
								Aquestes pagina a per tòca de recampar e de vos propausar d'articles escriches per la comunautat. Es una mèna de tribuna 
								d'exprecion.
								</p>
                                <p>
								Per prepausar un article, res de mai aisit : i pas que d'emplener lo formulari es bas d'aquesta pagina ! La vòstra demanda serà 
								puèi estudiada pels administrators dels siti (en cas de refùs un messatge vos serà madat per ne dire la rason).
								</p>
                        <?php } 
                        
                        //connection a la BDD
                        
                        include('coBDD.php') ;
                        
                        $reponse = $bdd->query('SELECT 
													ID, 
													titre, 
													DAY(date) AS jour, 
													MONTH(date) AS mois, 
													YEAR(date) AS annee, 
													HOUR(date) AS heure, 
													MINUTE(date) AS minute, 
													auteur 
												FROM 
													article
												ORDER BY 
													date');
                        
						$i = 0; //compteur pour compter les articles affichés
						
                        while ($donnees = $reponse->fetch())            //présentation des articles + liens
                        { 
                                if(isset($_GET['langue']) && $_GET['langue'] == 'fr') { ?>
                                        <div class="presentationArticle">
												<p><a href="shortArticle.php?id=<?php echo htmlspecialchars($donnees['ID']); ?>&langue=fr" title="Liens vers l'article">Lire l'article</a></p>
                                                <h3><?php echo htmlspecialchars($donnees['titre']); ?></h3>
												
                                                <p>Publié par <strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <strong><?php echo htmlspecialchars($donnees['jour']).'/'.htmlspecialchars($donnees['mois']).'/'.htmlspecialchars($donnees['annee']).'</strong> à <strong>'.htmlspecialchars($donnees['heure']).'h';
                                                if($donnees['minute']<10){ echo '0';}
                                                echo htmlspecialchars($donnees['minute']).'.'; ?></strong>
                                                </p>
                                        </div>
                                <?php }else{ ?>
										<div class="presentationArticle">
												<p><a href="shortArticle.php?id=<?php echo htmlspecialchars($donnees['ID']); ?>" title="Liens vers l'article">Legir l'article</a></p>
                                                <h3><?php echo htmlspecialchars($donnees['titre']); ?></h3>
												
                                                <p>Publicat per <strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> lo <strong><?php echo htmlspecialchars($donnees['jour']).'/'.htmlspecialchars($donnees['mois']).'/'.htmlspecialchars($donnees['annee']).'</strong> a <strong>'.htmlspecialchars($donnees['heure']).'h';
                                                if($donnees['minute']<10){ echo '0';}
                                                echo htmlspecialchars($donnees['minute']).'.'; ?></strong>
                                                </p>
                                        </div>
                                <?php }
								
								$i++;
                        } 
						
						if($i == 0)
						{
							if(isset($_GET['langue']) && $_GET['langue']=='fr'){ ?>
									<div class="pasDEvent">
											<p>Malheureusement il n'y a pas d'articles en ligne pour le moment.</p>
									</div>
							<?php }else{ ?>
									<div class="pasDEvent">
											<p>Malorosament i a pas d'articles en linha per ara.</p>
									</div>
							<?php }
						}
						
						
            //formulaire proposition d'article            
            if(isset($_GET['langue']) && $_GET['langue'] == 'fr' )
			{ ?>
				<h2 class="red" id="formPropArticle" >Proposer un article</h2>
				<p>Pour proposer un article merci de remplir le formulaires suivant pour que vôtre demande soit traitée le plus rapidement et le plus efficacement possible.</p><?php
			}else
			{ ?>
				<h2 class="red" id="formPropArticle" >Prepausar un article</h2>
				<p>Per propausar un article podètz emplener lo formulari seguent per que la vòtra demanda siague tractada lo mai rapidament possible.</p><?php
			} ?>
			
			<div class="propArticle">
				
				<!-- verification et enregistrement du formulaire -->
				
				<?php 
				
				if(isset($_GET['send'])){
			                if(isset($_POST['auteur']) && isset($_POST['email']) && isset($_POST['titre']) && isset($_POST['article'])){
				                if($_POST['auteur']!='' && $_POST['email']!='' && $_POST['titre']!='' && $_POST['article']!=''){
				                
										//on vérifie les espaces a la fin de la variable email
										while (substr($_POST['email'],-1) == ' ') {
												$_POST['email'] = substr($_POST['email'],0,-1);
										}
										//on vérifie les espaces a la fin de la variable auteur
										while (substr($_POST['auteur'],-1) == ' ') {
												$_POST['auteur'] = substr($_POST['auteur'],0,-1);
										}
										//on vérifie les espaces a la fin de la variable titre
										while (substr($_POST['titre'],-1) == ' ') {
												$_POST['titre'] = substr($_POST['titre'],0,-1);
										}	
										//on vérifie les espaces a la fin de la variable article
										while (substr($_POST['article'],-1) == ' ') {
												$_POST['article'] = substr($_POST['article'],0,-1);
										}	
				                        
				                        $datetime = date('Y-m-d H:i:s');
				                        
				                        $req = $bdd->prepare('INSERT INTO 
										        propArticle
											        (auteur, 
											        email, 
											        titre, 
											        date, 
											        texte) 
										        VALUES (
											        :auteur, 
											        :email, 
											        :titre, 
											        :date, 
											        :texte)');
				                        $req->execute(array(
				                                'auteur' => $_POST['auteur'],
				                                'email' => $_POST['email'],
				                                'titre' => $_POST['titre'],
				                                'date' => $datetime,
				                                'texte' => $_POST['article']
				                                ));
				                                
			                                if(isset($_GET['langue']) && $_GET['langue'] == 'oc' ){ //message de confirmation d'envoie
			                                        echo '<p class="confirme">Vòstra article foguèt plan mandat !</p>' ;
		                                        }else{
		                                                echo '<p class="confirme">Votre article à bien été envoyé !</p>' ;
	                                                }       
				                }else{
				                        if(isset($_GET['langue']) && $_GET['langue'] == 'oc' ){ //message d'erreur
				                                echo '<p class="erreur"><b>Error :</b> Mercés de dintrar un nom d\'autor o pseudonim, una adreiça e-mail, un titol e lo vòstre article.</p>' ;
			                                }else{
			                                        echo '<p class="erreur"><b>Erreur :</b> Merci d\'entrer un nom d\'auteur ou un pseudonyme, une adresse e-mail, un titre ainsi que votre article.</p>' ;
			                                }
				                }
				        }else{
				                if(isset($_GET['langue']) && $_GET['langue'] == 'oc' ){ //message d'erreur
			                                echo '<p class="erreur"><b>Error :</b> Mercés de dintrar un nom d\'autor o pseudonim, una adreiça e-mail, un titol e lo vòstre article.</p>' ;
		                                }else{
		                                        echo '<p class="erreur"><b>Erreur :</b> Merci d\'entrer un nom d\'auteur ou un pseudonyme, une adresse e-mail, un titre ainsi que votre article.</p>' ;
		                                }
	                                }
                                }
				
				
				
				// formulaire
				// en fr
				?>
				<div class="form"><?php
					if(isset($_GET['langue']) && $_GET['langue'] == 'fr') { ?>
			
						<form action="articles.php?langue=fr&send#formPropArticle" method="post">
						
							<label for="auteur" >Auteur :</label>
							<input type="text" name="auteur" id="auteur" <?php if(isset($_POST['auteur'])){ echo 'value="' . htmlspecialchars($_POST['auteur']) . '"';} ?>/>
							
							<label for="email" >Adresse e-mail :</label>
							<input type="email" name="email" id="email" <?php if(isset($_POST['email'])){ echo 'value="' . htmlspecialchars($_POST['email']) .'"';} ?>/>
							<p id="info">(L'adresse e-mail sert à vous contacter en cas de problème, elle ne sera pas difusée sur le site)</p>
							
							<hr />
							
							<label for="titre" >Titre de l'article :</label>
								<input type="text" name="titre" id="titre" <?php if(isset($_POST['titre'])){ echo 'value="' . htmlspecialchars($_POST['titre']) .'"';} ?>/>
								
							<p>
								<textarea name="article" id ="article" rows="10" cols="160" placeholder="Votre article."><?php if(isset($_POST['article'])){ echo htmlspecialchars($_POST['article']); } ?></textarea>
							</p>
							
							<div>
								<button type="submit">Envoyer votre article</button>
							</div>        
						</form><?php
			
					}else{ //en oc ?>
			
						<form action="articles.php?send#formPropArticle" method="post">
								   
							<label for="auteur" >Autor :</label>
							<input type="text" name="auteur" id="auteur" <?php if(isset($_POST['auteur'])){ echo 'value="' . htmlspecialchars($_POST['auteur']) . '"' ;} ?>/>
							
							<label for="email" >Adreiça e-mail :</label>
							<input type="email" name="email" id="email" <?php if(isset($_POST['email'])){ echo 'value="' . htmlspecialchars($_POST['email']) .'"';} ?>/>
							<p id="info">(l'adreiça e-mail servis per vos contactar en cas de problèma, serà pas difusida sul site)</p>
							
							<hr />
								
							<label for="titre" >Titol de l'article :</label>
							<input type="text" name="titre" id="titre" <?php if(isset($_POST['titre'])){ echo 'value="' . htmlspecialchars($_POST['titre']) .'"';} ?>/>
								
							<p>
								<textarea name="article" id ="article" rows="10" cols="160" placeholder="Vòstre article."><?php if(isset($_POST['article'])){ echo htmlspecialchars($_POST['article']);} ?></textarea>
							</p>
									
							<div>
								<button type="submit">Mandar vòstre article</button>
							</div>        
						</form><?php 
					} ?>
				</div>
			</div>
                        
			<?php $reponse->closeCursor();?>
		</div>
	</body>
</html>

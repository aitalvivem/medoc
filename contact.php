<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="scriptMedoc.css" />
                <link href="images/s-l30.jpg" rel="shortcut icon" >
                <title>Contacts</title>
        </head>
        
        <body>
                <?php include('navigation.php') ; ?>
                
                <div class="corpsPresentation" >
                        <!--Contacts-->
                        <div>
                                <?php if(isset($_GET['langue']) && $_GET['langue']=='fr'){ ?>
                                        <h2 class="red" >Nous contacter</h2>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2887.7557975678187!2d3.8680543157997205!3d43.63244137912191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b6af217be1ff51%3A0x26d70bd15039af4c!2sUniversit%C3%A9+Paul+Val%C3%A9ry+Montpellier+3!5e0!3m2!1sfr!2sfr!4v1538651062426" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                        <p>Vous trouverez ici les informations nécessaires si vous souhaitez nous contacter. Dans tout les cas et en toute occasions, nous vous invitons à nous rendre visite dans notre local à l'université Paul Valery ! Pour nous contacter vous pouvez aussi remplir le formulaire ci-dessous.</p>
                                        
                                        <table>
                                                <tr>
                                                        <td><strong>Adresse e-mail :</strong></td>
                                                        <td>medoc_montpelhier@yahoo.com</td>
                                                </tr>
                                                <tr>
                                                        <td><strong>Lien Facebook</strong></td>
                                                        <td><a href="https://www.facebook.com/medoc.dauclapas/" target="_blank">https://www.facebook.com/medoc.dauclapas/</a></td>
                                                </tr>
                                                <tr>
                                                        <td><strong>Adresse Postale :</strong></td>
                                                        <td>Local 101</td>
                                                </tr>
                                                <tr>
                                                        <td></td><td>Maison des Etudiants,<br />
                                                        Université Paul Valery - Montpellier III,<br />
                                                        Route de Mende, 34000 Montpellier</td>
                                                </tr>
                                                <tr>
                                                        <td><strong>Horaires d'ouverture du local :</strong></td>
                                                        <td>Mercredi de 18h à 20h (réunion hebdomadaire)<td>
                                                <tr/>
												<tr>
														<td></td><td>Jeudi de 11h à 15h</td>
												</tr>
                                        </table>
                                
                                <?php }else{ ?>
										<h2 class="red" >Nos contactar</h2>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2887.7557975678187!2d3.8680543157997205!3d43.63244137912191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b6af217be1ff51%3A0x26d70bd15039af4c!2sUniversit%C3%A9+Paul+Val%C3%A9ry+Montpellier+3!5e0!3m2!1sfr!2sfr!4v1538651062426" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                        <p>Traparètz aiçi las informacions necessarias se nos volètz contactar. De tot biaises e en totas occazions, vos convidam al nòstre local a l'universitat Paul Valery per nos venir veire e se rencontrar ! Per nos contactar podètz tanben emplener lo formulari aqui dessos.</p>
                                
                                        <table>
                                                <tr>
                                                        <td><strong>Adreiça e-mail :</strong></td>
                                                        <td>medoc_montpelhier@yahoo.com</td>
                                                </tr>
                                                <tr>
                                                        <td><strong>Ligam Facebook</strong></td>
                                                        <td><a href="https://www.facebook.com/medoc.dauclapas/" target="_blank">https://www.facebook.com/medoc.dauclapas/</a></td>
                                                </tr>
                                                <tr>
                                                        <td><strong>Adreiça Postale :</strong></td>
                                                        <td>Local 101</td>
                                                </tr>
                                                <tr>
                                                        <td></td><td>Maison des Etudiants,<br />
                                                        Université Paul Valery - Montpellier III,<br />
                                                        Route de Mende, 34000 Montpellier</td>
                                                </tr>
                                                <tr>
                                                        <td><strong>Oraris de dubertura dau local :</strong></td>
                                                        <td>Dimècres de 18h cap a 20h (acamp setmanier)</td>
                                                <tr/>
												<tr>
														<td></td><td>Dijoùs de 11h cap a 15h</td>
												</tr>
                                        </table>
                                <?php } ?>
                        </div>
                        
                        <!--formulaire de contact-->
                        
                        <?php if(isset($_GET['langue']) && $_GET['langue']=='fr'){ ?>
								<h2 class="red" id="formContact" >Formulaire de contact</h2>
                        <?php }else{ ?>
                                <h2 class="red" id="formContact" >Formulari de contact</h2>
                        <?php } ?>
                        
                        <div class="propArticle" >
                        
                                <?php
                                //connection a la BDD
                                include('coBDD.php') ;
                                
                                //verification et enregistrement du formulaire
				
                                if(isset($_GET['send'])){
                                        if(isset($_POST['email']) && isset($_POST['objet']) && isset($_POST['message'])){
                                                if($_POST['email']!='' && $_POST['objet']!= '' && $_POST['message']!=''){
                                                
													//on vérifie les espaces a la fin de la variable email
													while (substr($_POST['email'],-1) == ' ') {
															$_POST['email'] = substr($_POST['email'],0,-1);
													}
													//on vérifie les espaces a la fin de la variable objet
													while (substr($_POST['objet'],-1) == ' ') {
															$_POST['objet'] = substr($_POST['objet'],0,-1);
													}
													//on vérifie les espaces a la fin de la variable message
													while (substr($_POST['message'],-1) == ' ') {
															$_POST['message'] = substr($_POST['message'],0,-1);
													}	
													
													$datetime = date('Y-m-d H:i:s');
												  
													$req = $bdd->prepare('INSERT INTO 
																				contact(
																					email, 
																					objet, 
																					message, 
																					date) 
																				VALUES (
																					:email, 
																					:objet, 
																					:message, 
																					:date)');  
												  
													$req->execute(array(
													'email' => $_POST['email'],
													'objet' => $_POST['objet'],
													'message' => $_POST['message'],
													'date' => $datetime
													));
				                                        
													//message de confirmation d'envoie
	                                                if(isset($_GET['langue']) && $_GET['langue'] == 'oc' ){ 
		                                                echo '<p class="confirme">Vòstra messatge foguèt plan mandat !</p>' ;
	                                                }else{
	                                                        echo '<p class="confirme">Votre message à bien été envoyé !</p>' ;
                                                        }
                                                }else{//message d'erreur
			                                if(isset($_GET['langue']) && $_GET['langue'] == 'oc' ){ 
			                                        echo '<p class="erreur"><b>Error :</b> Mercés de dintrar una adreiça e-mail, un objècte e lo vòstre messatge.</p>' ;
	                                                }else{
		                                                echo '<p class="erreur"><b>Erreur :</b> Merci d\'entrer une adresse e-mail, un objet ainsi que votre message.</p>' ;
		                                        }
			                        }
                                        }else{//message d'erreur
                                                if(isset($_GET['langue']) && $_GET['langue'] == 'oc' ){ 
		                                        echo '<p class="erreur"><b>Error :</b> Mercés de dintrar una adreiça e-mail, un objècte e lo vòstre messatge.</p>' ;
                                                }else{
	                                                echo '<p class="erreur"><b>Erreur :</b> Merci d\'entrer une adresse e-mail, un objet ainsi que votre message.</p>' ;
	                                        }
                                        }
                                }
                                ?>
                        
                                <!--formulaire-->
                        
                                <?php if(isset($_GET['langue']) && $_GET['langue'] == 'fr' ){ ?>
                                        <div class="form">  
                                                <form action="contact.php?langue=fr&send#formContact" method="post">
													<label for="email">Adresse e-mail :</label>
													<input type="text" name="email" id="email" <?php if(isset($_POST['email'])){ echo 'value="' . htmlspecialchars($_POST['email']) .'"';} ?>/>
													
													<hr />
													
													<label for="objet">Objet :</label>
													<input type="text" name="objet" id="objet" <?php if(isset($_POST['objet'])){ echo 'value="' . htmlspecialchars($_POST['objet']) .'"';} ?>/>
													
													<p>
														<textarea name="message" id ="message" rows="10" cols="160" placeholder="Votre message"><?php if(isset($_POST['message'])){ echo htmlspecialchars($_POST['message']);} ?></textarea>
													</p>
													
													<div>
														<button type="submit">Envoyer votre message</button>
													</div>
                                                </form>
                                        </div>
                                <?php }else{ ?>										
										<div class="form">  
                                                <form action="contact.php?send#formContact" method="post">
													<label for="email">Adreiça e-mail :</label>
													<input type="email" name="email" id="email" <?php if(isset($_POST['email'])){ echo 'value="' . htmlspecialchars($_POST['email']) .'"';} ?>/>
													
													<hr />
													
													<label for="objet">Objècte :</label>
													<input type="text" name="objet" id="objet" <?php if(isset($_POST['objet'])){ echo 'value="' . htmlspecialchars($_POST['objet']) .'"';} ?>/>
													
													<p>
														<textarea name="message" id ="message" rows="10" cols="160" placeholder="Vòstre messatge"><?php if(isset($_POST['message'])){ echo htmlspecialchars($_POST['message']);} ?></textarea>
													</p>
	                                                
	                                                <div>
														<button type="submit">Mandar vòstre messatge</button>
													</div>
                                                </form>
                                        </div>
                                <?php } ?>
                        </div>
                </div>
        </body>
</html>

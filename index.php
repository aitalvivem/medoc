<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="scriptMedoc.css" />
                <link href="images/s-l30.jpg" rel="shortcut icon" >
                <?php if(isset($_GET['langue']) && $_GET['langue'] == 'fr'){?>
                        <title>Acceuil</title><?php
                }else{?>
                        <title>Accuelh</title><?php
                }?>
        </head>

        <body>
                <?php include('navigation.php') ;

                include('aside.php') ;?>

                <div class="corps">
                        <section class="banniere" id="cf">
                                <img class="bottom" src="images/bannieremedoc.png" alt="banniere" title="Med'òc dau Clapàs" />
                                <img class="top" src="images/bannieremedoc2.png" alt="banniere" title="Med'òc dau Clapàs" usemap="#map" />
								<map name="map" >
									<area shape="rect" coords="750,35,900,60" href="reireporta/connexion.php" >
								</map>
                        </section>
                        <section class="article">
                        <?php if(isset($_GET['langue']) && $_GET['langue'] == 'fr'){?>
                                <h3>Lo Med'òc dau Clapàs, qu'es aquò ?</h3>
                                <p>C'est une association étudiante hébergée à la Maison des Étudiants de l'Université Paul-Valéry de Montpellier qui œuvre à la 
								sociabilisation de l'occitan sur le campus et dans la ville.</p>
                                <p>L'association souhaite faire connaître la langue occitane et la faire vivre comme culture ouverte et métissée. Elle lutte donc 
								contre tous passéismes et enfermements identitaires nauséabonds. Ses principaux moyens d'action sont les concerts, spectacles, 
								balètis, conférences, débats, cours d'occitan, participation à diverses manifestations, et plus récemment lotos !</p><?php
                        }else{?>
								<h3>Lo Med'òc dau Clapàs, qu'es aquò ?</h3>
                                <p>Es una associacion estudianta albergada a l'Ostal dels Estudiants de l'Universitat Paul-Valéry a Montpellier qu'òbra a la 
								sociabilisacion de l'occitan sul campus e dins la vila.</p>
                                <p>L'associacion desira espandir la coneissença de las langas d'òc e las faire viure coma cultura duberta et metissada. 
								L'associacion lucha donc contre los passadismes e los embaraments identitaris empudentits. Sos principals mejans d'accion son de 
								concèrts, espectacles, balètis, conferécias, debats, corses d'occitan, de participacions à de manifestacions divèrsas, e mai 
								recentament de quinas !</p><?php
                        }?>
                        </section>
                        <div class="video">
                                <video src="video/Prima dels Poètas 2016 Med'òc dau Clapàs.mp4" controls>
                                        Votre navigateur ne gère pas l'élément <code>video</code>.
                                </video>
                                <div>
                                <?php if(isset($_GET['langue']) && $_GET['langue'] == 'fr'){?>
                                        <p>Voilà une vidéo du<strong>Printemps des Poètes 2016</strong>, organisé par le Med'òc à la salle Jean Moulin de 
										l'Université Paul-Valéry de Montpellier, le 8 mars 2016.</p>
                                        <p>Vidéo realisée par le collectif FEM.</p>
                                        <p>Vous pouvez aussi retrouver cette vidéo sur Youtube en suivant 
										<a href="https://www.youtube.com/watch?v=kuTK0fT4YeE" target="_blank">ce lien</a>.</p><?php
                                        }else{?>
										<p>Aqui una video de la <strong>Prima dels Poètas 2016</strong>, organizada pel Med'òc a la sala Jean Moulin de 
										l'Universitat Paul-Valéry de Montpelhier, lo 8 de març dau 2016.</p>
                                        <p>Video realizada per lo collectiu FEM.</p>
                                        <p>Podètz tanben trapar aquesta video sus Youtube en seguissent 
										<a href="https://www.youtube.com/watch?v=kuTK0fT4YeE" target="_blank">aqueste ligam</a>.</p><?php
                                        }?>
                                </div>
                        </div>
                </div>
        </body>
</html>

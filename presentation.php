<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="scriptMedoc.css" />
                <link href="images/s-l30.jpg" rel="shortcut icon" >
                <?php if(isset($_GET['langue']) && $_GET['langue'] == 'fr'){?>
                        <title>Présentation</title><?php
                }else{?>
                        <title>Presentacion</title><?php
                }?>
        </head>
        
        <body>
                <?php include('navigation.php') ; ?>
                
                <div class="corpsPresentation" >
                        <!--là on fout la présentation de l'assos-->
                        <?php if(isset($_GET['langue']) && $_GET['langue'] == 'fr' ){ ?>
                                <a href="images/presentation/visuel_medoc_sérigraphie.jpg" target="_blank" ><img id="presentationImg1" src="images/presentation/visuel_medoc_sérigraphie.jpg" ></a>
                                <h3>Le Med'òc dau Clapàs, qu'es aquò ?</h3>
                                <p>Le Med'òc dau Clapàs est une association loi 1901, créée en 1997 au sein de l'université Paul Valéry.</p>
                                <p>
								Le Med'òc est un mouvement étudiant, ouvert à tous, étudiants et non étudiants, du département d'occitan et d'ailleurs. 
								Il est fidèle à l'esprit qui a entrainé sa création : faire valoir et défendre l'occitan à l'université et en dehors. Il a pour 
								but de promouvoir et faire vivre la langue, la culture et les études supérieures d'occitan par différentes manifestations 
								culturelles et participer à la vie étudiante.
								</p>
                                <a href="images/presentation/Afficha_Baleti_del_pobl_4yo-1.jpg" target="_blank" >
									<img id="presentationImg2" src="images/presentation/Afficha_Baleti_del_pobl_4yo-1.jpg" >
								</a>
                                <p>
								L'association se définit comme antifasciste et apartisane dans ses statuts ; c'est une association indépendante et qui ne doit 
								donc pas être affiliée à un groupe politique, syndical ou religieux quel qu'il soit. Mais le Med'òc est tout de même présent sur 
								des manifestations revendicatives et rassemblements (manifestacion Anèm òc, demande d'obtension de postes au CAPES d'Occitan, 
								soutiens aux luttes vigneronnes, à la lutte du CFPO-MP ainsi que dans différentes luttes sociales et dans le cadre universitaire).
								</p>
                                <p>
								Le Med'òc développe des dispositifs pour favoriser les rencontres et les discussions de l'occitan vers les franchimands et gavachs
								en tout genre car, comme le dit Philippe Martel, «Une culture n'est par définition ni totalement ouverte, ni totalement fermée». 
								L'association vit autour de ses ateliers (danse trad, préparation de Carnaval...), ses cours d'occitan, ses réunions hebdomadaires 
								ouvertes à tous. Elle est également présente pour les étudiants et  curieux qui souhaitent se renseigner sur l'occitan, ses cultures 
								et ses pratiques. Elle est présente dans la région grâce à son affichage sauvage et dans le monde entier sur facebook.
								</p>
                                <p>
								Parmis les événements organisés par le Med'òc, on retrouve l'apéritif annuel de rentrée, les soirées Erasmus balèti (pour 
								rencontrer les étudiants étrangers et mélanger les cultures) ainsi que divers concerts et soirées qui ont pour but de mélanger les 
								cultures traditionnelles occitanes avec des cultures actuelles et voisines (Alholi Sound Systèm, Prima dels Poètes...), les lotos 
								et ses fameux tournois de belote.
								</p>
                                <p class="signature"><i>Intelècte e bolegadís,</i><br/><b><i>Lo Med'òc</i></b></p>
                        
                        <?php }else{ ?>
								<a href="images/presentation/visuel_medoc_sérigraphie.jpg" target="_blank" ><img id="presentationImg1" src="images/presentation/visuel_medoc_sérigraphie.jpg" ></a>
                                <h3>Lo Med'òc dau Clapàs, qu'es aquò ?</h3>
                                <p>Lo Med'òc dau Clapàs es una associacion de lei 1901, creada en 1997 al dintre de l'universitat Paul Valery.</p>
                                <p>
								Lo Med'òc es un moviment estudiant, dubèrt a totes, estudiants e non estudiants, dau departament d'occitan e d'endacòm mai. 
								Es fisèl a l'esperit qu'entrainèt sa creacion : far valer e defendre l'occitan a l'universitat e en defòra. A per tòca de promòure 
								e far viure la lenga, la cultura e las estudis superioras d'occitan pel biais de diferentas manifestacions culturalas e la 
								participacion a la vida estudianta.
								</p>
                                <a href="images/presentation/Afficha_Baleti_del_pobl_4yo-1.jpg" target="_blank" >
									<img id="presentationImg2" src="images/presentation/Afficha_Baleti_del_pobl_4yo-1.jpg" >
								</a>
                                <p>
								L'associacion se definís coma antifascista e apartesana dins sos estatuts ; es una associacion independenta e que per aquò pòt 
								pas èstre ligada a de grops politics, sindicals o religioses qual que siaguon. Mas lo Med'òc es pasmens present sus de 
								manifestacions revendicativas e de recampaments (manifestacion Anèm Òc, demanda d'obtencion de pòstes au CAPES d'Occitan, sosten a 
								las luchas vinhaironas, a la lucha del CFPO-MP tant coma diferentas luchas socialas e dins l'encastre universitari).
								</p>
                                <p>
								Lo Med'òc desvolopa de dispositius per favorizar las rescontras e las charradisas de l'occitan cap als franchimands e gavaches 
								de tota mena per que, coma o ditz Felip Martel, «Une culture n'est par définition ni totalement ouverte, ni totalement fermée». 
								L'associacion viu alentorn de sos talhièrs (dansa trad, preparacion de Carnaval...), sos corses d'occitan, sos acamps setmanièrs 
								dubèrts a totes. Es tanben presenta per los estudiants e curioses que se vòlon s'entresenhar sus l'occitan, sas culturas e sas 
								practicas. Es presenta dins la region mercés a son afichatge salvatge e dins lo monde entièr sus facebook.
								</p>
                                <p>
								Dins los eveniments organizats pel Med'òc, retrovam l'aperetiu anual de dintrada, las seradas Erasmus balèti (per rescontrar 
								los estudiants estrangièrs e mesclar las culturas) e tanben de concèrts divèrses qu'an per tòca de mesclar las culturas 
								tradicionalas occitanas amb de culturas actualas e vesinas (Alholi Sound Systèm, Prima dels Poètes...), de quinas e sos famoses 
								tornegs de belòta.
								</p>
                                <p class="signature"><i>Intelècte e bolegadís,</i><br/><b><i>Lo Med'òc</i></b></p>
								
                        <?php } ?>
                </div>
        </body>
</html>

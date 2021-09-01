<header id="ancre">
	<div class="cadreLangues" >
		<!--<p>Changer de langue</p>-->
		<div class="drapeaux" >
			<div class="langue" >
				<a href="?langue=fr#ancre" ><img src="images/drapeauFr.jpg" alt="drapeau français" title="Site en Français"/></a>
			</div>
			<div class="langue" >
				<a href="?langue=oc#ancre" ><img src="images/drapeauOc.jpg" alt="drapeau occitan" title="Site en Occitan"/></a>
			</div>
		</div>
	</div>
	
	<img src="images/logo.jpg" alt="photo" title="Med'òc dau Clapàs" />
	<nav>
		<ul>
			<?php if(isset($_GET['langue']) && $_GET['langue'] == 'fr'){?>
			<li><a href="index.php?langue=fr" >Accueil</a></li>
			<li><a href="presentation.php?langue=fr" >Présentation</a></li>
			<li><a href="events.php?langue=fr" >Evénements</a></li>
			<li><a href="photo.php?langue=fr" >Photos</a></li>
			<li><a href="articles.php?langue=fr" >Articles</a></li>
			<li><a href="contact.php?langue=fr" >Contacts</a></li><?php
			}else {?>
			<li><a href="index.php" >Accuelh</a></li>
			<li><a href="presentation.php" >Presentacion</a></li>
			<li><a href="events.php" >Eveniments</a></li>
			<li><a href="photo.php" >Fòtos</a></li>
			<li><a href="articles.php" >Articles</a></li>
			<li><a href="contact.php" >Contacts</a></li><?php
			}?>
		</ul>
	<nav>    
</header>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="scriptReirePorta.css" />
		<link href="images/s-l30.jpg" rel="shortcut icon" />
        <title>Pagina de connexion</title>
    </head>
	
	<?php //cette page demande le mot de passe et envoie la donnée entrée vers admin.php ?>

    <body>
		<fieldset class="co">
			<p><strong>Merces de dintrar los vòstres identifiants e mot de passa</strong></p>
			<div>
				<form action="verifCo.php" method="post">
					<p>
						<table>
							<tr>
								<td><label for="identifiant" >Identifiant : </label></td>
								<td><input type="text" name="identifiant" /></td>
							</tr>
							<tr>
								<td><label for="mot_de_passe" >Mot de Passa : </label></td>
								<td><input type="password" name="mot_de_passe" /></td>
							</tr>
						</table>
						<a href="../index.php" ><button type="button" >Retorn au site</button></a>
						<input type="submit" value="Validar" />
					</p>
				</form>
			</div>
		</fieldset>
	</body>
</html>
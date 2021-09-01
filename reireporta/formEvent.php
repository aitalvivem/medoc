<div>
	<fieldset>
		<?php if(isset($message)) echo $message ; ?>
		<form action="admin.php?idPage=4" method="post" enctype="multipart/form-data" >
			<table>
				<tr>
					<td><label for="titre">Titol de l'eveniment : </label></td>
					<td><input type="text" name="titre" id="titre" <?php if(isset($_POST['titre']))
																	{ 
																		echo 'value="' . htmlspecialchars($_POST['titre']) .'"';
																	}
																	elseif(isset($donnees['titre']))
																	{
																		echo 'value="' . htmlspecialchars($donnees['titre']) .'"';
																	} ?> /></td>
				</tr>
				<tr>
					<td><label for="lieu">Luòc : </label></td>
					<td><input type="text" name="lieu" id="lieu" <?php if(isset($_POST['lieu']))
																{ 
																	echo 'value="' . htmlspecialchars($_POST['lieu']) .'"';
																}
																elseif(isset($donnees['lieux']))
																{
																	echo 'value="' . htmlspecialchars($donnees['lieux']) .'"';
																} ?> /></td>
				</tr>
				<tr>
					<td><label for="organisateur">Organisator : </label></td>
					<td><input type="text" name="organisateur" id="organisateur" <?php if(isset($_POST['organisateur']))
																						{
																							echo 'value="' . htmlspecialchars($_POST['organisateur']) .'"';
																						}
																						elseif(isset($donnees['organisateurs']))
																						{
																							echo 'value="' . htmlspecialchars($donnees['organisateurs']) .'"';
																						} ?> /></td>
				</tr>
				<tr>
					<td><label for="lien">Ligam de l'eveniment FB : </label></td>
					<td><input type="text" name="lien" id="lien" <?php if(isset($_POST['lien']))
																		{
																			echo 'value="' . htmlspecialchars($_POST['lien']) .'"';
																		}
																		elseif(isset($donnees['lien']))
																		{
																			echo 'value="' . htmlspecialchars($donnees['lien']) .'"';
																		} ?> /></td>
				</tr>
				<tr>
					<td><label for="affiche">Aficha de l'eveniment : </label></td>
					<td><input type="file" name="affiche" /></td>
				</tr>
			</table>
			<p>
				Date : 
				<select name="jour" >
				<?php 
				for($i=1; $i<32; $i++)
				{
					echo '<option value="'.$i.'"';
					if(isset($_POST['jour']) && $_POST['jour'] == $i) { echo 'selected'; } 
					elseif(isset($donnees['jour']) && $donnees['jour'] == $i) { echo 'selected' ; }
					echo '>'.$i.'</option>';
				}
				?>
				</select>
				<select name="mois" >
					<option value="1" <?php if(isset($_POST['mois']) && $_POST['mois'] == 1) { echo 'selected'; } 
											elseif(isset($donnees['mois']) && $donnees['mois'] == 1) { echo 'selected' ; } ?> >Genièr</option>
					<option value="2" <?php if(isset($_POST['mois']) && $_POST['mois'] == 2) { echo 'selected'; } 
											elseif(isset($donnees['mois']) && $donnees['mois'] == 2) { echo 'selected' ; } ?> >Febrièr</option>
					<option value="3" <?php if(isset($_POST['mois']) && $_POST['mois'] == 3) { echo 'selected'; } 
											elseif(isset($donnees['mois']) && $donnees['mois'] == 3) { echo 'selected' ; } ?> >Març</option>
					<option value="4" <?php if(isset($_POST['mois']) && $_POST['mois'] == 4) { echo 'selected'; } 
											elseif(isset($donnees['mois']) && $donnees['mois'] == 4) { echo 'selected' ; } ?> >Abrial</option>
					<option value="5" <?php if(isset($_POST['mois']) && $_POST['mois'] == 5) { echo 'selected'; } 
											elseif(isset($donnees['mois']) && $donnees['mois'] == 5) { echo 'selected' ; } ?> >Mai</option>
					<option value="6" <?php if(isset($_POST['mois']) && $_POST['mois'] == 6) { echo 'selected'; } 
											elseif(isset($donnees['mois']) && $donnees['mois'] == 6) { echo 'selected' ; } ?> >Junh</option>
					<option value="7" <?php if(isset($_POST['mois']) && $_POST['mois'] == 7) { echo 'selected'; } 
											elseif(isset($donnees['mois']) && $donnees['mois'] == 7) { echo 'selected' ; } ?> >Julh</option>
					<option value="8" <?php if(isset($_POST['mois']) && $_POST['mois'] == 8) { echo 'selected'; } 
											elseif(isset($donnees['mois']) && $donnees['mois'] == 8) { echo 'selected' ; } ?> >Agost</option>
					<option value="9" <?php if(isset($_POST['mois']) && $_POST['mois'] == 9) { echo 'selected'; } 
											elseif(isset($donnees['mois']) && $donnees['mois'] == 9) { echo 'selected' ; } ?> >Setembre</option>
					<option value="10" <?php if(isset($_POST['mois']) && $_POST['mois'] == 10) { echo 'selected'; } 
											elseif(isset($donnees['mois']) && $donnees['mois'] == 10) { echo 'selected' ; } ?> >Octòbre</option>
					<option value="11" <?php if(isset($_POST['mois']) && $_POST['mois'] == 11) { echo 'selected'; } 
											elseif(isset($donnees['mois']) && $donnees['mois'] == 11) { echo 'selected' ; } ?> >Novembre</option>
					<option value="12" <?php if(isset($_POST['mois']) && $_POST['mois'] == 12) { echo 'selected'; } 
											elseif(isset($donnees['mois']) && $donnees['mois'] == 12) { echo 'selected' ; } ?> >Decembre</option>
				</select>
				<select name="annee" >
				<?php 
				for($i=1999; $i<2101; $i++)
				{
					echo '<option value="'.$i.'" ';
					if(isset($_POST['annee']) && $_POST['annee'] == $i) { echo 'selected'; } 
					elseif(isset($donnees['annee']) && $donnees['annee'] == $i) { echo 'selected' ; }
					echo '>'.$i.'</option>';
				}
				?>
				</select>
				<br /><br />
				Ora : 
				<select name="heure" >
				<?php 
				for($i=1; $i<=24; $i++)
				{
					echo '<option value="'.$i.'"';
					if(isset($_POST['heure']) && $_POST['heure'] == $i) { echo 'selected'; } 
					elseif(isset($donnees['heure']) && $donnees['heure'] == $i) { echo 'selected' ; }
					echo '>'.$i.'</option>';
				}
				?>
				</select>
				h
				<select name="minute"> 
				<?php 
				for($i=0; $i<=60; $i++)
				{		
					echo '<option value="'.$i.'"';
					if(isset($_POST['minute']) && $_POST['minute'] == $i) { echo 'selected'; } 
					elseif(isset($donnees['minute']) && $donnees['minute'] == $i) { echo 'selected' ; }
					echo '>';
					if($i < 10) echo '0';
					echo $i.'</option>';
				}
				?>
				</select>
			</p>
			<hr />
			
			<p>
				Descripcion de l'eveniment :<br />
				<textarea name="description" id ="description" rows="10" cols="150" placeholder="Vòstre article"><?php if(isset($_POST['description']))
																													{ 
																														echo htmlspecialchars($_POST['description']) ;
																													}
																													elseif(isset($donnees['description']))
																													{
																														echo htmlspecialchars($donnees['description']) ;
																													}
																													?></textarea>
			</p>
			
			<div>
				<button type="submit" >Modificar l'eveniment</button>
				<a href="admin.php?idPage=4" ><button type="button" >Modificar un autra evenimnent</button></a>
			</div>
			<input type="hidden" name="sent" value="1" />
			<input type="hidden" name="idEvent" value="<?php echo $_POST['idEvent'] ; ?>" />
		</form>
	</fieldset>
</div>
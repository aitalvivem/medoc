<?php
if(isset($_SESSION['login']) && $_SESSION['login'] == 'administrator')
{
?>
<header>
	<nav>
		<ul>
			<li><a href="admin.php?idPage=1" >Messatges novèls</a></li>
			<li><a href="admin.php?idPage=2" >Prepausicion d'articles</a></li>
			<li><a href="admin.php?idPage=3" >Apondre un eveniment</a></li>
			<li><a href="admin.php?idPage=4" >Modificar un eveniment</a></li>
			<li><a href="admin.php?idPage=5" >Apondre una fòto</a></li>
			<li><a href="admin.php?idPage=6" >Apondre un article</a></li>
			<li><a href="logout.php" >Deconnexion</a></li>
		</ul>
	</nav>
</header>
<?php
}
else
{
	header("Location: logout.php");
	exit();
}

?>
<?php
if(isset($_SESSION['login']) && $_SESSION['login'] == 'administrator')
{
	include('../coBDD.php');
}
else
{
	header("Location: logout.php");
	exit();
}
?>
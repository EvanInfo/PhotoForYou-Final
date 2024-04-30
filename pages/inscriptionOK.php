<?php
	include ("../include/entete.inc.php");
	if (isset($_SESSION['login']) && $_SESSION['login'] == true){
		header('Location: ../pages/accueil.php');
	  }
	echo generationEntete("Inscription effectuée Bravo !", "Merci vous êtes maintenant inscrit et pouvez vous connecter !");
	include ("../include/piedDePage.inc.php");
?>
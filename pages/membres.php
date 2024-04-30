<?php
	include ("../include/entete.inc.php");
	if (isset($_SESSION['login']) && $_SESSION['login'] == false){
		header('Location: ../pages/connexion.php');
	  }
	echo generationEntete("Page des utilisateurs", "Bonjour ".$_SESSION['NomUtilisateur']);
	echo ("Bonjour ".$_SESSION['TypeUtilisateur']);
	//echo ("L'ID de l'utilisateur actuel est : " . $_SESSION['idUser']);
	//echo ("Bonjour ".$_SESSION['idUser']);
	/*$sonType = 'visiteur'; // Remplacez par la valeur appropriée
	$menuItems = $manager->getMenu($sonType);

	// Utilisez $menuItems comme nécessaire*/

	include ("../include/piedDePage.inc.php");
?>


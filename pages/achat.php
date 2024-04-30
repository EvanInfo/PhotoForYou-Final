<?php include ("../include/entete.inc.php"); 
if (isset($_SESSION['login']) && $_SESSION['login'] == false){
    header('Location: ../pages/connexion.php');
}elseif (isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['TypeUtilisateur'] != "client" && $_SESSION['TypeUtilisateur'] != "admin") {
header('Location: ../pages/accueil.php');
}?>


<?php include ("../include/piedDePage.inc.php");?>
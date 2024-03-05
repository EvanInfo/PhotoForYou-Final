<?php
/**
 * Script de transfert des photos vers la base de données à partir du formulaire.
 *
 * Ce script vérifie si la requête est de type POST, récupère la catégorie sélectionnée
 * et redirige vers la page générale avec la catégorie en tant que paramètre GET.
 * Si aucune catégorie n'est sélectionnée, la redirection est effectuée sans paramètre GET.
 */

require_once '../include/entete.inc.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $categorieId = $_POST['categorie'];

    
    if ($_POST['categorie']) {
        // Récupère les informations sur la catégorie à partir de son identifiant
        $categorieInfo = $categorieManager->getCategorieById($categorieId);
        // Construit un tableau avec la catégorie et sa valeur
        $Categorie = ['categorie' => $categorieInfo['libelle']];
        
        // Ajoute la variable $Categorie à l'URL avec la méthode GET
        $CategorieURL = http_build_query($Categorie);
        
        // Redirige vers la page générale avec la catégorie en tant que paramètre GET
        header("Location: ../pages/general.php?$CategorieURL");
        exit();
    } else {
        
        header("Location: ../pages/general.php");
        exit();
    }
} else {
    header("Location: ../pages/general.php");
    exit();
}
?>

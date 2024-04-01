<?php
require_once '../include/entete.inc.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['nouvelleCategorie']) && !empty($_POST['nouvelleCategorie'])) {

        $nouvelleCategorie = new Categorie([
            'libelle' => $_POST['nouvelleCategorie']
        ]);


        $categorieManager->ajouterCategorie($nouvelleCategorie);

        $_SESSION['success_message'] = "La catégorie a été ajoutée.";
        header("Location: ../pages/admin.php");
        exit(); // Ajout : Terminer le script après la redirection
    }
}

require_once '../include/piedDePage.inc.php';
?>

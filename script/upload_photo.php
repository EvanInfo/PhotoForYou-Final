<?php
require_once '../include/entete.inc.php'; 

// Permet l'ajout d'une photo a la base de donnée

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_POST['nomphoto'], $_POST['categorie'], $_FILES['photo']) && !empty($_POST['nomphoto'])) {
      
        $categorieId = $_POST['categorie'];
        
       
        $categorieInfo = $categorieManager->getCategorieById($categorieId);

        // Récupération de la catégorie Les nouveautés
        $requete = $db->prepare("CALL GetLibelleCategorie()");
        $requete->execute();
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        $requete->closeCursor();
        
        // Génération d'un identifiant unique pour l'image
        $identifiantUnique = $_SESSION['idUser'] . '_' . substr(uniqid(), 0, 10);
        
        // Gestion de l'image dans la base
        $urlPhoto = '../images/vendre_stock/' . $identifiantUnique;
        
        $typeImage = exif_imagetype($urlPhoto);

       
        $extension = '';
        switch ($typeImage) {
            case IMAGETYPE_GIF:
                $extension = '.gif';
                break;
            case IMAGETYPE_JPEG:
                $extension = '.jpg';
                break;
            case IMAGETYPE_PNG:
                $extension = '.png';
                break;
           
            default:
                $extension = '.jpg';
                break;
        }

        $urlPhotoAvecExtension = $urlPhoto . $extension;
                
        // Récupération des informations sur l'image
        $taillePixelX = getimagesize($_FILES['photo']['tmp_name'])[0];
        $taillePixelY = getimagesize($_FILES['photo']['tmp_name'])[1];
        $poids = $_FILES['photo']['size'];
        
        // Préparation des données de la photo pour l'ajout à la base de données
        $photoData = [
            'nomPhoto' =>  $_POST['nomphoto'],
            'taillePixelX' => $taillePixelX,
            'taillePixelY' => $taillePixelY,
            'poids' => $poids,
            'idUser' => $_SESSION['idUser'], 
            'urlPhoto' => $urlPhotoAvecExtension, 
            'categorie' => $categorieInfo['libelle'] . ',' . $resultat['libelle'], 
            'description'=> $_POST['description'],
            'prix' => isset($_POST['prix']) ? $_POST['prix'] : 0, 
        ];
        
        
        $photoManager->addPhoto($photoData);
        
        // Téléversement du fichier sur le serveur
        move_uploaded_file($_FILES['photo']['tmp_name'],  $urlPhotoAvecExtension);

       
        $_SESSION['success_message'] = "L'image a été transférée avec succès!";
        header("Location: ../pages/vendre.php");
        exit(); 
    } else {
       
        $_SESSION['error_message'] = "Veuillez remplir tous les champs du formulaire.";
        header("Location: ../pages/vendre.php");
        exit(); 
    }
} else {
    
    header("Location: ../pages/vendre.php");
    exit(); 
}


require_once '../include/piedDePage.inc.php'; 
?>

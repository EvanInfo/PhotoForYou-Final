<?php
    include ("../include/entete.inc.php");
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {       
        // Vérifier si l'ID de la photo est passé en paramètre POST
        if(isset($_POST['idCategorie']) && !empty($_POST['idCategorie'])) {
    
             $idCategorie = $_POST['idCategorie'];
            try {
                
                $categorieManager->supprimerCategorie($idCategorie);
                $_SESSION['success_message'] = "La catégorie a été supprimée.";
                
                
            } catch (Exception $e) {
                //echo "<p class='custom-margin-top-6'>Une erreur est survenue : " . $e->getMessage() . "</p>";
                $_SESSION['success_message'] = "Aucune catégorie a supprimée.";
               
            }
        } else {
            $_SESSION['success_message'] = "L'ID de la catégorie n'a pas été spécifié.";

        }
        
    }else{
        header("Location: ../pages/admin.php");
    }

    header("Location: ../pages/admin.php");
    exit();

?>
<?php
    include("../include/piedDePage.inc.php");
?>

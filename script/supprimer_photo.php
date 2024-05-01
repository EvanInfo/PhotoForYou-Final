<?php
    include ("../include/entete.inc.php");
?>
<?php
    if (isset($_SESSION['login']) && $_SESSION['login']==true)
    {       
        // Vérifier si l'ID de la photo est passé en paramètre POST
        if(isset($_POST['idPhoto']) && !empty($_POST['idPhoto'])) {
            // Récupérer l'ID de la photo depuis le formulaire
            $idPhoto = $_POST['idPhoto'];
            $urlPhoto = $_POST['urlPhoto'];

            // Appeler votre fonction pour supprimer la photo en utilisant l'ID
            try {
                
                $photoManager->SupprimerPhoto($idPhoto);
                echo '<p class="custom-margin-top-6">La photo a été supprimée avec succès.</p>';
                unlink( $urlPhoto);
                header("Location: ../pages/general.php");
            } catch (Exception $e) {
                //echo "<p class='custom-margin-top-6'>Une erreur est survenue : " . $e->getMessage() . "</p>";
                echo '<p class="custom-margin-top-6">Aucune photo a supprimée.</p>';
            }
        } else {
            echo "L'ID de la photo n'a pas été spécifié.";
        }
        
    }else{
        header("Location: ../pages/general.php");
    }

?>
<?php
    include("../include/piedDePage.inc.php");
?>

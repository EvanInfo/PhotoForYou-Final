<?php
include ("../include/entete.inc.php");
?>

<form method="post" action="../script/choix_categorie.php" id="categorieForm">
        <label for="categorie">Catégorie :</label>
        <select name="categorie" id="categorie" class="btn btn-secondary dropdown-toggle dropdown-nouveautes" onchange="submitForm()">
            <?php
            $listeCategorie = $categorieManager->getCategorie(2);

            // Si une catégorie est passée dans le paramètre GET, affichez cette catégorie en premier
            $categorieActuelle = isset($_GET['categorie']) ? htmlspecialchars($_GET['categorie']) : null;

            foreach ($listeCategorie as $categorie) {
                // Utilisez $categorieActuelle pour déterminer si cette option doit être sélectionnée
                $selectionner = ($categorie['libelle'] == $categorieActuelle) ? 'selected' : '';

                echo '<option value="' . $categorie['idCategorie'] . '" ' . $selectionner . '>' . $categorie['libelle'] . '</option>';
            }
            ?>
        </select>
        <!-- Permet de récupérer la page actuelle pour les scripts catégorie-->
        <input type="hidden" name="PageActuelle" value="<?php echo basename($_SERVER['SCRIPT_NAME']); ?>">
    </form>

    <div class="container">
        <div class="row custom-margin-top-6">
            <?php
            if (isset($_GET['categorie'])) {
                $categorie = htmlspecialchars($_GET['categorie']);
                $photo = $photoManager->affichePlusieursPhotos($categorie, '');
            } else {
                $photo = $photoManager->affichePhotos('');
            }
            ?>


            <?php
                include('../script/affichage_Photos.php');
            ?>
        </div>
    </div>


<?php
include("../include/piedDePage.inc.php");
?>

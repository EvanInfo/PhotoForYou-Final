<?php
include ("../include/entete.inc.php");
?>

<form method="post" action="../script/choix_categorie.php" id="categorieForm">
        <label for="categorie">Catégorie :</label>
        <select name="categorie" id="categorie" class="btn btn-secondary dropdown-toggle dropdown-nouveautes" onchange="submitForm()">
            <?php
            $listeCategorie = $categorieManager->getCategorie(1);

            // Si une catégorie est passée dans le paramètre GET, affichez cette catégorie en premier
            $categorieActuelle = isset($_GET['categorie']) ? htmlspecialchars($_GET['categorie']) : null;

            foreach ($listeCategorie as $categorie) {
                // Utilisez $categorieActuelle pour déterminer si cette option doit être sélectionnée
                $selectionner = ($categorie['libelle'] == $categorieActuelle) ? 'selected' : '';

                echo '<option value="' . $categorie['idCategorie'] . '" ' . $selectionner . '>' . $categorie['libelle'] . '</option>';
            }
            ?>
        </select>
    </form>


<div class="row custom-margin-top-6">
    <?php
    if (isset($_GET['categorie'])) {
        $categorie = htmlspecialchars($_GET['categorie']);
        $photo = $photoManager->affichePlusieursPhotos($categorie, 'Les nouveautes');
    } else {
        $photo = $photoManager->affichePhotos('Les nouveautes');
    }
    ?>


    <?php
    foreach ($photo as $photos) {
        echo '<div class="col-md-2 mb-3">';
        echo '<div class="card bg-warning border-dark text-center ">';
        echo '<img class="card-img-top custom-img-size d-block w-100" src="' . $photos['urlPhoto'] . '" alt="Photo">';
        
        // Ajouter le nom et la description ici
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $photos['nomPhoto'] . '</h5>';
        echo '<p class="card-text">' . $photos['description'] . '</p>';
        echo '<p class="card-text">'."Prix ". $photos['prix'] . "€" . '</p>';

        echo '</div>';
        
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>


<?php
include("../include/piedDePage.inc.php");
?>

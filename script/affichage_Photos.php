<?php

// Script utiliser pour l'affichage des photos.
foreach ($photo as $photos) {

    if ($photos['estSupprimee'] == 0)
    {
        // Utilisation de l'ID de la photo pour créer un ID unique pour chaque formulaire
        $formID = "photoForm_" . $photos['idPhoto'];

        echo '<div class="col-md-3 mb-3">';
            echo '<form id="' . $formID . '" action="../pages/descriptionPhoto.php" method="post">';
                echo '<input type="hidden" name="idPhoto" value="' . $photos['idPhoto'] . '">';
                    echo '<div class="image img-fluid custom-img" onclick="valideForm(\'' . $formID . '\')"><img src="' . $photos['urlPhoto'] . '"></div>';
            echo '</form>';
        echo '</div>';
    }
}
?>

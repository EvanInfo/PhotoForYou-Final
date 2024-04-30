<?php
    foreach ($photo as $photos) {

        if ($photos['estSupprimee'] == 0)
        {
            echo'<div class="col-md-3 mb-3">';
                echo '<div class="image img-fluid custom-img"><img src="' . $photos['urlPhoto'] . '"></div>';
            echo'</div>';        

            //echo "L'identifiant de la photo est : " . $photos['idPhoto'];

        }
        
    }
?>
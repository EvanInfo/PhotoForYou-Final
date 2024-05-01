<?php
    include ("../include/entete.inc.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idPhoto"])) {
        
        $idPhoto = $photoManager->affichePhotoByID($_POST["idPhoto"]);
        $idUser = $_SESSION['idUser'];
?>

        <div class="container custom-margin-top-6">
            <div class="row">
                <div class="col-md-6">
                    <?php
                       
                        echo'<div class="image-container">';
                            foreach ($idPhoto as $Photo){
                                echo '<img src="'. $Photo['urlPhoto'] . '" class="image img-fluid custom-img img-description" alt="Photo">';
                            }
                        echo'</div>';
                    
                    ?>
                </div>
                <div class="col-md-6">
                    
                    <div class="card">
                        <div class="card-body">
                            <?php  foreach ($idPhoto as $Photo){ ?>
                                <h5 class="card-title"><?php echo $Photo['nomPhoto']?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Prix = <?php echo $Photo['prix']?>€</h6>
                                <p class="card-text">Description: <?php echo $Photo['description']?></p>

                            <?php 
                                if (isset($_SESSION['login']) && $_SESSION['login'] == True && $idUser == $Photo['idUser']){
                                    echo '<form action="../script/supprimer_photo.php" method="post">';
                                        echo '<input type="hidden" name="idPhoto" value="' . $Photo['idPhoto'] . '">';
                                        echo '<input type="hidden" name="urlPhoto" value="' . $Photo['urlPhoto'] . '">';
                                    echo '<button type="submit" class="btn btn-secondary" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette photo ?\')">Supprimer</button>';
                                    echo '</form>';
                                }
                            
                            }   
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
<?php
    
    include("../include/piedDePage.inc.php");
?>

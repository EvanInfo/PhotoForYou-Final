<?php include ("../include/entete.inc.php"); ?>

<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['TypeUtilisateur'] == "admin") {
    ?>
    <div class="container mt-4 custom-margin-top-6">
        <div class="row">
            <div class="col-md-12">
                <h2>Liste des catégories</h2>
                <div class="table-responsive scrollable-table">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Libellé</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                                <?php
                                    $categories = $categorieManager->afficherCatégorie(); 
                                    foreach ($categories as $categorie) {
                                ?>
                                <tr>
                                    <td><?php echo $categorie['idCategorie']; ?></td>
                                    <td><?php echo $categorie['libelle']; ?></td>
                                    <td>
                                        <form action="../script/supprimer_Categorie.php" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                                            <input type="hidden" name="idCategorie" value="<?php echo $categorie['idCategorie']; ?>">
                                            <button type="submit" class="btn btn-secondary">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    
                    </table>
                </div>
                <?php
                        if (isset($_SESSION['success_message'])) {
                            echo '<p class="success-message">' . $_SESSION['success_message'] . '</p>';

                            // Effacer le message de succès après l'avoir affiché
                            unset($_SESSION['success_message']);
                        }
                    ?>

                <form action="../script/ajouter_Categorie.php" method="post">
                    <div class="form-group">
                        <label for="nouvelleCategorie">Nouvelle catégorie :</label>
                        <input type="text" class="form-control" id="nouvelleCategorie" name="nouvelleCategorie">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter une catégorie</button>

                </form>
                <?php
                    if (isset($_SESSION['success_message'])) {
                        echo '<p class="success-message">' . $_SESSION['success_message'] . '</p>';

                        // Effacer le message de succès après l'avoir affiché
                        unset($_SESSION['success_message']);
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
} else {
    header('Location: accueil.php');
}
?>

<?php include ("../include/piedDePage.inc.php"); ?>

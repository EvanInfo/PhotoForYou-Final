<?php
class CategorieManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDB($db);
    }
    
    /**
     * Récupère et affiche les photos de la base de données en fonction de la catégorie spécifiée.
     *
     * @param string $categorie La catégorie utilisée comme critère de recherche pour les photos.
     * @return array Un tableau de tableaux associatifs représentant les informations des photos récupérées.
     *              Chaque tableau associatif correspond à une photo.
     * @throws Exception En cas d'erreur lors de la récupération des photos depuis la base de données.
     */
    public function getCategorie($id)
    {
        $q = $this->_db->prepare('SELECT idCategorie, libelle FROM categorie WHERE idCategorie > :id');
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->execute();

        $categorieInfo = $q->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $categorieInfo;
    }
        
    /**
     * Récupère les informations d'une catégorie avec un identifiant spécifié.
     *
     * @param int $id L'identifiant de la catégorie à récupérer.
     * @return array|false Un tableau associatif représentant les informations de la catégorie récupérée,
     *                     ou false si la catégorie n'est pas trouvée.
     */
    public function getCategorieById($id)
    {
        $q = $this->_db->prepare('SELECT idCategorie, libelle FROM categorie WHERE idCategorie = :id');
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->execute();

        $categorieInfo = $q->fetch(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $categorieInfo;
    }

    public function afficherCatégorie()
    {
        $q = $this->_db->prepare('SELECT idCategorie, libelle FROM categorie');
        $q->execute();

        $categorieInfo = $q->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $categorieInfo;
    }

    public function ajouterCategorie(Categorie $categorie)
    {
        $libelle = $categorie->getLibelle();

        // Obtient le dernier ID utilisé dans la table des catégories
        $dernierId = $this->dernierIdCategorie();

        // Génère un nouvel ID unique
        $nouvelId = $dernierId + 1;

        $requete = $this->_db->prepare("INSERT INTO categorie (idCategorie, libelle) VALUES (:idcategorie, :libelle)");

        try {
            $requete->bindParam(':idcategorie', $nouvelId, PDO::PARAM_INT);
            $requete->bindParam(':libelle', $libelle, PDO::PARAM_STR);

            // Exécute la requête d'insertion
            $requete->execute();

            return $nouvelId; // Retourne le nouvel ID de la catégorie
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }


    public function supprimerCategorie($idCategorie)
    {
        $q = $this->_db->prepare("DELETE FROM categorie WHERE idCategorie = :idCategorie");

        try {
            $q->bindParam(':idCategorie', $idCategorie, PDO::PARAM_INT);

            return $q->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    
    private function dernierIdCategorie()
    {
        $requete = $this->_db->prepare("SELECT MAX(idCategorie) AS dernierId FROM categorie");
        $requete->execute();
        $ligne = $requete->fetch(PDO::FETCH_ASSOC);

        if ($ligne && isset($ligne['dernierId'])) {
            return (int)$ligne['dernierId'];
        } else {
            return 0; // Si aucune catégorie n'a été ajoutée, retourne 0
        }
    }


    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>

<?php
class Categorie

/**
 * Classe Categorie
 * 
 * Cette classe représente les catégories pour les photos
 * Elle permet de gérer les informations relatives au catégorie des photos.
 */
{
	// Attributs
	private $_idCategorie;
	private $_libelle;
	
	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}

	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value) {
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	// Getters

	public function getId()
	{
		return $this->_idCategorie;
	}

	public function getlibelle()
	{
		return $this->_libelle;
	}

	
	// Setters

	public function setId($id)
	{
		if (is_numeric($id) && $id > 0) {
			$this->_idCategorie = (int) $id;
		} else {
			throw new InvalidArgumentException("Identifiant invalide");
		}
	}

	public function setLibelle($libelle)
	{
		if (is_string($libelle) && strlen($libelle) <= 25) {  
			$this->_libelle = htmlspecialchars($libelle);  
		} else {
			throw new InvalidArgumentException("Libellé invalide");
		}
	}


}
?>
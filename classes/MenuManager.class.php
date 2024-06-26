<?php
class MenuManager
/**
 * Classe MenuManager
 * 
 * Il s'agit du manager de la classe menu.
 * Elle permet de gérer les methodes relatives à la classe menu.
 */
{
	private $_db;

	public function __construct($db)
	{
		$this->setDB($db);
	}

	
	public function getMenu($sonType)
	{
		// Ajoutez des déclarations de débogage ici
		// echo "Fonction getMenu appelée avec sonType = $sonType";
	
		$q = $this->_db->prepare('SELECT nomMenu, Lien FROM menu WHERE Habilitation LIKE :sonType and idMenu <= 4');
		$q->execute([':sonType' => '%' . $sonType . '%']);
		$menuItems = $q->fetchAll(PDO::FETCH_ASSOC);
	
		// var_dump($menuItems); // Affiche les résultats de la requête
	
		return $menuItems;
	}
	
	public function MenuDiplay($sonType)
	{
		// Ajoutez des déclarations de débogage ici
		// echo "Fonction getMenu appelée avec sonType = $sonType";

		if ($sonType == 'Admin') {
			$q = $this->_db->prepare('SELECT nomMenu, Lien FROM menu WHERE idMenu > 5');
		} else {
			$q = $this->_db->prepare('SELECT nomMenu, Lien FROM menu WHERE Habilitation = :sonType and idMenu > 2');
		}
		$q->execute([':sonType' =>  $sonType ]);
		$menuItems = $q->fetchAll(PDO::FETCH_ASSOC);

		// var_dump($menuItems); // Affiche les résultats de la requête

		return $menuItems;
	}


	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
?>
<?php
class Menu
{
	// Attributs
	private $_idMenu;
	private $_nomMenu;
    private $_Lien;
    private $_Habilitation;

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

	public function getIdMenu()
	{
		return $this->_idMenu;
	}

	public function getNomMenu()
	{
		return $this->_nomMenu;
	}

    public function getLien()
	{
		return $this->_Lien;
	}
	
    public function getHabilitation()
	{
		return $this->_Habilitation;
	}
	

	// Setters

	public function setId($idmenu)
	{
		$idmenu = (int) $idmenu;
		if ($idmenu > 0)
		{
			$this->_idMenu = $idmenu;
		}	
	}

	
	public function setNomMenu($NomMenu)
	{
		if (is_string($NomMenu))
		{
			$this->_nomMenu = $NomMenu;
		}	
	}

    public function setLien($Lien)
	{
		if (is_string($Lien))
		{
			$this->_Lien = $Lien;
		}	
	}

    public function setHabilitation($Habilitation)
	{
		if (is_string($Habilitation))
		{
			$this->_Habilitation = $Habilitation;
		}	
	}



}
?>
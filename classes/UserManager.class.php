<?php
class UserManager
/**
 * Classe UserManager
 * 
 * Il s'agit du manager de la classe user.
 * Elle permet de gérer les methodes relatives à la classe user.
 */
{
	private $_db;

	public function __construct($db)
	{
		$this->setDB($db);
	}

	public function add(User $user)
	{
		$q = $this->_db->prepare('INSERT INTO users(nom,prenom,type,mail,mdp) VALUES(:nom, :prenom, :type, :mail, :mdp)');
		$q->bindValue(':nom', $user->getNom());
		$q->bindValue(':prenom', $user->getPrenom());
		$q->bindValue(':type', $user->getType());
		$q->bindValue(':mail', $user->getMail());
		$q->bindValue(':mdp', md5($user->getMdp()));

		$q->execute();

		$user->hydrate([
			'Id' => $this->_db->lastInsertId(),
			'Credit' => 0]);
	}

	public function getUser($sonMail)
	{
		$q= $this->_db->query('SELECT id_user, Nom, Prenom, Mail, Mdp, Type FROM users WHERE Mail = "'. $sonMail .'"');
		$userInfo = $q->fetch(PDO::FETCH_ASSOC);
		if ($userInfo)
		{
			return new User($userInfo);
		}	
		else
		{
			return $userInfo;
		}
	}
	public function getIdUser($mail)
	{
		$q = $this->_db->prepare('SELECT id_user FROM users WHERE Mail = :mail');
		$q->execute([':mail' => $mail]);
		$userId = $q->fetchColumn();

		return $userId;
	}


	
	public function count()
	{
		return $this->_db->query("SELECT COUNT(*) FROM users")->fetchColumn();
	}

	public function exists($mailUser, $mdpUser)
	{
		$q= $this->_db->prepare('SELECT COUNT(*) FROM users WHERE mail = :mail AND mdp = :mdp');
		$q->execute([':mail'=> $mailUser, ':mdp'=> $mdpUser]);
		return (bool) $q->fetchColumn();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
?>
<?php

namespace Blog\Models;

class Members
{
	protected $error = [];
	protected $id;
	protected $pseudo;
	protected $password;
	protected $email;

	const PSEUDO_INVALIDE = 1; 
	const PASSWORD_INVALIDE = 2;
	const EMAIL_INVALIDE = 3;

	public function __construct($values = [])
	{
		if (! empty($values)) {
			$this->hydrate($values);
		}
	}

	public function hydrate($data)
	{
		foreach ($data as $attribut => $value) {
			$method = 'set'.ucfirst($attribut);

			if (is_callable([$this, $method])) {
				$this->$method($value);
			}
		}
	}

/*-----setters-----*/

	public function setId($id)
	{
		$this->id = (int) $id;
	}

	public function setPseudo($pseudo)
	{
		if (! is_string($pseudo) and empty($pseudo)) {
			$this->error[] = self::PSEUDO_INVALIDE;
		} else {
			$this->pseudo = $title;
		}
	}

	public function setPassword($password)
	{
		if (! is_string($password)) {
			$this->error[] = self::PASSWORD_INVALIDE;
		}
	}

/*-----getters-----*/

	public function error()
	{
		return $this->error;
	}

	public function id()
	{
		return $this->id;
	}

	public function pseudo()
	{
		return $this->pseudo;
	}

	public function password()
	{
		return $this->password;
	}

	public function email()
	{
		return $this->email;
	}
}
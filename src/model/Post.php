<?php

class Post
{
	protected $error = [];
	protected $id;
	protected $title;
	protected $content;
	protected $datePost;

	const TITRE_INVALIDE = 1; 
	const CONTENU_INVALIDE = 2;

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

	public function setTitle($title)
	{
		if (! is_string($title) and empty($title)) {
			$this->error[] = self::TITRE_INVALIDE;
		}
		else {
			$this->title = $title;
		}
	}

	public function setContent($content)
	{
		if (! is_string($content)) {
			$this->error[] = self::CONTENU_INVALIDE;
		}
	}

	public function setDatePost(DateTime $datePost)
	{
		$this->datePost = $datePost;
	}

/*-----getters-----*/

	public function error()
	{
		return $this->$error;
	}

	public function id()
	{
		return $this->$id;
	}

	public function title()
	{
		return $this->$title;
	}

	public function content()
	{
		return $this->$content;
	}

	public function datePost()
	{
		return $this->$datePost;
	}
}
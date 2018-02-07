<?php

class Comment
{
	protected $error = [];
	protected $id;
	protected $idPost;
	protected $author;
	protected $content;
	protected $dateComment;

	const PSEUDO_INVALIDE = 1;
	const CONTENUE_INVALIDE = 2;

	public function __construct($values = [])
	{
		if (! empty($values)) {
			$this->hydrate($values);
		}

	public function hydrate($data)
	{
		foreach ($data as $attribut => $value) {
			$method = 'set'.ucfirst($attribut);

			if(is_callable([$this, $method])) {
				$this->$method($value);
			}
		}
	}
	
/*-----setters-----*/

	public function setId($id)
	{
		$this->id = (int) $id;
	}

	public function setIdPost($idPost)
	{
		$this->idPost = (int) $setId;
	}

	public function setAutor($author)
	{
		if (! is_string($author) and empty($author)) {
			$this->error[] = self::PSEUDO_INVALIDE;
		}
		else {
			$this->author = $author;
		}
	}

	public function setContent($content)
	{
		if (! is_string($content) and empty($content)) {
			$this->error[] = self::CONTENUE_INVALIDE;
		}
		else {
			$this->content = $content;
		}
	}

	public function setDateComment(DateTime $dateComment)
	{
		return $this->dateComment = $dateComment;
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

	public function idPost()
	{
		 return $this->idPost;
	}

	public function author()
	{
		return $this->author;
	}

	public function content()
	{
		return $this->content;
	}

	public function dateComment()
	{
		return $this->dateComment;
	}
}
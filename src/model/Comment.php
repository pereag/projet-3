<?php

class Comment
{
	protected $error = [];
	protected $id;
	protected $idPost;
	protected $report;
	protected $pseudo;
	protected $content;
	protected $dateComment;

	const REPORT_INVALIDE = 1;
	const PSEUDO_INVALIDE = 2;
	const CONTENT_INVALIDE = 3;

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

	public function setreport($report)
	{
		if($report = 0 or = 1){
			$this->report = (int) $report;	
		}
		else {
			$this->error[] = self::REPORT_INVALIDE;
		}
	}

	public function setpseudo($pseudo)
	{
		if (! is_string($pseudo) && empty($pseudo)) {
			$this->error[] = self::PSEUDO_INVALIDE;
		}
		else {
			$this->pseudo = $pseudo;
		}
	}

	public function setContent($content)
	{
		if (! is_string($content) && empty($content)) {
			$this->error[] = self::CONTENT_INVALIDE;
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

	public function report()
	{
		 return $this->report;
	}

	public function pseudo()
	{
		return $this->pseudo;
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
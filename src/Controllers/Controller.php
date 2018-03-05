<?php

namespace Blog\Controllers;

use \Twig_Loader_Filesystem;
use \Twig_Environment;

class Controller
{
	protected $twig;

	public function __construct()
	{

	    $loader = new Twig_Loader_Filesystem('src/Views');// Dossier contenant les templates

	    $this->twig = new Twig_Environment($loader, array('cache' => false));
	    $this->twig->addGlobal('_session',$_SESSION);
	}
}
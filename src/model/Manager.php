<?php
class Manager
{
	protected $db;

	public function __construct()
	{
		$this->db = $this->dbconnect();
	}
	
	protected function dbconnect()
	{
		$db = new PDO('mysql:host=localhost;dbname=projet_3;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
	}
}
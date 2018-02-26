<?php

namespace Blog\Models;

use Blog\Models\Manager;

class MembersManager extends \Blog\Models\Manager
{
	public function getLogin($pseudo, $password)
	{
		$db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, password FROM members WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $getMember = $req->fetch(\PDO::FETCH_ASSOC);
        if($pseudo == $getMember['pseudo'] && password_verify($password, $getMember['password'])) {
        	$_SESSION['auth'] = $pseudo;

        	return true;
        }
        else{
        	return false;
        }
       
	}
}
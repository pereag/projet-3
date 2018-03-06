<?php

namespace Blog\Models;

use Blog\Models\Manager;
use \PDO;


class PostManager extends Manager
{
	public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, SUBSTRING(content,1,350) AS content, DATE_FORMAT(datePost, \'%d/%m/%Y\') AS datePost FROM posts ORDER BY id DESC');
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $post)
            {
                $obj[] = new Post($post);
            }
        return $obj; 
    }

    public function getPost($id)
    {
    	$db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(datePost, \'%d/%m/%Y\') AS datePost FROM posts WHERE id = ?');
        $req->execute(array($id));
        return new Post($req->fetch(PDO::FETCH_ASSOC));
	}

    public function getPostsAdmin()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, SUBSTRING(content,1,116) AS content, DATE_FORMAT(datePost, \'%d/%m/%Y\') AS datePost FROM posts ORDER BY datePost DESC');
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $post)
            {
                $obj[] = new Post($post);
            }
        return $obj; 
    }
   
    public function createPost($title, $content)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO posts( title, content, datePost) VALUES(?, ?,  NOW())');
        $affectedPost = $post->execute(array($title, $content));
    return $affectedPost;
    }

    public function deletePostAdmin($id)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('DELETE FROM posts WHERE id = ?');
        $deletePost = $post->execute(array($id));
        return $deletePost;
    }

     public function getModifArticleAdmin($id)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('SELECT id, title, content FROM posts WHERE id = ?');
        $post->execute(array($id));
        foreach ($post->fetchAll(PDO::FETCH_ASSOC) as $Post)
            {
                $obj[] = new Post($Post);
            }
         return $Post;
    }

    public function sendArticleAdmin($title, $content, $id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE posts SET title = ?, content = ?  WHERE id = ?');
        $returnArticle = $comments->execute(array($title, $content, $id));
        return $returnArticle;
    }
}
<?php

namespace Blog\Models;

use Blog\Models\Manager;
use \PDO;


class PostManager extends Manager
{
	public function getPosts()
    {
        $req = $this->db->query('SELECT id, title, SUBSTRING(content,1,350) AS content, DATE_FORMAT(datePost, \'%d/%m/%Y\') AS datePost FROM posts ORDER BY datePost');
        $aresp = $req->fetchAll(PDO::FETCH_ASSOC);
        if (!$aresp) {
            $obj = [];
        }
        else {
            foreach ($aresp as $post) {
                $obj[] = new Post($post);
            }
        }
        return $obj; 
    }

    public function getPost($id)
    {
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(datePost, \'%d/%m/%Y\') AS datePost FROM posts WHERE id = ?');
        $req->execute(array($id));
        return new Post($req->fetch(PDO::FETCH_ASSOC));
	}

    public function getPostsAdmin()
    {
        $req = $this->db->query('SELECT id, title, SUBSTRING(content,1,116) AS content, DATE_FORMAT(datePost, \'%d/%m/%Y\') AS datePost FROM posts ORDER BY datePost DESC');
         $aresp = $req->fetchAll(PDO::FETCH_ASSOC);
        if (!$aresp) {
            $obj = [];
        }
        else {
            foreach ($aresp as $post) {
                $obj[] = new Post($post);
            }
        }
        return $obj;
    }
   
    public function createPostAdmin($title, $content)
    {
        $post = $this->db->prepare('INSERT INTO posts( title, content, datePost) VALUES(?, ?,  NOW())');
        $affectedPost = $post->execute(array($title, $content));
    return $affectedPost;
    }

    public function deletePostAdmin($id)
    {
        $post = $this->db->prepare('DELETE FROM posts WHERE id = ?');
        $deletePost = $post->execute(array($id));
        return $deletePost;
    }

     public function getModifArticleAdmin($id)
    {
        $req = $this->db->prepare('SELECT id, title, content FROM posts WHERE id = ?');
        $req->execute(array($id));
        return new Post($req->fetch(PDO::FETCH_ASSOC));
    }

    public function sendArticleAdmin($title, $content, $id)
    {
        $comments = $this->db->prepare('UPDATE posts SET title = ?, content = ?  WHERE id = ?');
        $returnArticle = $comments->execute(array($title, $content, $id));
        return $returnArticle;
    }
}
<?php

namespace Blog\Models;

use Blog\Models\Manager;
use \PDO;


class CommentManager extends Manager
{	
	public function getComments($postId)
	{
        $req = $this->db->prepare('SELECT id, pseudo, idPost, content, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin\') AS dateComment FROM comments WHERE idPost = ? ORDER BY dateComment DESC');
        $req->execute(array($postId));
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $comment)
            {
                $obj[] = new comment($comment);
            }
         return $obj;
	}

	public function postComment($postId, $pseudo, $content)
    {
        $comments = $this->db->prepare('INSERT INTO comments(idPost, pseudo, content, date_comment) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $pseudo, $content));
        return $affectedLines;
    }

    public function reportCommentPost($id)
    {
        $comments = $this->db->prepare('UPDATE comments SET report = 1 WHERE id = ?');
        $returnReport = $comments->execute(array($id));
    }

    public function returnRestoreCommentAdmin($id)
    {
        $comments = $this->db->prepare('UPDATE comments SET report = 0 WHERE id = ?');
        $restore = $comments->execute(array($id));
    }

    public function deleteCommentAdmin($id)
    {
        $comments = $this->db->prepare('DELETE FROM comments WHERE id = ?');
        $deleteComment = $comments->execute(array($id));
    }

     public function deleteEveryComments($id)
    {
        $comments = $this->db->prepare('DELETE FROM comments WHERE idPost = ?');
        $deleteComments = $comments->execute(array($id));
    }

    public function getCommentsAdmin()
    {
        $req = $this->db->query('SELECT id, idPost, pseudo, content, report, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%i\') AS dateComment FROM comments WHERE report = 0 ORDER BY idPost DESC');
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $comment)
            {
                $obj[] = new comment($comment);
            }
        return $obj;
    }

    public function getReportCommentsAdmin()
    {
        $req = $this->db->query('SELECT id, idPost, pseudo, content, report, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%i\') AS dateComment FROM comments WHERE report = 1 ORDER BY idPost DESC');
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $comment)
            {
                $obj[] = new comment($comment);
            }
        return $obj;
    }
}
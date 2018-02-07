<?php
require_once('Manager.php');

class CommentManager extends Manager
{	
	public function getComments($postId)
	{
		$db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pseudo, id_post, content, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin\') AS dateComment_fr FROM comments WHERE id_post = ? ORDER BY date_comment DESC');
        $req->execute(array($postId));

        return $req;
	}

	public function postComment($postId, $pseudo, $content)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(id_post, pseudo, content, date_comment) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $pseudo, $content));

        return $affectedLines;
    }
    public function reportCommentPost($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET report = 1 WHERE id = ?');
        $returnReport = $comments->execute(array($id));
    }
    public function returnRestoreCommentAdmin($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET report = 0 WHERE id = ?');
        $restore = $comments->execute(array($id));
    }
    public function deleteCommentAdmin($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments WHERE id = ?');
        $deleteComment = $comments->execute(array($id));
    }
     public function deleteEveryComments($id)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments WHERE id_post = ?');
        $deleteComments = $comments->execute(array($id));
    }
    public function getCommentsAdmin()
    {
         $db = $this->dbConnect();
        $req = $db->query('SELECT id, id_post, pseudo, content, report, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%i\') AS dateComment_fr FROM comments WHERE report = 0 ORDER BY date_comment DESC');

        return $req;
    }

    public function getReportCommentsAdmin()
    {
         $db = $this->dbConnect();
        $req = $db->query('SELECT id, id_post, pseudo, content, report, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%i\') AS dateComment_fr FROM comments WHERE report = 1 ORDER BY date_comment DESC');

        return $req;
    }
}
<?php
require_once('src/model/PostManager.php');
require_once('src/model/CommentManager.php');

class frontendController
{
	public function listPostsView()
	{
		$postManager = new PostManager();
		$posts = $postManager->getPosts();
		require('src/view/frontend/listPostsView.php');
	}

	 public function legalNoticeView()
	{
		require('src/view/frontend/legalNoticeView.php');
	}

	 public function postView()
	{
		$postManager = new PostManager();
		$commentManager = new CommentManager();

		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager->getComments($_GET['id']);


		require('src/view/frontend/postView.php');
	}

	public function addComment($postId, $pseudo, $content)
	{
	    $commentManager = new CommentManager();

	    $affectedPost = $commentManager->postComment($postId, $pseudo, $content);

	    if ($affectedPost === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    }
	    else {
	        header('Location: index.php?action=postView&id=' . $postId);
	    }
	}
	public function reportComment($id)
	{
		$commentManager = new commentManager();
		$reportComment = $commentManager->reportCommentPost($_GET['id']);
		header('location: index.php?action=postView&id=' . $postid);
	}
	public function loginView()
	{
		require('src/view/frontend/loginView.php');
	}
	public function lostPasswordView()
	{
		require('src/view/frontend/lostPasswordView.php');
	}
}
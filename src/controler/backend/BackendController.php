<?php
require_once('src/model/PostManager.php');
require_once('src/model/CommentManager.php');

class BackendController
{
	public function listPostsAdmin()
	{
		$postManager = new PostManager();
		$posts = $postManager->getPostsAdmin();
		require('src/view/backend/listPostsAdmin.php');
	}
	public function legalNoticeAdmin()
	{
		require('src/view/backend/legalNoticeAdmin.php');
	}
	public function newPostAdmin()
	{
		require('src/view/backend/newPostAdmin.php');
	}
	public function listCommentsAdmin()
	{
		$commentManager = new commentManager();
		$comments = $commentManager->getCommentsAdmin();
		$commentsReport = $commentManager->getReportCommentsAdmin();
		require('src/view/backend/listcommentsAdmin.php');
	}
	public function addPost($title, $content)
	{
	    $postManager = new postManager();

	    $newPost = $postManager->createPost($title, $content);

	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter l\'article les champs ne sont pas tous remplis');
	    }
	    else {
	        header('Location: index.php?action=listPostsAdmin');
	    }
	}
	public function restoreCommentAdmin($id)
	{
		$commentManager = new commentManager();
		$returnRestoreComment = $commentManager->returnRestoreCommentAdmin($_GET['id']);
		header('location: index.php?action=listCommentsAdmin');
	}
	public function removeCommentAdmin($id)
	{
		$commentManager = new commentManager();
		$removeComment = $commentManager->deleteCommentAdmin($_GET['id']);
		header('location: index.php?action=listCommentsAdmin');
	}
	public function removePostAdmin($id)
	{
		$postManager = new postManager();
		$commentManager = new commentManager();
		$removePost = $postManager->deletePostAdmin($_GET['id']);
		$removecommentspost = $commentManager->deleteEveryComments($_GET['id']);
		header('location: index.php?action=listPostsAdmin');
	}
	public function modifPostAdmin($id)
	{
		$postManager = new postManager();
		$modifPost = $postManager->getModifArticleAdmin($_GET['id']);
		require('src/view/backend/modifPostAdmin.php');
	}
	public function sendModifPostAdmin($title, $content, $id)
	{
		$postManager = new postManager();
		$modifPost = $postManager->sendArticleAdmin($title, $content, $_GET['id']);
		header('location: index.php?action=listPostsAdmin');
	}
}


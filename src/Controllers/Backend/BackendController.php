<?php

namespace Blog\Controllers\Backend;


use Blog\Models\PostManager;
use Blog\Models\CommentManager;
use \Exception;
class BackendController extends \Blog\Controllers\Controller
{
	public function listPostsAdmin()
	{
		$postManager = new PostManager();

		$posts = $postManager->getPostsAdmin();
		return $this->twig->render('backend/listPostsAdmin.twig', array(
			'posts' => $posts,
		));
	}

	public function newPostAdmin()
	{
		return $this->twig->render('backend/newPostAdmin.twig');
	}

	public function listCommentsAdmin()
	{
		$commentManager = new commentManager();
		$comments = $commentManager->getCommentsAdmin();
		$commentsReport = $commentManager->getReportCommentsAdmin();
		return $this->twig->render('backend/listCommentsAdmin.twig',array(
			'comments' => $comments,
			'commentsReport' => $commentsReport,
		));
	}

	public function addPost($title, $content)
	{
	    $postManager = new postManager();

	    $newPost = $postManager->createPost($title, $content);

	    if ($affectedLines === false) {
	        throw new Exception('Impossible d\'ajouter l\'article les champs ne sont pas tous remplis');
	    } else {
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
		return $this->twig->render('backend/modifPostAdmin.twig', array(
			'modifPost' => $modifPost,
		));
	}

	public function sendModifPostAdmin($title, $content, $id)
	{
		$postManager = new postManager();
		$modifPost = $postManager->sendArticleAdmin($title, $content, $_GET['id']);
		header('location: index.php?action=listPostsAdmin');
	}

	public function sessionDestroyAdmin()
	{
		session_destroy();
	}
}


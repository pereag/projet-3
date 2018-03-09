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
		return $this->twig->render('backend/listPostsAdmin.twig', array(
			'posts' => $postManager->getPostsAdmin()
		));
	}

	public function newPostAdmin()
	{
		return $this->twig->render('backend/newPostAdmin.twig');
	}

	public function listCommentsAdmin()
	{
		$commentManager = new commentManager();
		return $this->twig->render('backend/listCommentsAdmin.twig',array(
			'comments' => $commentManager->getCommentsAdmin(),
			'commentsReport' => $commentManager->getReportCommentsAdmin()
		));

	}

	public function addPost($title, $content)
	{
	    $postManager = new postManager();
		 $newPost = $postManager->createPostAdmin(htmlspecialchars($title), $content);
	}

	public function restoreComment($id)
	{
		$commentManager = new commentManager();
		$returnRestoreComment = $commentManager->returnRestoreCommentAdmin(htmlspecialchars($_GET['id']));
	}

	public function removeComment($id)
	{
		$commentManager = new commentManager();
		$removeComment = $commentManager->deleteCommentAdmin(htmlspecialchars($_GET['id']));
	}

	public function removePost($id)
	{
		$postManager = new postManager();
		$commentManager = new commentManager();
		$removePost = $postManager->deletePostAdmin(htmlspecialchars($_GET['id']));
		$removecommentspost = $commentManager->deleteEveryCommentsAdmin(htmlspecialchars($_GET['id']));
	}

	public function modifPostAdmin($id)
	{
		$postManager = new postManager();
		return $this->twig->render('backend/modifPostAdmin.twig', array(
			'modifPost' => $postManager->getModifArticleAdmin(htmlspecialchars($_GET['id']))
		));
	}

	public function sendModifPost($title, $content, $id)
	{
		$postManager = new postManager();
		$modifPost = $postManager->sendArticleAdmin(htmlspecialchars($title), $content, htmlspecialchars($_GET['id']));
	}

	public function sessionDestroy()
	{
		session_destroy();
	}
}


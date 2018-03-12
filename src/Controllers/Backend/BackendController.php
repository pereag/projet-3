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
		 $newPost = $postManager->createPostAdmin($title, $content);
	}

	public function restoreComment($id)
	{
		$commentManager = new commentManager();
		$returnRestoreComment = $commentManager->returnRestoreCommentAdmin($id);
	}

	public function removeComment($id)
	{
		$commentManager = new commentManager();
		$removeComment = $commentManager->deleteCommentAdmin($id);
	}

	public function removePost($id)
	{
		$postManager = new postManager();
		$commentManager = new commentManager();
		$removePost = $postManager->deletePostAdmin($id);
		$removecommentspost = $commentManager->deleteEveryCommentsAdmin($id);
	}

	public function modifPostAdmin($id)
	{
		$postManager = new postManager();
		return $this->twig->render('backend/modifPostAdmin.twig', array(
			'modifPost' => $postManager->getModifArticleAdmin($id)
		));
	}

	public function sendModifPost($title, $content, $id)
	{
		$postManager = new postManager();
		$modifPost = $postManager->sendArticleAdmin($title, $content, $id);
	}

	public function sessionDestroy()
	{
		session_destroy();
	}
}


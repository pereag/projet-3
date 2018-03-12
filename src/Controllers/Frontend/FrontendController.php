<?php

namespace Blog\Controllers\Frontend;


use Blog\Models\PostManager;
use Blog\Models\CommentManager;
use Blog\Models\MembersManager;
use \Exception;

class FrontendController extends \Blog\Controllers\Controller
{
	public function listPostsView()
	{
		$postManager = new PostManager();
		$posts = $postManager->getPosts();
		return $this->twig->render('frontend/listPostsView.twig', array(
		'posts' => $postManager->getPosts()
		));
	}

	public function legalNoticeView()
	{
		return $this->twig->render('frontend/legalNoticeView.twig');
	}

	public function postView($id)
	{
		$postManager = new PostManager();
		$commentManager = new CommentManager();
		return $this->twig->render('frontend/postView.twig', array(
		'post' => $postManager->getPost($id),
		'comments' => $commentManager->getComments($id),
		));
	}

	public function addComment($postId, $pseudo, $content)
	{
	    $commentManager = new CommentManager();
		return $affectedPost = $commentManager->postComment($postId, $pseudo, $content);
	}

	public function reportComment($id)
	{
		$commentManager = new CommentManager();
		$reportComment = $commentManager->reportCommentPost($id);
	}

	public function loginView()
	{
		return $this->twig->render('frontend/loginView.twig');
	}

	public function verifyLogin($pseudo, $password)
	{
		$membersManager = new MembersManager();
		return $membersManager->getlogin($pseudo, $password);
	}
}
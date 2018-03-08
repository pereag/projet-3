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
			'post' => $postManager->getPost(htmlspecialchars($id)),
			'comments' => $commentManager->getComments(htmlspecialchars($id)),
		));
	}

	public function addComment($postId, $pseudo, $content)
	{
	    $commentManager = new CommentManager();
		$affectedPost = $commentManager->postComment(htmlspecialchars($postId), htmlspecialchars($pseudo), htmlspecialchars($content));
		if ($affectedPost === false) {
	        throw new Exception('Impossible d\'ajouter le commentaire !');
	    } else {
	        header('Location: index.php?action=postView&id=' . $postId);
	    }
	}

	public function reportComment($id, $postid)
	{
		$commentManager = new CommentManager();
		$reportComment = $commentManager->reportCommentPost(htmlspecialchars($_GET['id']));
		header('location: index.php?action=postView&id=' . $postid);
	}

	public function loginView()
	{
		return $this->twig->render('frontend/loginView.twig');
	}

	public function verifyLogin($pseudo, $password)
	{
		$membersManager = new MembersManager();
		return $membersManager->getlogin(htmlspecialchars($pseudo), htmlspecialchars($password));
		/* if($getMember) {
			header('location: index.php?action=listPostsAdmin');
		}
		else {
			throw new Exception('Identifiant ou mot de pass invalide');
		} */
	}
}
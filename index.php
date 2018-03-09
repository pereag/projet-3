<?php

session_start();

require_once('vendor/autoload.php');

use \Blog\Controllers\Frontend\FrontendController;
use \Blog\Controllers\Backend\BackendController;

try {
	if (! empty($_GET['action'])) {
		if ($_GET['action'] == 'listPostsView') {
			$frontendController = new FrontendController();
			echo $frontendController->listPostsView();
		} elseif ($_GET['action'] == 'postView') {
			if (isset($_GET['id']) && $_GET['id'] > 0 && !isset($_GET['report'])) {
				$frontendController = new FrontendController();
				echo $frontendController->postView($_GET['id']);
			} elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['report']) && $_GET['report'] = true ) {
				$frontendController = new FrontendController();
				echo $frontendController->postView();
			} else {
				throw new Exception('L\'id du billet est invalide');	
			}
		} elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (! empty($_POST['pseudo']) && ! empty($_POST['content'])) {
                	$frontendController = new FrontendController();
                    $frontendController->addComment(htmlspecialchars($_GET['id']), htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['content']));
                    if ($affectedPost === false) {
	        		throw new Exception('Impossible d\'ajouter le commentaire !');
	    			} else {
	        		header('Location: index.php?action=postView&id=' . $_GET['id']);
	    			}
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }    
        } elseif ($_GET['action'] == 'reportComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
            	if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                	$frontendController = new FrontendController();
                    $frontendController->reportComment(htmlspecialchars($_GET['id']));
                    header('location: index.php?action=postView&id=' . $_GET['postid']);
                } else { 
                	throw new Exception('L\'id de l\'article n\'est pas valide');
                }
            } else {
                    throw new Exception('L\'id du commentaire n\'est pas valide');
            }   
        } elseif ($_GET['action'] == 'loginView' ) {
			$frontendController = new FrontendController();
			echo $frontendController->loginView();
		} elseif ($_GET['action'] == 'verifyLogin' ) {
			if (! empty($_POST['pseudo']) && ! empty($_POST['password'])) {
				$frontendController = new FrontendController();
				if ($frontendController->verifyLogin(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['password']))) {
					header('location: index.php?action=listPostsAdmin');
				} else {
					throw new Exception('Identifiant ou mot de pass invalide');
				}
			} else {
				throw new Exception('identifiant manquant');
			}
		} elseif ($_GET['action'] == 'legalNoticeView') {
			$frontendController = new FrontendController();
			echo $frontendController->legalNoticeView();
		} 
/*------------------------Admin Part------------------------*/
		elseif ($_SESSION){
			if ($_GET['action'] == 'listPostsAdmin') {
				$backendController = new BackendController();
				echo $backendController->listPostsAdmin();
			} elseif ($_GET['action'] == 'listCommentsAdmin') {
				$backendController = new BackendController();
				echo $backendController->listCommentsAdmin(); 
			} elseif ($_GET['action'] == 'restoreComment') {
	            if (isset($_GET['id']) && $_GET['id'] > 0) {
	                	$backendController = new backendController();
	                    $backendController->restoreComment(htmlspecialchars($_GET['id']));
	                    header('location: index.php?action=listCommentsAdmin');
	            } else {
	                throw new Exception('L\'id n\'est pas valide');
	            }               
	        } elseif ($_GET['action'] == 'addPost') {
	        	if (! empty($_POST['title']) && ! empty($_POST['content'])) {
	              	$backendController = new backendController();
	                $backendController->addPost(htmlspecialchars($_POST['title']), $_POST['content']);
	                if ($affectedLines === false) {
	        			throw new Exception('Impossible d\'ajouter l\'article');
	    			} else {
	        			header('Location: index.php?action=listPostsAdmin');
	   				}
	            } else {
	                throw new Exception('Tous les champs ne sont pas remplis !');
	            }   
	        } elseif ($_GET['action'] == 'removeComment') {
	            if (isset($_GET['id']) && $_GET['id'] > 0) {
	                	$backendController = new backendController();
	                    $backendController->removeComment(htmlspecialchars($_GET['id']));
	                    header('location: index.php?action=listCommentsAdmin');
	            } else {
	                throw new Exception('L\'id n\'est pas valide');
	            }   
	        } elseif ($_GET['action'] == 'removePost') {
	            if (isset($_GET['id']) && $_GET['id'] > 0) {
	                	$backendController = new backendController();
	                    $backendController->removePost(htmlspecialchars($_GET['id']));
	                    header('location: index.php?action=listPostsAdmin');
	            } else {
	                throw new Exception('L\'id n\'est pas valide');
	            }   
	        } elseif ($_GET['action'] == 'newPostAdmin') {
				$backendController = new BackendController();
				echo $backendController->newPostAdmin();
			} elseif ($_GET['action'] == 'modifPostAdmin') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					$backendController = new BackendController();
					echo $backendController->modifPostAdmin(htmlspecialchars($_GET['id']));
				} else {
					throw new Exception('L\'id du billet est invalide');
				}
			} elseif ($_GET['action'] == 'sendModifPost') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					if (! empty($_POST['title']) && ! empty($_POST['content'])) {
						$backendController = new BackendController();
						$backendController->sendModifPost(htmlspecialchars($_POST['title']), $_POST['content'], htmlspecialchars($_GET['id']));
						header('location: index.php?action=listPostsAdmin');
					} else {
						throw new Exception('Les champs n\'ons pas étais remplis');
					}
				} else {
					throw new Exception('L\'id du billet est invalide');
				}
			} elseif ($_GET['action'] == 'sessionDestroy') {
				$backendController = new BackendController();
				$backendController->sessionDestroy();
				header('location: index.php');
			}
		} else {
			throw new Exception('Session expirée ou page introuvable');
		}
	} else {
		$frontendController = new FrontendController();
		echo $frontendController->listPostsView();
	}
}
catch (Exception $e) {
   echo 'Erreur: ' .$e->getMessage();
}

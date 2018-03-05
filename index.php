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
		}
		elseif ($_GET['action'] == 'postView') {
			if (isset($_GET['id']) && $_GET['id'] > 0 && !isset($_GET['report'])) {
				$frontendController = new FrontendController();
				echo $frontendController->postView($_GET['id']);
			}
			elseif (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['report']) && $_GET['report'] = true ) {
				$frontendController = new FrontendController();
				echo $frontendController->postView();
			}
			else {
				throw new Exception('L\'id du billet est invalide');	
			}
		}
		elseif ($_GET['action'] == 'addCommentView') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (! empty($_POST['pseudo']) && ! empty($_POST['content'])) {
                	$frontendController = new FrontendController();
                    $frontendController->addComment(htmlspecialchars($_GET['id']), htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['content']));
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }    
        }
        elseif ($_GET['action'] == 'reportComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
            	if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                	$frontendController = new FrontendController();
                    $frontendController->reportComment($_GET['id'],$_GET['postid']);
                }
                else { 
                	throw new Exception('L\'id de l\'article n\'est pas valide');
                }
            }
            else {
                    throw new Exception('L\'id du commentaire n\'est pas valide');
            }   
        }
		elseif ($_GET['action'] == 'loginView' ) {
			$frontendController = new FrontendController();
			echo $frontendController->loginView();
		}
		elseif ($_GET['action'] == 'verifyLogin' ) {
			if (! empty($_POST['pseudo']) && ! empty($_POST['password'])) {
				$frontendController = new FrontendController();
				if ($frontendController->verifyLogin($_POST['pseudo'], $_POST['password'])) {
					header('location: index.php?action=listPostsAdmin');
				}
				else {
					throw new Exception('Identifiant ou mot de pass invalide');
				}
			}
			else {
				throw new Exception('identifiant manquant');
			}
		}
		elseif ($_GET['action'] == 'legalNoticeView') {
			$frontendController = new FrontendController();
			echo $frontendController->legalNoticeView();
		}
/*------------------------Admin Part------------------------*/
		elseif($_SESSION){
			if ($_GET['action'] == 'listPostsAdmin') {
				$backendController = new BackendController();
				echo $backendController->listPostsAdmin();
			}
			elseif ($_GET['action'] == 'listCommentsAdmin') {
				$backendController = new BackendController();
				echo $backendController->listCommentsAdmin(); 
			}
			elseif ($_GET['action'] == 'restoreCommentAdmin') {
	            if (isset($_GET['id']) && $_GET['id'] > 0) {
	                	$backendController = new backendController();
	                    $backendController->restoreCommentAdmin($_GET['id']);
	            }
	            else {
	                    throw new Exception('L\'id n\'est pas valide');
	            }               
	        }
	        elseif ($_GET['action'] == 'addPostAdmin') {
	        	if (! empty($_POST['title']) && ! empty($_POST['content'])) {
	              	$backendController = new backendController();
	                $backendController->addPost($_POST['title'], $_POST['content']);
	            }
	            else {
	                throw new Exception('Tous les champs ne sont pas remplis !');
	            }   
	        }
	        elseif ($_GET['action'] == 'removeCommentAdmin') {
	            if (isset($_GET['id']) && $_GET['id'] > 0) {
	                	$backendController = new backendController();
	                    $backendController->removeCommentAdmin($_GET['id']);
	            }
	            else {
	                    throw new Exception('L\'id n\'est pas valide');
	            }   
	        }
	        elseif ($_GET['action'] == 'removePostAdmin') {
	            if (isset($_GET['id']) && $_GET['id'] > 0) {
	                	$backendController = new backendController();
	                    $backendController->removePostAdmin($_GET['id']);
	            }
	            else {
	                    throw new Exception('L\'id n\'est pas valide');
	            }   
	        }
			elseif ($_GET['action'] == 'newPostAdmin') {
				$backendController = new BackendController();
				echo $backendController->newPostAdmin();
			}
			elseif ($_GET['action'] == 'modifPostAdmin') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					$backendController = new BackendController();
					echo $backendController->modifPostAdmin($_GET['id']);
				}
				else {
					throw new Exception('L\'id du billet est invalide');
				}
			}
			elseif ($_GET['action'] == 'sendModifPostAdmin') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					if (! empty($_POST['title']) && ! empty($_POST['content'])) {
						$backendController = new BackendController();
						$backendController->sendModifPostAdmin($_POST['title'], $_POST['content'], $_GET['id']);
					}
					else {
						throw new Exception('Les champs n\'ons pas étais remplis');
					}
				}
				else {
					throw new Exception('L\'id du billet est invalide');
				}
			}
			elseif ($_GET['action'] == 'sessionDestroyAdmin') {
				$backendController = new BackendController();
				$backendController->sessionDestroyAdmin();
				header('location: index.php');
			}
			else {
				throw new Exception('La page n\'existe pas');
			}
		}
		else{
			throw new Exception('La session a expiré');
		}
	}
	else {
		$frontendController = new FrontendController();
		echo $frontendController->listPostsView();
	}
}
catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

<?php
require('src/controler/frontend/FrontendController.php');
require('src/controler/backend/BackendController.php');

try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'listPostsView') {
			$frontendController = new FrontendController();
			$frontendController->listPostsView();
		}
		elseif ($_GET['action'] == 'postView' ) {
			if (isset($_GET['id']) and $_GET['id'] > 0) {
				$frontendController = new FrontendController();
				$frontendController->postview();
			}
			else {
				throw new Exception('L\'id du billet est invalide');	
			}
		}
		elseif ($_GET['action'] == 'addCommentView') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (! empty($_POST['pseudo']) && ! empty($_POST['content'])) {
                	$frontendController = new FrontendController();
                    $frontendController->addComment($_GET['id'], $_POST['pseudo'], $_POST['content']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }    
        }
        elseif ($_GET['action'] == 'reportComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                	$frontendController = new FrontendController();
                    $frontendController->reportComment($_GET['id']);
            }
            else {
                    throw new Exception('L\'id n\'est pas valide');
            }   
        }
		elseif ($_GET['action'] == 'loginView' ) {
			$frontendController = new FrontendController();
			$frontendController->loginView();
		}
		elseif ($_GET['action'] == 'lostPasswordView' ) {
			$frontendController = new FrontendController();
			$frontendController->lostPasswordView();
		}
		elseif ($_GET['action'] == 'legalNoticeView' ) {
			$frontendController = new FrontendController();
			$frontendController->legalNoticeView();
		}
/*------------------------Admin Part------------------------*/
		elseif ($_GET['action'] == 'listPostsAdmin') {
			$backendController = new BackendController();
			$backendController->listPostsAdmin();
		}
		elseif ($_GET['action'] == 'listCommentsAdmin') {
			$backendController = new BackendController();
			$backendController->listCommentsAdmin(); 
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
			$backendController = new Backendcontroller();
			$backendController->newPostAdmin();
		}
		elseif ($_GET['action'] == 'modifPostAdmin') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$backendController = new Backendcontroller();
				$backendController->modifPostAdmin($_GET['id']);
			}
			else {
				throw new Exception('L\'id du billet est invalide');
			}
		}
		elseif ($_GET['action'] == 'sendModifPostAdmin') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (! empty($_POST['title']) && ! empty($_POST['content'])) {
					$backendController = new Backendcontroller();
					$backendController->sendModifPostAdmin($_POST['title'], $_POST['content'], $_GET['id']);
				}
				else {
					throw new Exception('Les champs n\'ons pas étais remplis');
				}
			}
			else {
				throw new Exception('l\'id du billet est invalide');
			}
		}
		elseif ($_GET['action'] == 'legalNoticeAdmin') { 
			$backendController = new BackendController();
			$backendController->legalNoticeAdmin();
		}
		else {
			throw new Exception('la page n\'a pas était trouver');
		}
	}
	else {
		$frontendController = new FrontendController();
			$frontendController->listPostsView();
	}
}
catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

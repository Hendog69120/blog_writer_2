<?php
session_start();
ini_set('display_errors', 1);
$credentials = require("model/credentials.php");

define('APP_ROOT', __DIR__);
define('BOOTSTRAP', $_SERVER['SCRIPT_NAME']);
define('HOMEPAGE', $_SERVER["HTTP_HOST"].BOOTSTRAP);
//var_dump(HOMEPAGE);die;

require("model/MemberManager.php");
require("model/FiveLast.php");
require("model/PostManager.php");
require("model/CommentManager.php");
require("controler/members/deconnexion.php");
require("controler/members/connection_member.php");
//require('utils/SanitizeComment.php');
$LastManager = new LastManager($credentials);
$postManager = new PostManager($credentials);
$commentManager = new CommentManager($credentials);

if (isset($_GET['billet']) && $_GET['billet'] > 0) {
    $post = $postManager->getPost($_GET['billet']);

    if (isset($_POST['post_id'], $_POST['pseudo'], $_POST['comment'])) {
        $commentManager->addComment($_POST['post_id'], $_POST['pseudo'], $_POST['comment']);
    }
    if (isset($_POST['comment_signalement'])) {
        $commentManager->signalComment($_POST['comment_signalement']);
    }
    $comments = $commentManager->getComments($_GET['billet']);

    require('view/postView.php');

}   elseif (isset($_GET['action']) && $_GET['action'] == 'addPost') {

    if (isset($_SESSION['pseudo'])) {
       
            if (isset($_POST['title']) && isset($_POST['content'])) {
            //var_dump($_SESSION);die;
            $addPost = $postManager->addPost($_POST['title'],$_POST['content']);

                if ($addPost) {
                    header('Location: http://localhost/projet4_2/index.php?action=dashboard');
                    exit;
                }
            }
        
        require('view/addPost.php');
    }
}
 elseif (isset($_GET['action']) && $_GET['action'] == 'edit') {
    
    if(isset($_SESSION['pseudo'])) {
        //if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['post_id']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['post_id']) ) {
            if (isset($_POST['title'])) {
                
            $updatePost = $postManager->updatePost($_POST['title'],$_POST['content'],$_POST['post_id']);
            
            if($updatePost) {
                
                header('Location: http://localhost/projet4_2/index.php?action=dashboard');
                exit;
            }
        }
        $post = $postManager->getPost($_GET['id']);
        
        require('view/edit.php');
    }
    
}
 elseif (isset($_GET['action']) && $_GET['action'] == 'dashboard') {
    if (isset($_SESSION['pseudo'])) {
        //suppression post
        if(isset($_POST['post_to_delete'])) {
            $postManager->deletePost($_POST['post_to_delete']);
            $_SESSION['post_deleted'] = "post Supprimé";
        }

        if(isset($_POST['comment_to_delete'])) {
            $commentManager->deleteComment($_POST['comment_to_delete']);
            $_SESSION['comment_deleted'] = "Commentaire Supprimé";
        }

        $db = $LastManager->__construct($credentials);
        $data = $LastManager->getFiveLast($credentials);
        $comments = $commentManager->getCommentsBySignalement();

        require('view/dashboard.php');
        return;
    }

    header('Location : http://localhost/projet4_2/view/connection.php');
} elseif (empty($_SERVER['QUERY_STRING'])) {

    $db = $LastManager->__construct($credentials);
    $data = $LastManager->getFiveLast($credentials);
    require("view/home.php");
} else {

    require("view/error404.html");
}





/*else {
    if (isset($_SESSION['admin'])) {

        //session non activé !!
        if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'remove') {
            $postManager->removePost($_GET['id']);
            //var_dump(removePost());die;
        }

        //???
        if (isset($_get['action']) && $_GET['action'] == 'update') {
            $postManager->updatePost($_GET['id']);
        }

    } else {
        if (isset($_GET["action"]) && $_GET["action"] == "deconnection") {
            deconnect();
        } else {
            if (isset($_POST['title']) && (isset($_POST['content']))) {
                $postManager->addPost($_POST['title'], $_POST['content']);
                header('Location: http://localhost/projet4/index.php');
            }
            // Connexion à la base de données
            $db = $LastManager->__construct($credentials);

            $data = $LastManager->getFiveLast($credentials);
            //var_dump($_SESSION);die;
            require("view/home.php");

        }
    }
}*/










<?php 

$credentials = require("../../model/credentials.php");
require('../../model/entity/member.php');
require('../../model/MemberManager.php');


$memberManager = new MemberManager($credentials);

$pseudo =$_POST['pseudo'];
$pass = $_POST['pass'];

if (($pseudo && $pass) != NULL) 
{
    $userConnect = $memberManager->userConnect($pseudo, $pass);

    if ($userConnect) {
        

        if (session_status() == PHP_SESSION_NONE) {

            session_start();
             
        }
        $_SESSION["connected"] = "Vous êtes bien connecté"; 
        $_SESSION["pseudo"] = $pseudo;

        header("Location: http://localhost/projet4_2/index.php?action=dashboard");
        exit;

    } else {
        $_SESSION["error"] = "error !!!!!!!!!!!!"; 
            //redirection vers la page du formulaire
            
    header("Location: http://localhost/projet4_2/view/connection.php");
    exit;
    }
}
else {
    //redirection vers la page du formulaire
    header("Location: http://localhost/projet4_2/view/connection.php");
    exit;
}

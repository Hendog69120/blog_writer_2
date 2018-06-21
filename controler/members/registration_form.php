<?php

require('../../model/entity/member.php');
require('../../model/MemberManager.php');

$pseudo =$_POST['pseudo'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeat_password'];
$email = $_POST['email'];
$memberManager = new MemberManager($credentials);
if (($_POST['pseudo'] && $_POST['password'] && $_POST['repeat_password'] && $_POST['email']) != NULL) {
    if (($_POST['password'] == $_POST['repeat_password'])) 
    { 
        $member = new Member();  
        $member->setPseudo($pseudo);
        $member->setPassword($password);
        $member->setEmail($email);
        $userExist = $memberManager->userExist($_POST ["email"], $_POST["pseudo"]);
        if ($userExist == false ) {
            $memberManager->addMember($member);
            if (session_status() == PHP_SESSION_NONE) {
    
                session_start();
                 
            }
            
           // isset($_SESSION["register_success"]);
            $_SESSION["register"] = "Vous êtes bien enregistré"; // Asupprimer ???
            //var_dump($_SESSION["register"]) ;    die;
            //var_dump($_SESSION["register_success"]);die;
            //rediriger vers une autre page
            header("Location: http://localhost/projet4/index.php");
            exit;

        }
        else {
            //doit indiquer un msg
            header("Location: http://localhost/projet4/view/registration.php");
            exit;
            var_dump("L'identifiant et/ou le mot de passe existe déjà");
            
        }
        
    }
    else {
        var_dump('Mot de passe différent');
    }
}
else {
    var_dump('vide');
}
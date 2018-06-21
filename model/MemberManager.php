<?php
$credentials = require("credentials.php");

class MemberManager
{
    protected $db;

    public function __construct($credentials) 
    {
        
        try
        {
            $this->db = new PDO($credentials["host"], $credentials['user'], $credentials['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 

            
        }
        catch(Exception $e)
        {
            die('Error : '.$e->getMessage());
        }
    } 

    //ajout d'un utilisateur depuis le formulaire
    public function addMember(Member $member)
    {
        $pseudo = $member->getPseudo();
        $pass = $member->getPassword();
        $email = $member->getEmail();
        $hash_validation = $member->getHashValidation();
        $updatedAt = $member->getUpdatedAt();
        $resultDate = $updatedAt->format('Y-m-d H:i:s');

        $req = $this->db->prepare('INSERT INTO member(pseudo, pass, email, date_inscription, hash_validation) VALUES (:pseudo, :pass, :email, :date_inscription, :hash_validation)');

        $req -> bindParam(':pseudo', $pseudo);
        $req -> bindParam(':pass', $pass);
        $req -> bindParam(':email', $email);
        $req -> bindParam(':hash_validation', $hash_validation);
        $req -> bindParam(':date_inscription', $resultDate);
        
        $req->execute();
        
        return $req;
        
    }

    public function userExist($email, $pseudo) 
    {
        $query = $this->db->prepare('SELECT id FROM member WHERE email = ? OR pseudo = ? ');
        $query->execute(array($email, $pseudo));
        $result = $query->fetch();
        //if result = false , utilisateur n'éxiste pas = email libre
        return $result;
    } 

    //connection
    public function userConnect($pseudo, $pass)
    {
        var_dump($pseudo, $pass);
        $query = $this->db->prepare('SELECT id FROM member WHERE pseudo = ? AND pass = ? ');
        $query->execute(array($pseudo, $pass));
        $result = $query->fetch();
        //if result = false , utilisateur n'éxiste pas = email libre
        //var_dump($result);die;
        return $result;
        
    }
}






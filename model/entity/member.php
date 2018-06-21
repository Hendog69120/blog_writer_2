<?php

class Member {

    private $pseudo;
    private $password;
    private $email;
    
    private $hash_validation;
    private $updatedAt;

    function __construct() {
        $this->updatedAt = new DateTime(); //fonction native PHP (peut être appelé de n'importe ou) précisé le fuseau
        $this->hash_validation = FALSE;
    }


    public function getPseudo() {

        return $this -> pseudo;
    }
    public function setPseudo($pseudo) {

        $this -> pseudo = $pseudo;
    }

    public function getPassword() {

        return $this -> password;
    }
    public function setPassword($password) {

        $this -> password = $password;
    }

    public function getEmail() {

        return $this -> email;
    }
    public function setEmail($email) {

        $this -> email = $email;
    }
    public function getHashValidation() {

       return $this-> hash_validation;
    }

    public function getUpdatedAt() {

        return $this-> updatedAt;
    }
}

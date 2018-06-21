<?php

$credentials = require("credentials.php");
class LastManager
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

    public function getFiveLast()
    {

        $req = $this->db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS date_creation_fr FROM post ORDER BY creation_date DESC LIMIT 0, 5');

        return $req->fetchAll();
    }
}
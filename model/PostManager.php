<?php
$credentials = require("credentials.php");
class PostManager 
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


    public function getPosts()
    {

        $req = $this->db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
      
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function addPost($title, $content)
    {
        $req = $this->db->prepare('INSERT INTO post(title, content, creation_date) VALUES ( :title, :content, NOW())');
    
        $req -> bindParam(':title', $title);
        $req -> bindParam(':content', $content);
        
        $req->execute();
        
        return $req;
    }

    public function deletePost($postId) 
    {
        $req = $this->db->prepare('DELETE FROM post WHERE id = :id');
        $req-> bindParam(':id', $postId);
        $req->execute();

        return $req;
    }

    public function updatePost($title, $content, $postId)
    {
        $update = $this->db->prepare('UPDATE post SET title= :title, content = :content WHERE id = :id');

        $update -> bindParam(':title', $title);
        $update -> bindParam(':content', $content);
        $update -> bindParam(':id', $postId);
        $update->execute();
        

        return $update;
    }
}
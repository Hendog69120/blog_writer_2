<?php
$credentials = require("credentials.php");
class CommentManager
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

    public function getComments($postId)
    {
        $comments = $this->db->prepare('SELECT id, pseudo, content, signalement, DATE_FORMAT(updated_at, \'%d/%m/%Y à %Hh%imin\') AS updated_at_fr FROM comment WHERE post_id = ? ORDER BY updated_at DESC');
    
        $comments->execute(array($postId));
    
        return $comments;
    
    
    }

    public function getCommentsBySignalement()
    {
        $comments = $this->db->query('SELECT id, pseudo, content, signalement, DATE_FORMAT(updated_at, \'%d/%m/%Y à %Hh%imin\') AS updated_at_fr FROM comment ORDER BY signalement DESC');

        return $comments->fetchAll();
    }

    public function addComment($postId, $pseudo, $content)
    {
        $req = $this->db->prepare('INSERT INTO comment(post_id, pseudo, content, updated_at) VALUES (:post_id, :pseudo, :content, NOW())');
    
        $req -> bindParam(':post_id', $postId);
        $req -> bindParam(':pseudo', $pseudo);
        $req -> bindParam(':content', $content);
        
        $req->execute();
        
        return $req;
    
    }

    public function signalComment($id)
    {
        $update = $this->db->prepare('UPDATE comment SET signalement = true WHERE id = :id');
        $update -> bindParam(':id', $id);
        $update->execute();

        return $update;
    }

    public function deleteComment($id)
    {
        $update = $this->db->prepare('DELETE FROM comment WHERE id = :id');
        $update -> bindParam(':id', $id);
        $update->execute();

        return $update;
    }


}
<?php


class SanitizeComment
{
    public static function isValid($_POST)
    {
        return isset($_POST['id'], $_POSTpseudo, $content) && !empty($_POST['id']) && !empty($pseudo) && !empty($content);
    }
}
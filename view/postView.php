<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="view/style.css" rel="stylesheet" /> 
    </head>
        
    <body>

        <?php include("view/header.php"); ?>
        

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p> 
        </div>
        <div class="post_connection__form">
            <h2>Commentaires</h2>
        
            <form method="post" action="" >
            <p>
            <input type="hidden" value="<?php echo($post['id'])?>" name="post_id" />
            <label for="comment">Pseudo</label> :  <input type="text" name="pseudo" id="pseudo" /><br />
            <label for="comment">Message</label> :  <input type="text" name="comment" id="comment" /><br />

            <input type="submit" value="Envoyer" />
            </p>
            </form>
        </div>
        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['updated_at_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
            <?php if($comment['signalement'] == true): ?>
            <p style="color: red;">Commentaire signalé !</p>
        <?php else: ?>
        <form method="post" action="">
            <input type="checkbox" name="comment_signalement" value="<?=$comment['id'];?>">
            <input type="submit" value="Signaler le commentaire">
        </form>
        <?php endif;?>
<br>
<br>
        <?php
        }
        ?>
    </body>
</html>
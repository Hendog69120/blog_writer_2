<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="view/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
    <?php include("view/header.php"); ?>
 
    <?php foreach ($data as $post): ?>
    <div class="news">

        <h3>
            <?= htmlspecialchars($post['title']); ?>
            <em>le <?= $post['date_creation_fr']; ?></em>
        </h3>
        
        <p>
        <?= substr(nl2br(htmlspecialchars($post['content'])), 0, 200) ."..."; ?>
        <br />
        <br />
        <em><a href="index.php?billet=<?php echo $post['id']; ?>">Voir l'article</a></em>
        </p>
    </div>
        <br /><br />

 
    <?php endforeach; ?>
    <?php include("view/footer.php"); ?>
    </body>
</html>
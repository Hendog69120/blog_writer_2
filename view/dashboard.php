<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Mon blog</title>
    <link href="view/style.css" rel="stylesheet"/>
</head>

<body>

<?php include("view/header.php"); ?>
<h1>Dashboard ! Welcome <?= $_SESSION['pseudo'] ?></h1>

<?php if(isset($_SESSION['comment_deleted'])): ?>
<h3 style="color: green;"><?=  $_SESSION['comment_deleted']; ?></h3>
<?php unset($_SESSION['comment_deleted']); ?>
<?php endif; ?>
<?php foreach ($data as $post): ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']); ?>
            <em>le <?= $post['date_creation_fr']; ?></em>
        </h3>
        <p>
            <?= substr(nl2br(htmlspecialchars($post['content'])), 0, 200) . "..."; ?>
            <br/>
            <br/>
            <em><a href="index.php?billet=<?php echo $post['id']; ?>">Voir l'article</a></em>
        </p>
    </div>
    <br/><br/>
<?php endforeach; ?>
<div id="comment_signalement">

    <?php foreach ($comments as $comment): ?>
        <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['updated_at_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
        <?php if ($comment['signalement'] == true): ?>
            <p style="color: red;">Commentaire signalé !</p>
        <?php endif; ?>
        <form method="post">
            <input type="checkbox" name="comment_to_delete" value="<?=$comment['id'];?>">
            <input type="submit" value="Supprimer le commentaire">
        </form>
    <?php endforeach; ?>
</div>
<?php include("view/footer.php"); ?>
</body>
</html>
<?php
require("header.php");
?>
<h1>Espace administrateur</h1>
<div class="post_article__form">
 <h2>Modification article </h2>

 <form method="post" >
 <p>
 <label for="title">Nom de l'article</label>
 <input type="text" name='title' id="title" value="<?= $post['title']; ?>">
 <label for="content">Message</label> :  <input type="text" name="content" id="content" value="<?= $post['content']; ?>" /><br />
 <input type="hidden" name='post_id'  value="<?= $post['id']; ?>">
 <input type="submit" value="Modifier" />
 </p>
 </form>
</div>
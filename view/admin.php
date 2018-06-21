
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog ecrivain</title>
    <link href="style.css" rel="stylesheet" /> 
</head>
<body>

    <h1>Espace administrateur</h1>
           <div class="post_article__form">
            <h2>Article à poster</h2>
        
            <form method="post" action="../index.php" >
            <p>
            <label for="title">Nom de l'article</label>
            <input type="text" name='title' id="title">
            <label for="content">Message</label> :  <input type="text" name="content" id="content" /><br />

            <input type="submit" value="Envoyer" />
            </p>
            </form>
        </div>

</body>
</html>


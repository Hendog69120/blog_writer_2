<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Blog écrivain</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
    <body>

        <?php include("header.php"); ?>
        <h1>Formulaire auteur</h1>
        <p>Veuillez entrer le mot de passe pour pouvoir poster un article</p>

        <form class="adminPass_form" action="admin.php" method="post">
            
            <label for="password">Mot de passe</label>
            <input type="password" name="pass_admin" placeholder="password" >
            <input class="sendmessage" type="submit" value="Envoyer" style="width: 40%">
            
        </form>
      
    </body>
</html>
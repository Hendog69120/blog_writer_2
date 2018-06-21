<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
<body>

    <?php include("header.php"); ?>

              
    <section>

    <div class="registration_connection__form">


  <!-- la liste qui suis permets au visiteur de remplir les infos corrspondants-->
        <form method="post" action="../controler/members/connection_form.php">
            <label for="pseudo">Identifiant</label>
            <input type="text" name="pseudo" placeholder="pseudo" id="pseudo">

            <label for="password">Mot de passe</label>
            <input type="password" name="pass" placeholder="pass" id="pass">

            <input class="sendmessage" type="submit" value="Envoyer" style="width: 40%">
        </form>
    </div>
</section>
</body>
</html>
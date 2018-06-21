<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="../view/style.css" rel="stylesheet" /> 
    </head>
<body>

    <?php include("../view/header.php"); ?>

              
    <section>

        <div class="registration_connection__form">
            

    <!-- la liste qui suis permets au visiteur de remplir les infos corrspondants-->
            <form method="post" action="../controler/members/registration_form.php">
                <label for="pseudo">Pseudonyme souhaité</label>
                <input type="text" name="pseudo" placeholder="pseudo" >
                <label for="password">Mot de passe</label>
                <input type="password" name="password" placeholder="password" >
                <label for="repeat_password">Confirmer le mot de passe</label>
                <input type="password" name="repeat_password" placeholder="Confirmation du mot de passe" >
                <label for="email">Adresse email</label>
                <input type="email" name="email" placeholder="email" >
                
                <input class="sendmessage" type="submit" value="Envoyer" style="width: 40%">
            </form>
        </div>
</section>

  <?php include("view/footer.php"); ?>
 
</body>
</html>
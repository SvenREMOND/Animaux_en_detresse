<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bf96a16ec0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Style/style.css">
    <link rel="stylesheet" href="../JS/Librairies/wysibb/theme/default/wbbtheme.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="../JS/Librairies/wysibb/jquery.wysibb.min.js"></script>
    <script src="../JS/Librairies/wysibb/lang/fr.js"></script>
    <script>
        $(document).ready(function () {
            var wbbOpt = {
                lang: "fr",
                buttons: "bold,italic,underline,|,justifyleft,justifycenter,justifyright,|,fontcolor,|,bullist,numlist,|,img,link"
            }
            $("#editor").wysibb(wbbOpt);
        });
    </script>
    <link rel="icon" href="../Imgages/_icone.png" />
    <title>Animaux en détresse</title>
</head>

<body>

    
    <div class="site">

        <nav>
        
            <a class="logo" href="./index.php"><img class="logo_img" src="../Images/_Logo.png" alt="Logo de Animaux en détresse"></a>
            <h6>News</h6>
            <a href="./index.php?action=News">Évenements</a><br>
            <a href="./index.php?action=NewsAssoc">Nouvelles de l'association</a><br>
            <a href="./index.php?action=NewsChats">Nouvelles des chats</a>
            <h6>Présentation</h6>
            <a href="./index.php?action=LeRefuge">Le refuge</a><br>
            <a href="./index.php?action=Mission">Notre mission</a>
            <h6>Les animaux</h6>
            <a href="./index.php?action=Chats">Chats</a><br>
            <a href="./index.php?action=Chatons">Chatons</a><br>
            <a href="./index.php?action=Adoption">Adoption</a>
            <h6><a class="perdu_trouve" href="./index.php?action=chatsperdus">Perdu/Trouvé</a></h6>
            <h6>Protection animale</h6>
            <a href="./index.php?action=LesRegles">Rêgles</a><br>
            <a href="./index.php?action=LaLutte">Lutte contre la prolifération</a>
            <h6>Contact</h6>
            <a href="./index.php?action=NousContacter">Nous contacter</a><br>
            <a href="./index.php?action=LivreOr">Livre d'or</a>
            <h6><a href="./index.php?action=Liens">Liens externe</a></h6>
            
            <?php
            if(!isset($_SESSION['co'])){
                echo '<div class="Log"><a href="./index.php?action=LogInSignIn">Connexion/Inscription</a></div>';
            }else{
                if($_SESSION['role'] != 3){
                    echo '<a href="./admin.php">Administration</a></br>';
                }
                echo '<a href="./index.php?action=LogOut">Deconexion</a>';
            }
            ?>

        </nav>
        <main>
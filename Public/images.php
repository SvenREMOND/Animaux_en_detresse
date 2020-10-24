<?php

require('../Include/sql/connexion.php');
require('../Include/requete.php');

$images = req_image();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Style/style.css">
</head>

<body>

    <main class="page_img">

    <?php

        foreach($images as $img){
            echo '<img class="liste_img" src="../Images/'.$img['nom_img'].'">';
        }


    ?>

    </main>

</body>

</html>
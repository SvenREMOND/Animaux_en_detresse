<?php
session_start();

require('../Include/page/Doctype_to_nav.php');
require('../Include/sql/connexion.php');

$bdd = connexion();

$erreur = "";

if(isset($_POST['envoyer'])){

    $titre = htmlspecialchars($_POST['titre']);
    $contenue = $_POST['editor_name'];
    $date = $_POST['date_post'];
    $cat = $_POST['categorie'];

    if(!empty($contenue) && !empty($cat) && !empty($date)){

        $ajout = $bdd->prepare('INSERT INTO `articles` (`titre_article`, `contenu_article`, `date_event`, `date_post_article`, `id_cat`) VALUES (?, ?, ?, NOW(), ?)');
        $ajout->execute([$titre, $contenue, $date, $cat]);

        /* header('Location: ./index.php?action=News'); */
    }else{
        $erreur = "Vous devez completer le contenue";
    }
}

$cat = $bdd->prepare("SELECT * FROM categorie");
$cat->execute();
$cat = $cat->fetchAll(PDO::FETCH_ASSOC);

echo '
<fieldset>
    <legend>Ajouter un article</legend>
    <form action="" method="POST">

        <p>
            <label for="titre">Titre :</label>
            <input type="text" name="titre">
        </p>

        <p>
            <label for="categorie">Choisie une categorie :</label>
            <select name="categorie">';
            
            foreach($cat as $select){
                echo '<option value="'.$select['id_cat'].'">'.$select['nom_cat'].'</option>';
            }
            echo'
            </select>

            <a href="./images.php" target="_blank">Les images</a>

        </p>

        <textarea id="editor" name="editor_name"></textarea>
        
        <p>
            Date de l\'évenement :
            <input type="date" name="date_post">
        </p>

        <p>'.$erreur.'</p>

        <input type="submit" name="envoyer" value="poster">

    </form>
</fieldset>
';
require('../Include/page/footer.php');
?>
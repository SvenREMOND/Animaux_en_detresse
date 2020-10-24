<?php
session_start();

require('../Include/page/Doctype_to_nav.php');
require('../Include/sql/connexion.php');
require('../Include/affichage.php');
require('../Include/ajout.php');



if(isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = "";
}

switch ($action) {

    default:
        echo '<h1>Bonjour '.$_SESSION['nom'].'</h1><br>


        <p>Que voulez vous faire aujourd\'hui ?</p><br>
        
        <a href="./admin.php?action=ajout_image">Ajouter une image</a><br>
        <a href="./admin.php?action=ajout_chat">Ajouter un chat</a><br>
        <a href="./ajout_article.php">Ajouter un article</a>';
    break;

    case 'ajout_image' :
        ajout_image();
    break;

    case 'ajout_chat' :
        ajout_chat();
    break;

    


}
require('../Include/page/footer.php');

?>

<!-- <a href="">Regarder les inscrits</a> -->
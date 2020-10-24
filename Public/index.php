<?php
session_start();

require('../Include/page/Doctype_to_nav.php');
require('../Include/affichage.php');
require('../Include/requete.php');
require('../Include/sql/connexion.php');
require('../Include/ajout.php');
require('../JS/Librairies/jBBCode-1.3.0/JBBCode/Parser.php');


if(isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = "News";
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = "";
}

switch ($action) {

    case 'Events':
        Event();
    break;

    case 'News' :
        articles();
    break;

    case 'NewsAssoc' :
        News_assoc();
    break;

    case 'NewsChats' :
        News_chat();
    break;

    case 'LeRefuge' :
        LeRefuge();
    break;

    case 'Mission' :
        Mission();
    break;

    case 'Chats' :
        Chats();
    break;

    case 'Chatons' :
        Chatons();
    break;

    case 'Adoption' :
        Adoption();
    break;

    case 'chatsperdus' :
        chats_perdus();
    break;
    
    case 'LesRegles' :
        regles();
    break;

    case 'LaLutte' :
        Lutte();
    break;

    case 'NousContacter' :
        Contact();
    break;

    case 'LivreOr' :
        LivreOr();
    break;

    case 'Liens' :
        Lien();
    break;
    
    case 'ajoutchatperdu':
        ajout_chat_perdu();
    break;

    case 'chatperdu' :
        chat_perdu($id);
    break;

    case 'LogInSignIn' :
        Affich_LogInSignIN();
    break;

    case 'LogOut' :
        LogOut();
    break;
}
            

require('../Include/page/footer.php');

?>
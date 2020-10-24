<?php

function req_image()/* Requete de toute les image de la table image */{

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM images");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_articles()/* Requete de tout les article */{

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM articles WHERE id_cat BETWEEN 1 AND 3 ORDER BY id_article DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_event(){

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM articles WHERE id_cat = 1 ORDER BY id_article DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_NewsAssoc(){

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM articles WHERE id_cat = 2 ORDER BY id_article DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_NewsChat(){

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM articles WHERE id_cat = 3 ORDER BY id_article DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_Refuge(){

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM articles WHERE id_cat = 4 ORDER BY id_article DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_mission(){

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM articles WHERE id_cat = 5 ORDER BY id_article DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_chats(){

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM chats WHERE DATEDIFF(CURRENT_DATE(), naissance_chat) < 1 ORDER BY id_chat DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_chatons(){

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM chats WHERE DATEDIFF(CURRENT_DATE(), naissance_chat) > 1 ORDER BY id_chat DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_regle(){

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM articles WHERE id_cat = 6 ORDER BY id_article DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_lutte(){

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM articles WHERE id_cat = 7 ORDER BY id_article DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_Adoption(){

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM articles WHERE id_cat = 8 ORDER BY id_article DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_livreOr(){

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM articles WHERE id_cat = 9 ORDER BY id_article DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_lien(){

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM articles WHERE id_cat = 10 ORDER BY id_article DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_contact(){

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM articles WHERE id_cat = 11 ORDER BY id_article DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_chats_perdus()/* Requete de tout les chats perdus */{

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM perdu ORDER BY id_chat_pt DESC");
    $donnee->execute();
    $donnee = $donnee->fetchAll(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_chat_perdu($id)/* Requete d'un chat perdu */{

    $bdd = connexion();

    $donnee = $bdd->prepare("SELECT * FROM perdu WHERE id_chat_pt = ?");
    $donnee->execute(array($id));
    $donnee = $donnee->fetch(PDO::FETCH_ASSOC);

    return $donnee;
}

function req_poste_com($id){

    $bdd = connexion();

    if (isset($_POST['post_com'])) {
        $contenue = htmlspecialchars($_POST['contenu_com']);
        if (!empty($contenue)) {
            $req = $bdd->prepare("INSERT INTO commentaires (`id_chat_perdu`, `contenu_com`, `id_user`) VALUES (?, ?, ?)");

            $req->execute([$id, $contenue,$_SESSION['id_user']]);

            header('Location: ./index.php?action=chatperdu&id='.$id.'');

        }else{
            $erreur = "Vous devez écrire quelque chose pour le poster";
            return $erreur;
        }
    }
}


?>
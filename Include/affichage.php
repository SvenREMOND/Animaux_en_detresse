<?php

function fr_date($date){
    $newDate = date("d-m-Y", strtotime($date));

    return $newDate;
}

function articles()/* Affiche tout les article */{

    $articles = req_articles();

    echo'<section>';

        foreach($articles as $article){

            $parser = new JBBCode\Parser();
            $parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
            $parser->addBBCode("left", '<p class="gauche">{param}</p>');
            $parser->addBBCode("center", '<p class="center">{param}</p>');
            $parser->addBBCode("right", '<p class="droite">{param}</p>');
            $parser->addBBCode("list", '<ul>{param}</ul>');
            $parser->addBBCode("lost", '<ol>{param}</ol>');
            $parser->addBBCode("*", '<li>{param}</li>');
            $parser->addBBCode("url", '<a target="_blank">{param}</a>');

            $parser->parse(nl2br($article['contenu_article']));

            echo '<article><h2>'.$article['titre_article'].'</h2>
                <hr>
                <p>'.$parser->getAsHTML().'
                </p>
                <p>Posté le '.$article['date_post_article'].'</p>
            </article>';

        }
                    
    echo '</section>';
}

function Event()/* Affiche tout les article */{

    $articles = req_event();

    echo'<section>';

        foreach($articles as $article){

            $parser = new JBBCode\Parser();
            $parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());

            $parser->parse($article['contenu_article']);

            echo '<article><h2>'.$article['titre_article'].'</h2>
                <hr>
                <p>Date de l\'évenement : '.$article['date_event'].'<br>'.$parser.'
                </p>
                <p>Posté le '.$article['date_post_article'].'</p>
            </article>';
        }
                    
    echo '</section>';
}

function News_assoc(){

    $articles = req_NewsAssoc();

    echo'<section>';

        foreach($articles as $article){

            $parser = new JBBCode\Parser();
            $parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());

            $parser->parse(nl2br($article['contenu_article']));

            echo '<article><h2>'.$article['titre_article'].'</h2>
                <hr>
                <p>'.$parser->getAsHTML().'
                </p>
                <p>Posté le '.$article['date_post_article'].'</p>
            </article>';

        }
                    
    echo '</section>';
}

function News_chat(){

    $articles = req_NewsChat();

    echo'<section>';

        foreach($articles as $article){

            echo '<article><h2>'.$article['titre_article'].'</h2>
                <hr>
                <p>'.$article['contenu_article'].'
                </p>
                <p>Posté le '.$article['date_post_article'].'</p>
            </article>';

        }
                    
    echo '</section>';
}

function LeRefuge(){

    $articles = req_Refuge();

    echo'<section>';

        foreach($articles as $article){

            echo '<article><h2>'.$article['titre_article'].'</h2>
                <hr>
                <p>'.$article['contenu_article'].'
                </p>
            </article>';

        }
                    
    echo '</section>';
}

function Mission(){

    $articles = req_mission();

    echo'<section>';

        foreach($articles as $article){

            echo '<article><h2>'.$article['titre_article'].'</h2>
                <hr>
                <p>'.$article['contenu_article'].'
                </p>
            </article>';

        }
                    
    echo '</section>';
}

function regles(){

    $articles = req_regle();

    echo'<section>';

        foreach($articles as $article){

            echo '<article><h2>'.$article['titre_article'].'</h2>
                <hr>
                <p>'.$article['contenu_article'].'
                </p>
            </article>';

        }
                    
    echo '</section>';
}

function Lutte(){

    $articles = req_lutte();

    echo'<section>';

        foreach($articles as $article){

            echo '<article><h2>'.$article['titre_article'].'</h2>
                <hr>
                <p>'.$article['contenu_article'].'
                </p>
            </article>';

        }
                    
    echo '</section>';
}

function Adoption(){

    $articles = req_Adoption();

    echo'<section>';

        foreach($articles as $article){

            echo '<article><h2>'.$article['titre_article'].'</h2>
                <hr>
                <p>'.$article['contenu_article'].'
                </p>
            </article>';

        }
                    
    echo '</section>';
}

function LivreOr(){

    $articles = req_livreOr();

    echo'<section>';

        foreach($articles as $article){

            echo '<article>
                <p>'.$article['contenu_article'].'
                </p>
            </article>';

        }
                    
    echo '</section>';
}

function Lien(){

    $articles = req_lien();

    echo'<section>';

        foreach($articles as $article){

            echo '<article>
                <p>'.$article['contenu_article'].'
                </p>
            </article>';

        }
                    
    echo '</section>';
}

function Contact(){

    $articles = req_contact();

    echo'<section>';

        foreach($articles as $article){

            echo '<article>
                <p>'.$article['contenu_article'].'
                </p>
            </article>';

        }
                    
    echo '</section>';
}

function Chats(){

    $articles = req_chats();

    echo'<section>';

        foreach($articles as $article){

            if($article['sexe_chat'] == 1){
                $sexe = "Femelle";
            }else{
                $sexe = "Male";
            }

            echo '<article><h2>'.$article['nom_chat'].'</h2>
                <hr>
                <p>Sexe : '.$sexe.'</p>
                <hr>
                <p>'.$article['description_chat'].'
                </p>
                <p>Né le '.$article['naissance_chat'].'</p>
            </article>';

        }
                    
    echo '</section>';
}

function Chatons(){

    $articles = req_chatons();

    echo'<section>';

        foreach($articles as $article){

            if($article['sexe_chat'] == 1){
                $sexe = "Femelle";
            }else{
                $sexe = "Male";
            }

            echo '<article><h2>'.$article['nom_chat'].'</h2>
                <hr>
                <p>Sexe : '.$sexe.'</p>
                <hr>
                <p>'.$article['description_chat'].'
                </p>
                <p>Né le '.$article['naissance_chat'].'</p>
            </article>';

        }
                    
    echo '</section>';
}

function chats_perdus()/* Affiche tout les chat perdus */{

    $perdus = req_chats_perdus();

    echo '<a href="./index.php?action=ajoutchatperdu" class="ajout_chat_pt">Posté un chat perdu</a>';

    foreach($perdus as $perdu){

        echo '<section class="perdu ';
        if ($perdu['perdu_trouve'] == "0") {
            echo 'trouve">';
        }else{
            echo '">';
        }

        $date_chat = fr_date($perdu['date_chat_pt']);
        $date_post = fr_date($perdu['date_post_pt']);
        
        echo '<a href="./index.php?action=chatperdu&id='.$perdu['id_chat_pt'].'">
                    <article>
                        <h2>Nom : '.$perdu['nom_chat_pt'].'</h2>
                        <hr>
                        <div class="chat_pt">
                            <p>Chat perdu depuis le : '.$date_chat.'<br>
                                Description : '.$perdu['description_chat_pt'].'
                            </p>
                            <img src="../Images/'.$perdu['img_chat_pt'].'">
                        </div>
                        <p>Posté le '.$date_post.'</p>
                    </article>
                </a>';

        echo '</section>';
        
    }
    
}

function chat_perdu($id){

    $chatperdu = req_chat_perdu($id);

    $date_chat = fr_date($chatperdu['date_chat_pt']);

    $date_post = fr_date($chatperdu['date_post_pt']);

    echo '<h2>Nom : '.$chatperdu['nom_chat_pt'].'</h2>
            <hr>
            <div class="chat_pt">
                <p>Chat perdu depuis le : '.$date_chat.'<br>
                Description : '.$chatperdu['description_chat_pt'].'
                </p>
                <img src="../Images/'.$chatperdu['img_chat_pt'].'">
            </div>
            <p>Posté le '.$date_post.'</p>

            <hr>

            <h3>Commentaires :</h3>';
            
    require('../Include/page/commentaire.php');

    $erreur = req_poste_com($id);

    if(isset($_SESSION['co'])){

        echo '<fieldset class="com">
            <legend>Posté un commentaire</legend>
            <form action="" method="POST">
                <label class="contenu_com" for="contenu_com">Commentaire :</label>
                <textarea name="contenu_com" rows="5" cols="100" placeholder="Votre commentaire ..."></textarea>
                <p>'.$erreur.'</p>
                <input name ="post_com" type="submit" value="Posté">
            </form>
        </fieldset>';

    }else{
        echo '<p>Vous devez être <a href="./index.php?action=LogInSignIn">connecté</a> pour pouvoir postez un commentaire !</p>';
    }


    
    
}

function Affich_LogInSignIN(){

    $bdd = connexion();
    $erreurlog = "";
    $erreursign = "";

    $mailconnect = $mdpconnect = "";
    $nom = $prenom = $mail = $phone = $pass = $pass_confirm = "";


    if(isset($_POST['formconnexion'])) {
        $mailconnect = $_POST['mailconnect'];
        $mdpconnect = $_POST['mdpconnect'];
        if(!empty($mailconnect) && !empty($mdpconnect)) {

            $requser = $bdd->prepare("SELECT * FROM `users` WHERE `users`.`mail_user` = ? ");

            $requser->execute(array($mailconnect));

            $userinfo = $requser->fetch();

            if(password_verify($mdpconnect, $userinfo['mdp_user'])) {

                $_SESSION['co'] = true; 

                $_SESSION['nom'] = $userinfo['nom_user'].' '.$userinfo['prenom_user'];

                $_SESSION['role'] = $userinfo['rang_user'];

                $_SESSION['id_user'] = $userinfo['id_user'];

                header('Location: ./index.php');

            }else{
                $erreurlog ="Mauvais mail ou mot de passe !";
            }

        }else {
            $erreurlog = "Tous les champs doivent être complétés !";
        }
    }

    if(isset($_POST['inscription'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mail = $_POST['mail'];
        $phone = htmlspecialchars($_POST['phone']);
        $pass = $_POST['mdp'];
        $pass_confirm = $_POST['mdp_confirm'];
        if(!empty($mail) && !empty($pass) && !empty($pass_confirm) && !empty($nom) && !empty($prenom)) {

            if($pass == $pass_confirm){

                $mdp = password_hash($pass, PASSWORD_DEFAULT);

                $inscription = $bdd->prepare("INSERT INTO `users` (`nom_user`, `prenom_user`, `mail_user`, `phone_user`, `mdp_user`) VALUES (?, ?, ?, ?, ?)");

                $inscription->execute(array($nom, $prenom, $mail, $phone, $mdp));


                $newid = $bdd->lastInsertId();
                
                $_SESSION['co'] = true; 
                
                $_SESSION['nom'] = $nom.' '.$prenom;

                $_SESSION['id_user'] = $newid;

                $_SESSION['role'] = 3;

                header('Location: ./index.php');

            }else{
                
                $erreursign = "Les mot de passe sont différents";
            }
            
        }else{
        $erreursign = "Tous les champs doivent être complétés !";
        }
    }

    echo'<fieldset>
            <legend>Connexion</legend>

            <form method="POST" action="">

                <p>
                    <label for="mailconnect" require>Mail :</label>
                    <input type="email" name="mailconnect" placeholder="Mail" value="'.$mailconnect.'" />
                </p>
                <p>
                    <label for="mdpconnect" require>Mot de passe :</label>
                    <input type="password" name="mdpconnect" placeholder="Mot de passe" />
                </p>

                <p class="erreur">'.$erreurlog.'</p>

                <input type="submit" name="formconnexion" value="Se connecter !" />

            </form>

        </fieldset>


        <fieldset>
            <legend>Inscription</legend>

            <form method="POST" action="">

                <p>
                    <label for="nom" require>Nom :</label>
                    <input type="text" name="nom" placeholder="Nom" value="'.$nom.'">
                </p>
                <p>
                    <label for="prenom" require>Prenom :</label>
                    <input type="text" name="prenom" placeholder="Prenom" value="'.$prenom.'">

                </p>
                <p>
                    <label for="mail" require>Mail :</label>
                    <input type="email" name="mail" placeholder="Mail" value="'.$mail.'" />
                </p>
                <p>
                    <label for="phone">Téléphone :</label>
                    <input type="tel" name="phone" placeholder="Téléphone" value="'.$phone.'">
                </p>
                <p>
                    <label for="mdp" require>Mot de passe :</label>
                    <input type="password" name="mdp" placeholder="Mot de passe" />
                </p>
                <p>
                    <label for="mdp_confirm" require>Confirmer votre mot de passe :</label>
                    <input type="password" name="mdp_confirm" placeholder="Confirmer votre mot de passe">
                </p>

                <p class="erreur">'.$erreursign.'</p>

                <input type="submit" name="inscription" value="S\'inscrire !" />

            </form>

        </fieldset>';
}

function LogOut(){
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();


    header('Location: ./index.php');
}

?>
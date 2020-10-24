<?php

$pdo = connexion();

class bdd{
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
}

$bdd = new bdd($pdo);

    $req = $bdd->pdo->prepare("SELECT * FROM commentaires WHERE id_chat_perdu = ?");
    $req->execute([$id]);
    $comments = $req->fetchAll(PDO::FETCH_OBJ);

    $comments_by_id = [];

    foreach($comments as $comment){
        $comments_by_id[$comment->id_com] = $comment;
    }

    foreach($comments as $k =>$comment){
        if($comment->id_com_parent != 0){
            $comments_by_id[$comment->id_com_parent]->children[] = $comment;
            unset($comments[$k]);
        }
    }

    function affich_com($comment){
        echo '<div class="commentaire"><p>'.$comment->contenu_com.'</p>';

        if(isset($comment->children)){
            foreach($comment->children as $comment){
                affich_com($comment);
            }
        }

        echo '</div>';
    }

    foreach($comments as $comment){

        affich_com($comment);

    }

?>
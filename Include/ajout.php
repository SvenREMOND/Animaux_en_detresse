<?php

function ajout_chat_perdu(){

    if(isset($_SESSION['co'])){

        $nom = $date = $description = $erreur = "";

        if(isset($_POST['post_chat'])){

            $nom = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $date = $_POST['date'];

            if(!empty($nom) && !empty($date) && !empty($description)){

                $emplacement = '../Images/'; // dossier où sera déplacé le fichier

                $image = '_chat_img.jpg';

                if(!empty($_POST['photo_chat'])){

                    $tmp_file = $_FILES['photo_chat']['tmp_name'];
            
                    if( is_uploaded_file($tmp_file) ){
        
                        // on vérifie maintenant l'extension
                        $type_file = $_FILES['img']['type'];
        
                        if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') &&!strstr($type_file, 'png')){
                            exit("Le fichier n'est pas une image");
                        }else{
            
                            // on copie le fichier dans le dossier de destination
                            $name_file = $_FILES['img']['name'];
                        
                        
                            if( !move_uploaded_file($tmp_file, $emplacement . $name_file) ){
                            }else{
                                $newname = preg_replace( "# #", "_", $_POST['name']).".jpg";
                                $name = rename( $emplacement.$name_file,  $emplacement.$newname);
                                $image = $newname;

                                $pdo = connexion();

                                $query = $pdo->prepare('INSERT INTO perdu (`nom_chat_pt`, `description_chat_pt`, `img_chat_pt`, `date_chat_pt`, `date_post_pt`, `perdu_trouve`) VALUES (?, ?, ?, ?, NOW(), 1)');
                                $query->execute([$nom, $description, $image, $date]);

                                $newid = $pdo->lastInsertId();

                                header('Location: ./index.php?action=chatperdu&id='.$newid.'');
                                
                                die();
        
                            }
                        }
                    }
                }else{
                    $pdo = connexion();

                    $query = $pdo->prepare('INSERT INTO perdu (`nom_chat_pt`, `description_chat_pt`, `img_chat_pt`, `date_chat_pt`, `date_post_pt`, `perdu_trouve`) VALUES (?, ?, ?, ?, NOW(), 1)');
                    $query->execute([$nom, $description, $image, $date]);
            

                    $newid = $pdo->lastInsertId();

                    header('Location: ./index.php?action=chatperdu&id='.$newid.'');

                    die();
        
                }

            }else{
                $erreur = "Veuillez compléter son nom, sa description et la date svp!";
            }
        }


        echo '<fieldset>
            <legend>Ajouté un chat perdu :</legend>

            <form method="POST" action="" enctype="multipart/formdata">

                <p>
                    <label for="name">Nom du chat :</label>
                    <input type="text" name="name" placeholde="Nom">
                </p>

                <p>
                    <label for="photo_chat">Photo du chat :</label>
                    <input type="file" name="photo_chat" accept="image/png, image/jpeg, image/jpg">
                </p>

                <p>
                    <label for="date">Date ou le chat a été perdu :</label>
                    <input type="date" name="date" placeholder="Date">
                </p>

                <p>
                    <label for="description">Information sur le chat :</label>
                    <textarea name="description" cols="38"></textarea>
                </p>

                <p>'.$erreur.'</p>

                <input name ="post_chat" type="submit" value="Posté">

            </form>

        </fieldset>';

    }else{
        echo '<p>Vous devez être <a href="./index.php?action=LogInSignIn">connecté</a> pour pouvoir ajouter un chat perdu !</p>';
    }


}

function ajout_chat(){
    $nom = $naissance = $sexe = $description = $erreur = "";

    if(isset($_POST['new_chat'])){

        $nom = htmlspecialchars($_POST['nom']);
        $description = htmlspecialchars($_POST['description']);
        $naissance = $_POST['naissance'];
        $sexe = intval($_POST['sexe']);

        if(!empty($nom) && !empty($naissance) && !empty($description) && !empty($sexe)){

            $pdo = connexion();

            $query = $pdo->prepare('INSERT INTO chats (`nom_chat`, `naissance_chat`, `sexe_chat`, `description_chat`) VALUES (?, ?, ?, ?)');
            $query->execute([$nom, $naissance, $sexe, $description]);

            die();
        
        }else{
            $erreur = "Veuillez compléter tout les champs !";
        }
    }


    echo '<fieldset>
        <legend>Ajouté un chat :</legend>

        <form method="POST" action="">

            <p>
                <label for="name">Nom du chat :</label>
                <input type="text" name="nom" placeholde="Nom">
            </p>

            <p>
                <label for="naissance">Date de naissance :</label>
                <input type="date" name="naissance">
            </p>

            <div>
                <p>Sexe :</p>
                <p><input type="radio" id="F" name="sexe" value="1" checked><label for="F">Femelle</label></p>
                <p><input type="radio" id="M" name="sexe" value="2"><label for="M">Male</label></p>
            </div>

            <p>
                <label for="description">Information sur le chat :</label><a href="./images.php" target="_blank">Les images</a>
                <textarea id="editor" name="editor_name"></textarea>
            </p>

            <p>'.$erreur.'</p>

            <input name ="new_chat" type="submit" value="Ajouter ce chat">

        </form>

    </fieldset>';
}



function ajout_image(){

    $emplacement = "../Images/";
    $erreur = "";

    if(isset($_POST['envoie_image'])){

        if(!empty($_POST['images'])){

            $tmp_file = $_FILES['images']['tmp_name'];

            if( is_uploaded_file($tmp_file) ){

                // on vérifie maintenant l'extension
                $type_file = $_FILES['images']['type'];

                if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'png')){
                    exit("Le fichier n'est pas une image");
                }else{

                    // on copie le fichier dans le dossier de destination
                    $name_file = $_FILES['images']['name'];
                    
                    
                    if( !move_uploaded_file($tmp_file, $emplacement . $name_file) ){
                    }else{
                        $newname = preg_replace( "# #", "_", $_POST['nom']).".jpg";
                        $name = rename( $emplacement.$name_file,  $emplacement.$newname);
                        $image = $newname;

                        $pdo = connexion();

                        $query = $pdo->prepare('INSERT INTO images (nom_img) VALUES (?)');
                        $query->execute([$image]);

                        die();

                    }
                }
            }
        }else{
            $erreur ="Il faut ajouter une images !";
        }
    }

    echo '
            <form action="" method="POST">
                <p>
                    <label for="nom">Nom de l\'image</label>
                    <input type="text" name="nom">
                </p>
                <p>
                    <label for="images">Photo du chat :</label>
                    <input type="file" multiple name="images" accept="image/png, image/jpeg, image/jpg">
                </p>

                <p>'.$erreur.'</p>

                <input name ="envoie_image" type="submit" value="Enregistrer">

            </form>
    ';
}

?>
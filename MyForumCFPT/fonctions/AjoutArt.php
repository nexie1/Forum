<?php

//Si il est envoyer alors
if (isset($_POST["AddArticle"])) {

    if ($_POST["titre"] != "" && $_POST["contenu"] != "") {
        
        $date = date("Y-m-d H:i:s");
        //Prend mes infos étant écrite dans le formulaire
        $info["titre"] = $_POST["titre"];
        $info["contenu"] = $_POST["contenu"];
        $info["date_creation"] = $date;

        if ($info["titre"] != "" && $info["contenu"] != "" && $info["date_creation"] != "") {

            addArtPublique($info);
            
             header('Location: ./index.php');
        } else {

            echo'variables ajoutant à la base est vide';
        }
    } else {

        echo 'Votre titre ou contenu est vide';
    }
}


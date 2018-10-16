<?php

//Si il est envoyer alors
if (isset($_POST["addComm"])) {

    if ($_POST["commentaire"] != "") {
        
        $date = date("Y-m-d H:i:s");
        //Prend mes infos étant écrite dans le formulaire
        $info["commentaire"] = $_POST["commentaire"];
        $info["idArticle"] = $_GET['idArticles'];
        $info["date_commentaire"] = $date;
        

        if ($info["commentaire"] != "") {

            addComm($info);
            
            header('Location: ./index.php?articles=' . $_GET["idArticles"] .'');
            
            
        } else {

            echo'variables ajoutant à la base est vide';
        }
    } else {

        echo 'Votre titre ou contenu est vide';
    }
}




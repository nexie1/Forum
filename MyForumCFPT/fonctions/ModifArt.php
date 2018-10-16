<?php
//Si il est envoyer alors
if (isset($_POST["ModifArticle"])) {

    //Teste si mon Password est = vide    
    if ($_POST["Password"] != "" && $_POST["Username"] != "") {
        // Hachage de password
        $Username = (isset($_POST["Username"]) ? $Username = $_POST["Username"] : $Username = "" );
        $Password = (isset($_POST["Password"]) ? $Password = $_POST["Password"] : $Password = "" );
        $pass_hache = hash('sha256', $Password);

        if ($pass_hache == Login($Username)["Password"]) {

            //Login($users);

            $_SESSION["logged"] = true;
            header('Location: ./index.php');
            //$_SESSION["WHO"] = Login($Username);
        } else {
            echo " VOTRE MOT DE PASSE OU UTILISATEUR EST VIDE";
        }
    }
}


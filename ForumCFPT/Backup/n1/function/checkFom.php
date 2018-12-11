<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */

$_SESSION["CreationInscr"] = "Pas Rempli";

//Vérifie si on a appuier sur le bouton d'inscription
if (isset($_POST["Submit"])) {
    //Verifie si les 2 mots de passes sont egaux
    if ($_POST["motDePasse"] == $_POST["motDePasseConfirm"]) {
        addUser($info);
        $_SESSION["CreationInscr"] = "Complet";
        ;
    } else {
        $_SESSION["CreationInscr"] = "Incomplet";
    }
}

//Vérifie si l'article est rempli
if (isset($_POST["SubArticle"])) {
    addArticle($article);
}
?>
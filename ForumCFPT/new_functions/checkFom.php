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
    //Verifie si les 2 mots de passes sont égaux + captcha
    if ($_POST["CopieCaptcha"] == $_SESSION['captcha']) {
        if ($_POST["motDePasse"] == $_POST["motDePasseConfirm"]) {
            addUser($info);
            $_SESSION["CreationInscr"] = "Complet";
        } else {
            $_SESSION["CreationInscr"] = "Incomplet";
        }
    } else {
        $_SESSION["CreationInscr"] = "Incomplet";
    }
}

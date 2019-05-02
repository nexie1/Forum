<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */

$_SESSION["CreationInscr"] = "Pas Rempli";
//Vérifie si on a appuier sur le bouton d'inscription
if (isset($_POST["Submit"])) {
    //Verifie si les 2 mots de passes sont égaux + captcha
    if ($_POST["CopieCaptcha"] == $_SESSION['captcha']) {
        if ($_POST["password"] == $_POST["passwordConfirm"]) {
            addUser($info);
            $_SESSION["CreationInscr"] = "Complet";
        } else {
            $_SESSION["CreationInscr"] = "Incomplet";
        }
    } else {
        $_SESSION["CreationInscr"] = "Incomplet";
    }
}

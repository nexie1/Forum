<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */
//Vérifie si la bouton déconnexion est appuier si oui destruction de la session et redirection
if (isset($_POST["deconnexion"])) {
    session_destroy();
    header('Location: ' . $_SERVER['REQUEST_URI']);
}
?>
<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */
//Vérifie si l'envoie des données à l'appuis du bouton login fonctionne
if (isset($_POST["Login"])) {
//si le mot de passe entré par l'utilisateur est = au mot de passe de cet utilisateur dans la base de donnée, sinon on fait rien
    if ($info["motDePasse"] == getUser($info)["motDePasse"]) {
        $_SESSION["Connected"] = TRUE;
        $_SESSION["idUtilisateur"] = getUser($info)["idUtilisateur"];
        $_SESSION["statut"] = getUser($info)["statut"];
        $_SESSION["pseudo"] = $info["pseudo"];
        header('Location:  index.php?page=Index');
    }
}
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
    } else {
        
    }
}

/**
 * Fonction qui vérifie si la personne est connectée
 */
function checkConnexion() {
    //Si connectée affichage connecte + pseudo, sinon pas connecté
    if (isset($_SESSION["Connected"])) {
        $connexion = '<p style="color:green;">Connecté en tant que ' . $_SESSION["pseudo"] . '</p>';
        $btnCreateArticle = '<a href="index.php?page=CreerArticle"><button>Créer un article</button></a>';
        $btnConnexion = '<form method="POST" action="#"><input type="submit" name="deconnexion" value="Se déconnecter"></form>';
    } else {
        $connexion = '<p style="color:red;">Pas connecté</p>';
        $btnCreateArticle = "";
        $btnConnexion = "";
    }
    echo $connexion;
    echo $btnCreateArticle;
    echo $btnConnexion;
}
<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */

session_start();
$PSEUDO = "pseudo";
$NOM = "nom";
$PRENOM = "prenom";
$COURRIEL = "courriel";
$MOTDEPASSE = "motDePasse";

//Filtre les entrées des formulaires du site pour eviter l'injection
$info[$PSEUDO] = (isset($_POST[$PSEUDO]) ? $info[$PSEUDO] = filter_var($_POST[$PSEUDO], FILTER_SANITIZE_STRING) : $info[$PSEUDO] = "");
$info[$NOM] = (isset($_POST[$NOM]) ? $info[$NOM] = filter_var($_POST[$NOM], FILTER_SANITIZE_STRING) : $info[$NOM] = "");
$info[$PRENOM] = (isset($_POST[$PRENOM]) ? $info[$PRENOM] = filter_var($_POST[$PRENOM], FILTER_SANITIZE_STRING) : $info[$PRENOM] = "");
$info[$COURRIEL] = (isset($_POST[$COURRIEL]) ? $info[$COURRIEL] = filter_var($_POST[$COURRIEL], FILTER_SANITIZE_EMAIL) : $info[$COURRIEL] = "");
$info[$MOTDEPASSE] = (isset($_POST[$MOTDEPASSE]) ? $info[$MOTDEPASSE] = hash("sha1", filter_var($_POST[$MOTDEPASSE], FILTER_SANITIZE_STRING)) : $info[$MOTDEPASSE] = "");

$TITRE_ART = "titre";
$CONTENU_ART = "contenu";
$STATUT_ART = "statutArticles";
$DATE_ART = "dateArticles";

$article[$TITRE_ART] = (isset($_POST[$TITRE_ART]) ? $article[$TITRE_ART] = filter_var($_POST[$TITRE_ART], FILTER_SANITIZE_STRING) : $article[$TITRE_ART] = "");
$article[$CONTENU_ART] = (isset($_POST[$CONTENU_ART]) ? $article[$CONTENU_ART] = filter_var($_POST[$CONTENU_ART], FILTER_SANITIZE_STRING) : $article[$CONTENU_ART] = "");
$article[$STATUT_ART] = (isset($_POST[$STATUT_ART]) ? $article[$STATUT_ART] = filter_var($_POST[$STATUT_ART], FILTER_VALIDATE_INT) : $article[$STATUT_ART] = "");
$article[$DATE_ART] = date('Y-m-d');

//Appelent les pages pour les fonctions php
require_once './function/pdoConnection.php';
require_once './function/fonctionDatabase.php';
require_once './function/deconnexion.php';
require_once './function/checkFom.php';
require_once './function/login.php';

//Appelent les pages pour le code html
include './include/head.inc.php';
include './include/header.inc.php';
include './include/nav.inc.php';
include './include/menu.inc.php';

//Au chargement du site met la page index en paramètre GET pour que le switch fonctionne
$page = (isset($_GET['page']) ? $page = $_GET['page'] : $page = "");

//Quand le paramètre GET est inexistant met index
if ($page == "") {
    $page = "Index";
}

//Switch de changement de page
switch ($page) {
    case "Index":
        include './include/article.inc.php';
        break;
    case "MesArticles":
        include './include/article.inc.php';
        break;
    case "CreerArticle":
        include './include/formArticle.inc.php';
        break;
    case "Inscritpion":
        include './include/formInscription.inc.php';
        break;
    case "Login":
        include './include/formLogin.inc.php';
        break;
     case "ManageUsers":
        include './include/formUtilisateurs.inc.php';
        break;
    case "ModifUsers":
        include './include/formModifUtilisateurs.inc.php';
        break;
}
include './include/footer.inc.php';

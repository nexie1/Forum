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

$ID_MODIF = "idModif";
$PRENOM_MODIF = "prenomModif";
$NOM_MODIF = "nomModif";
$PASSWORD_MODIF = "passwordModif";
$EMAIL_MODIF = "emailModif";

$infoModif[$ID_MODIF] = (isset($_POST[$ID_MODIF]) ? $infoModif[$ID_MODIF] = filter_input(INPUT_POST, $ID_MODIF, FILTER_SANITIZE_STRING) : $infoModif[$ID_MODIF] = "");
$infoModif[$PRENOM_MODIF] = (isset($_POST[$PRENOM_MODIF]) ? $infoModif[$PRENOM_MODIF] = filter_input(INPUT_POST, $PRENOM_MODIF, FILTER_SANITIZE_STRING) : $infoModif[$PRENOM_MODIF] = "");
$infoModif[$NOM_MODIF] = (isset($_POST[$NOM_MODIF]) ? $infoModif[$NOM_MODIF] = filter_input(INPUT_POST, $NOM_MODIF, FILTER_SANITIZE_STRING) : $infoModif[$NOM_MODIF] = "");
$infoModif[$EMAIL_MODIF] = (isset($_POST[$EMAIL_MODIF]) ? $infoModif[$EMAIL_MODIF] = filter_input(INPUT_POST, $EMAIL_MODIF, FILTER_SANITIZE_STRING) : $infoModif[$EMAIL_MODIF] = "");

$id_ModifArticles = "idModifArticles";
$titre_ModifArticles = "titreModifArticles";
$contenu_ModifArticles = "contenuModifArticles";

$infoModifArticles[$id_ModifArticles] = (isset($_POST[$id_ModifArticles]) ? $infoModifArticles[$id_ModifArticles] = filter_input(INPUT_POST, $id_ModifArticles, FILTER_SANITIZE_STRING) : $infoModifArticles[$id_ModifArticles] = "");
$infoModifArticles[$titre_ModifArticles] = (isset($_POST[$titre_ModifArticles]) ? $infoModifArticles[$titre_ModifArticles] = filter_input(INPUT_POST, $titre_ModifArticles, FILTER_SANITIZE_STRING) : $infoModifArticles[$titre_ModifArticles] = "");
$infoModifArticles[$contenu_ModifArticles] = (isset($_POST[$contenu_ModifArticles]) ? $infoModifArticles[$contenu_ModifArticles] = filter_input(INPUT_POST, $contenu_ModifArticles, FILTER_SANITIZE_STRING) : $infoModifArticles[$contenu_ModifArticles] = "");


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
    case "ModifMesArticles":
        include './include/formModifMesArticles.inc.php';
        break;
    case "CacheArticle":
        if (isset($_GET["CacheArticleById"])) {
            CacheArticleById($_GET["CacheArticleById"]);
            header('Location: ./index.php?page=MesArticles');
        }
        break;
    case "DeleteAllArticles":
        CacheAllArticles($_GET["HideAllArticles"]);
        header('Location: ./index.php?page=Index');
        break;
}
include './include/footer.inc.php';

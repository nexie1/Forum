<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */
session_start();

require_once './new_functions/filter_input.php';
require_once './new_functions/pdoConnection.php';
require_once './new_functions/fonctionDatabase.php';
require_once './new_functions/checkFom.php';
require_once './new_functions/login.php';

include './new_includes/head.inc.php';
include './new_includes/header.inc.php';
include './new_includes/nav.inc.php';
include './new_includes/menu.inc.php';

//Au chargement du site met la page index en paramètre GET pour que le switch fonctionne
$page = (isset($_GET['page']) ? $page = $_GET['page'] : $page = "");

//Quand le paramètre GET est inexistant met index
if ($page == "") {
    $page = "Index";
}

//Switch de changement de page
switch ($page) {
    case "Index":
        include './new_includes/article.inc.php';
        break;


    case "MesArticles":
        include './new_includes/article.inc.php';
        break;


    case "CreerArticle":
        include './new_includes/formArticle.inc.php';
        //Vérifie si l'article est rempli
        if (isset($_POST["SubArticle"])) {
            addArticle($article);
            header('Location: ./index.php?page=MesArticles');
        }
        break;


    case "Inscritpion":
        include './new_includes/formInscription.inc.php';
        break;


    case "Login":
        include './new_includes/formLogin.inc.php';
        break;


    case "ManageUsers":
        $result = selectAll();
        include './new_includes/formUtilisateurs.inc.php';
        break;

    case "SupprUsers":
        $idUser = $_GET["id"];
        DelUser($idUser);
        header('Location: ./index.php?page=ManageUsers');
        break;


    case "ModifUsers":
        if (isset($_POST["SendModifier"])) {
            UpdateUsers($infoModif);
            header('Location: ./index.php?page=ManageUsers');
        }
        $slt["id"] = $_GET["id"];
        $result = selectUserById($slt);
        include './new_includes/formModifUtilisateurs.inc.php';

        break;


    case "ModifMesArticles":
        $idArticles = $_GET["idModifMyArticle"];
        $tableArticlesUser = getModifArticlesUserById($idArticles);
        include './new_includes/formModifMesArticles.inc.php';
        if (isset($_POST["ValidModifArticle"])) {
            UpdateModifiedArticlesUserById($infoModifArticles);
            header('Location: ./index.php?page=MesArticles');
        }

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

    case "deco":
        include_once './new_functions/deconnexion.php';
        break;
}
include './new_includes/footer.inc.php';

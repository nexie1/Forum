<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */
?>
<section>
    <?php
    require_once './function/functionArticle.php';
//Quand l'utilisateur connecté est pas admin et qu'il est sur la page mes articles on prend ces articles privé et public
    if (isset($_SESSION["Connected"]) && $_SESSION["statut"] == 1 && $page == "MesArticles") {
        articleUser($_SESSION["pseudo"]);
    } elseif (isset($_SESSION["Connected"]) && $_SESSION["statut"] == 2 && $page == "MesArticles") {
        articleUser($_SESSION["pseudo"]);
    } elseif (isset($_SESSION["Connected"]) && $_SESSION["statut"] == 1 && $page == "Index") {//Quand l'utilisateur connecté est pas admin et qui est sur la page mes index on prend les articles privé et public
        articlePublic();
        //articlePrive();
    } elseif (isset($_SESSION["Connected"]) && $_SESSION["statut"] == 2 && $page == "Index") {//Quand l'utilisateur connecté est pas admin et qui est sur la page mes index on prend les articles privé et public
        articlePublic();
        //articlePrive();
    } elseif ($page == "Index") {////Quand l'utilisateur est pas connecté et sur la page index on prend les articles public
        articlePublic();
    }
    ?>
</section>
<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */
?>

<section id="maSection">
    <?php
    require_once './function/functionArticle.php';
    ModifArticleUser($_GET["idModifMyArticle"]);
    
    if (isset($_POST["ValidModifArticle"])) {
        UpdateModifiedArticlesUserById($infoModifArticles);
        header('Location: ./index.php?page=MesArticles');
    }
    ?>
</section>
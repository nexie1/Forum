<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
?>
<article>
    <div class="row content">
        <div class="col-sm-9">
            </br>
            <h2>Titre : <?= $value["title"] ?></h2>
            <h5><span class="glyphicon glyphicon-time"></span> Post by <?= $value["pseudo"] ?>, <?= $value["creation_date"] ?>.</h5></br>
            <p><?= $value["content"] ?></p>

            <a href="index.php?page=ModifMesArticles&idModifMyArticle=<?= $value["id_article"] ?>"><input type="button" class="btn-info" name="ModifMyArticles" value="Modifier votre article"></a>
            <a href="index.php?page=CacheArticle&CacheArticleById=<?= $value["id_article"] ?>"><input class="btn-danger" type="submit" name="DelMyArticles" value="Supprimer votre article"></a>


            <em><a href="./index.php?page=afficheArticleById&idArt=<?= $value["id_article"] ?>">Commentaires</a></em>   
        </div>
    </div>
</article>
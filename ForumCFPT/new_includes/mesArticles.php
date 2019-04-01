<article>
    <div class="row content">
        <div class="col-sm-9">
            </br>
            <h2>Titre : <?= $value["titre"] ?></h2>
            <h5><span class="glyphicon glyphicon-time"></span> Post by <?= $value["pseudo"] ?>, <?= $value["dateArticles"] ?>.</h5></br>
            <p><?= $value["contenu"] ?></p>

            <a href="index.php?page=ModifMesArticles&idModifMyArticle=<?= $value["idArticles"] ?>"><input type="button" class="btn-info" name="ModifMyArticles" value="Modifier votre article"></a>
            <a href="index.php?page=CacheArticle&CacheArticleById=<?= $value["idArticles"] ?>"><input class="btn-danger" type="submit" name="DelMyArticles" value="Supprimer votre article"></a>

            <!--<h4>Leave a Comment:</h4>
            <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            <br><br>-->
        </div>
    </div>
</article>
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
    foreach ($tableArticlesUser as $value) {
        ?>
        <article>
            <form method="POST" action="#">
                <table>
                    <tr>
                        <td>Titre Article</td>                     
                        <td><input name="titreModifArticles" type="text" placeholder=" Titre de l'article" value="<?= $value["titre"] ?>"></td>
                    </tr>
                    <tr>
                        <td>Contenu</td>
                        <td><textarea style="width: 300px; height: 300px;" name="contenuModifArticles" placeholder="Contenu de l'article"><?= $value["contenu"] ?></textarea></td>
                    </tr>
                    <tr>
                        <td>idArt</td>
                        <td><input readonly="" name="idModifArticles" type="text" placeholder=" id de l'article" value="<?= $idArticles ?>"></td>
                    </tr>                    
                    <tr>
                        <td><input type="submit" name="ValidModifArticle" value="Valider"></td>
                    </tr>
                </table>
            </form>
        </article>
        <?php
    }
    ?>
</section>  
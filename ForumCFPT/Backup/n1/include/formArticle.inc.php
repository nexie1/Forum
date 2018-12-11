<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */
?>

<?php 
//Quand il est connecté il peut creer des articles sinon il est redirigé
if (isset($_SESSION["Connected"])) { ?>
    <form method="POST" action="#">
        <section>
            <article>
                <table>
                    <tr>
                        <td>Titre Article</td>
                        <td><input name="titre" type="text" placeholder="Titre de l'article" value="" required tabindex="1"></td>
                    </tr>
                    <tr>
                        <td>Contenu</td>
                        <td><textarea style="width: 300px; height: 300px;" name="contenu" placeholder="Contenu de l'article" required tabindex="2"></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="SubArticle" value="Créer un article" tabindex="3"></td>
                    </tr>
                    
                   
                    
                </table>
            </article>
        </section>
    </form>
    <?php
} else {
    header('Location: index.php?page=Index');
}
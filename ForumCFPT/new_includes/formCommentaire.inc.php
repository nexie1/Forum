<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
//Quand il est connecté il peut creer des articles sinon il est redirigé
if (!isset($_SESSION["Connected"])) {

    header('Location: index.php?page=Index');
}
?>
<form method="POST" action="#">
    <section>
        <article>
            <table>
                <tr>
                    <td>Contenu</td>
                    <td><textarea style="width: 300px; height: 300px;" name="commentaire" placeholder="Contenu de l'article" required tabindex="2"></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" name="SubCommentaire" value="Créer un commentaire" tabindex="3"></td>
                </tr>
            </table>
        </article>
    </section>
</form>
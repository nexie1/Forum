<?php 

require_once './fonctions/AjoutArt.php';
?>

<article id="maSection">
        <form method="post" action="#">
            <fieldset>
                <legend>Titre de l'article</legend> <!-- Titre du fieldset --> 
                <label for="nom">Titre : </label><input required type="text" name="titre" id="titre" />
            </fieldset>

            <fieldset>
                <legend>Contenu de l'article</legend> <!-- Titre du fieldset -->
                    <textarea name="contenu" id="article" cols="40" rows="4"></textarea>
                </p>
                    <input type="submit" value="Ajouter l'article" name="AddArticle">
            </fieldset>
        </form>
    </article>

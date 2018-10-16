<?php 

require_once './fonctions/AjoutCommentaire.php';
?>

<article id="maSection">
        <form method="post">
            <fieldset>
                <legend>Contenu du commentaire</legend> <!-- Titre du fieldset -->
                    <textarea name="commentaire" id="article" cols="40" rows="4"></textarea>
                </p>
                    <input type="submit" value="Ajouter le commentaire" name="addComm">
            </fieldset>
        </form>
    </article>


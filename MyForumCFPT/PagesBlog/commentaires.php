

<section id="maSection">
    <article class="ArtPublic">
        <h1>Mon super blog !</h1>
        <p><a href="./index.php">Retour à la liste des articles</a></p>

        <?php
        require_once './fonctions/SupprArt.php';
        
// Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=bd_myforum;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
// Récupération des Articles

        $req = $bdd->prepare('SELECT idArticle, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles WHERE idArticle = ?');
        $req->execute(array($_GET['articles']));
        $donnees = $req->fetch();
        ?>

        <div class="news">
            <h3>
                <?php echo htmlspecialchars($donnees['titre']); ?>
                <em>LA DATE EST <?php echo $donnees['date_creation_fr']; ?></em>
            </h3>

            <p>
                <?php
                echo nl2br(htmlspecialchars($donnees['contenu']));
                ?>
            </p>
        </div>
             
        <form method="post">
            <input type="submit" value="Modifie l'article" name="ModifArt">
            <input type="submit" value="Supprime l'article" name="SupprArt">
        </form>
        

        <h2>Commentaires</h2>

        <?php
        $req->closeCursor(); //on libère le curseur pour la prochaine requête
// Récupération des commentaires
//$req = $bdd->prepare('SELECT `idCommentaire`,`commentaire`, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE `idArticle` = ? ORDER BY `date_commentaire`');
        $req = $bdd->prepare('SELECT idArticle,idCommentaire, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE idArticle = ? ORDER BY date_commentaire');
        $req->execute(array($_GET['articles']));
        $salut = null;
        while ($donnees = $req->fetch()) {
            ?>
            <p><strong><?php echo htmlspecialchars($donnees['idCommentaire']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
            <p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>

            <?php
        } // Fin de la boucle des commentaires
        $req->closeCursor();
        ?>
        <em><a href="./index.php?addComm&idArticles=<?php echo $_GET['articles'] ?>">Ajout Commentaire</a></em>
    </article>
</section>
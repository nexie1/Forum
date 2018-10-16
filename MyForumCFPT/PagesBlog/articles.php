<h1>Mon super blog !</h1>
<p>Derniers Articles du blog :</p>
<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bd_myforum;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// On récupère les 5 derniers Articles
$req = $bdd->query('SELECT idArticle, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles ORDER BY date_creation DESC LIMIT 0, 5');

while ($donnees = $req->fetch()) {
    ?>
    <div class="news">
        <h3>
            <?php echo htmlspecialchars($donnees['titre']); ?>
            <em>le <?php echo $donnees['date_creation_fr']; ?></em>
        </h3>

        <p>
            <?php
            // On affiche le contenu du Articles
            echo nl2br(htmlspecialchars($donnees['contenu']));
            ?>
            <br />
            <?php
            
            if ($_SESSION['isAdmin'] == 2){
                ?>

                    <a href="./index.php?articles=<?php echo $donnees['idArticle']; ?>">Commentaires</a>
                    
                <?php }?>


        </p>
    </div>
    <?php
} // Fin de la boucle des articles
$req->closeCursor();

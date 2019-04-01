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
$statut = 0;
if (isset($_SESSION["statut"])) {
    $statut = $_SESSION["statut"];
}
?>

<nav class="nav-side-menu bg-dark text-white">
    <div class="text-white bg-dark brand">
        <?php if (isset($_SESSION["Connected"])) { ?>
            <p style="color:green;">Connecté : <strong> <?= $_SESSION["pseudo"] ?></strong></p>
        <?php } ?>
    </div>

    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

    <div class="menu-list"> 
        <ul id="menu-content" class="menu-content collapse out">
            <?php
            if (isset($_SESSION["Connected"])) {
                $tableTopic = getTopics();
                foreach ($tableTopic as $value) {
                    ?> 
                    <li><a href="index.php?page=MesArticles"><?= $value["nomTopic"] ?></a></li> 
                <?php } ?>
                <br>
                <br>
                <br>
                <li><a href="index.php?page=CreerArticle">Créer un article</a></li>
                <form method="POST" action="#"><li><a href="index.php?page=deco"><i class="fa fa-user fa-lg"></i> Se déconnecter</a></li></form>
            <?php } ?>

            <?php if ($statut == 2) { ?>
                <li><a href="index.php?page=DeleteAllArticles&HideAllArticles"><i class="fa fa-user fa-lg"></i> Supprime tous les articles</a></li>
                <?php }
                ?>


        </ul>
    </div>
</nav>


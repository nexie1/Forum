<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */
?>
<nav>
    <a href="index.php?page=Index">Index</a>
    <?php
    //Quand l'utilisateur connecté est pas admin affiche le lien vers la page mes articles
    if (isset($_SESSION["Connected"]) && $_SESSION["statut"] == 2) {
        echo '<a href="index.php?page=MesArticles">Mes articles</a>';
        echo '<a href="index.php?page=ManageUsers">Gerer Utilisateur</a>';
    }
    if (isset($_SESSION["Connected"]) && $_SESSION["statut"] == 1) {
        echo '<a href="index.php?page=MesArticles">Mes articles</a>';
    }
    ?>
    <a href="index.php?page=Inscritpion">Inscription</a>
    <?php if (!isset($_SESSION["Connected"])) { ?>
        <a id="aLog" href="index.php?page=Login">Login</a>

<?php } ?>
</nav>
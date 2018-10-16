<nav id="myNav">
    <div id="lienStyl">
        <a href="index.php">Index</a>



        <?php
        if (isset($_SESSION["logged"])) {
            ?>
            <a href="./index.php?AddArticles">Ajout Articles</a>
            <a href="./Deco.php">Deco</a>

        <?php } else { ?>

            <a href="loginCRUD.php">Login</a>
            <a href="./inscription.php">Inscription</a>
        <?php }
        ?>
        

    </div>
</nav>



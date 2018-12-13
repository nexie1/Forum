<section id="maSection">
    <?php
    require_once './function/functionManageUtilisateurs.php';
    manageModifUtilisateurs();
    if (isset($_POST["SendModifier"])) {
        UpdateUsers($infoModif);
        header('Location: ./index.php?page=ManageUsers');
    }
    ?>
</section>


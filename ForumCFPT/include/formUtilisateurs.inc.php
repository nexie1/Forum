
<section id="maSection">
    <?php
    require_once './function/functionManageUtilisateurs.php';
    manageUtilisateurs();

    if (isset($_GET["SendSupprimer"])) {
        $idUser = $_GET["id"];
        DelUser($idUser);
        header('Location: ./index.php?page=ManageUsers');
    }
    ?>
</section>


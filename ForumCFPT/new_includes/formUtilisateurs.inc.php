<section id="maSection">         
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>prenom</th>
                    <th>nom</th>
                    <th>courriel</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) : ?>
                    <tr>
                        <td class="manaUtili"><?= $row["prenom"]; ?></td>
                        <td class="manaUtili"><?= $row["nom"]; ?></td>
                        <td class="manaUtili"><?= $row["courriel"]; ?></td>
                <form method="post">
                    <td class="manaUtili"><a href="index.php?page=ModifUsers&id=<?= $row["idUtilisateur"]; ?>">&#9997;</a></td>
                    <td class="manaUtili"><a href="index.php?page=SupprUsers&SendSupprimer&id=<?= $row["idUtilisateur"]; ?>">&#x274C;</a></td>  
                </form>
                </tr>
            <?php endforeach; ?>
            <td><a href="index.php?page=Inscritpion">Ajouter un utilisateur</a></td>
            </tbody>
        </table>
</section>
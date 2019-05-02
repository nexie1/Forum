<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
?>
<section id="maSection">         
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) : ?>
                    <tr>
                        <td class="manaUtili"><?= $row["first_name"]; ?></td>
                        <td class="manaUtili"><?= $row["last_name"]; ?></td>
                        <td class="manaUtili"><?= $row["email"]; ?></td>
                <form method="post">
                    <td class="manaUtili"><a href="index.php?page=ModifUsers&id=<?= $row["id_user"]; ?>">&#9997;</a></td>
                    <td class="manaUtili"><a href="index.php?page=SupprUsers&SendSupprimer&id=<?= $row["id_user"]; ?>">&#x274C;</a></td>  
                </form>
                </tr>
            <?php endforeach; ?>
            <td><a href="index.php?page=Inscritpion">Ajouter un utilisateur</a></td>
            </tbody>
        </table>
</section>
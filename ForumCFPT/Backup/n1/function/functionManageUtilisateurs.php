<?php

function manageUtilisateurs() {
    $result = selectAll();
    //$resultat = selectParticiper();
    ?>
    <div>
        <h3>Personnes</h3>
        <div>   
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>prenom</th>
                        <th>nom</th>
                        <th>courriel</th>
                        <th>statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td class="manaUtili"><?php echo $row["idUtilisateur"]; ?></td>
                            <td class="manaUtili"><?php echo $row["prenom"]; ?></td>
                            <td class="manaUtili"><?php echo $row["nom"]; ?></td>
                            <td class="manaUtili"><?php echo $row["courriel"]; ?></td>
                            <td class="manaUtili"><?php echo $row["statut"]; ?> </td>
                    <form method="post">
                        <td class="manaUtili"><a href="fonctions/manageUserFonction.php?SendSupprimer&id=<?php echo $row["idUtilisateur"]; ?>">Supprimer</a></td>  
                        <td class="manaUtili"><a href="index.php?page=ModifUsers&id=<?php echo $row["idUtilisateur"]; ?>">Modifier</a></td>
                    </form>
                    </tr>
                <?php endforeach; ?>
                <td><a href="index.php?page=Inscritpion">Ajouter un utilisateur a la base de donnée</a></td>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}

function manageModifUtilisateurs() {
    $slt["id"] = $_GET["id"];
    $result = selectUserById($slt);
    ?> 
    <FORM method="post" action="fonctions/manageFonction.php">
        <TABLE>
            <?php foreach ($result as $row) { ?>
            <?php } ?>
            <TR>
                <TD><label for = "idModif">id : </label></TD>
                <TD><input type = "text" name = "idModif"readonly="true" value="<?php echo $row["idUtilisateur"]; ?>"</TD>
            </TR>

            <TR>
                <TD><label for = "prenomModif">prenom : </label></TD>
                <TD><input type = "text" name = "prenomModif" value="<?php echo $row["prenom"]; ?>" required</TD>
            </TR>
            <TR>
                <TD><label for = "nomModif">nom : </label></TD>
                <TD><input type = "text" name = "nomModif" value="<?php echo $row["nom"]; ?>" required</TD>
            </TR>
            <TR>
                <TD><label for = "emailModif">email : </label></TD>
                <TD><input type = "email" name = "emailModif" value="<?php echo $row["courriel"]; ?>" required /></TD>
            </TR>
            <TR>     
                <td><a href="index.php?page=ManageUsers">Back</a></td>
                <TD><input type = "submit" value = "Envoyer" name="SendModifier" id = "valider" /></TD> 
            </TR>
        </TABLE>
    </FORM>  
    <?php
}

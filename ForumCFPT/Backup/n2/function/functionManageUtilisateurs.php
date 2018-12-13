<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */

function manageUtilisateurs() {
    $result = selectAll();
    ?>
    <article>
        <h3>Personnes</h3>
        <div>   
            <table>
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
                            <td class="manaUtili"><?php echo $row["prenom"]; ?></td>
                            <td class="manaUtili"><?php echo $row["nom"]; ?></td>
                            <td class="manaUtili"><?php echo $row["courriel"]; ?></td>
                    <form method="post">
                        <td class="manaUtili"><a href="index.php?page=ModifUsers&id=<?php echo $row["idUtilisateur"];?>">&#9997;</a></td>
                        <td class="manaUtili"><a href="index.php?page=ManageUsers&SendSupprimer&id=<?php echo $row["idUtilisateur"];?>">&#x274C;</a></td>  
                    </form>
                    </tr>
                <?php endforeach; ?>
                <td><a href="index.php?page=Inscritpion">Ajouter un utilisateur</a></td>
                </tbody>
            </table>
        </div>
    </article>
    <?php
}

function manageModifUtilisateurs() {
    $slt["id"] = $_GET["id"];
    $result = selectUserById($slt);
    ?> 
    <article>
        <FORM method="post" action="#">
            <TABLE>
                <?php
                foreach ($result as $row) {
                    
                }
                ?>
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
                    <td><a href="index.php?page=ManageUsers"><input type="button" value="Cancel"></a></td>                
                    <TD><input type = "submit" value = "Envoyer" name="SendModifier" id = "valider" /></TD> 
                </TR>
            </TABLE>
        </FORM>  
    </article>
    <?php
}

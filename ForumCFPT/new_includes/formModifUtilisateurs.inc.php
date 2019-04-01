<section id="maSection">
    <article>
        <FORM method="post" action="">
            <TABLE>
                <?php
                foreach ($result as $row) {
                    
                }
                ?>
                <TR>
                    <TD><label for = "idModif">id : </label></TD>
                    <TD><input type = "text" name = "idModif"readonly="true" value="<?= $row["idUtilisateur"]; ?>"</TD>
                </TR>
                <TR>
                    <TD><label for = "prenomModif">prenom : </label></TD>
                    <TD><input type = "text" name = "prenomModif" value="<?= $row["prenom"]; ?>" required</TD>
                </TR>
                <TR>
                    <TD><label for = "nomModif">nom : </label></TD>
                    <TD><input type = "text" name = "nomModif" value="<?= $row["nom"]; ?>" required</TD>
                </TR>
                <TR>
                    <TD><label for = "emailModif">email : </label></TD>
                    <TD><input type = "email" name = "emailModif" value="<?= $row["courriel"]; ?>" required /></TD>
                </TR>
                <TR>   
                    <TD><input type = "submit" value = "Envoyer" name="SendModifier" id = "valider" /></TD> 
                    <td><a href="index.php?page=ManageUsers"><input type="button" value="Cancel"></a></td>-->          
                </TR>
            </TABLE>
        </FORM>  
    </article>
</section>


<!DOCTYPE html>

<?php
require './fonctions/fonctionsBDcrud.php';
require_once './fonctions/inscri.php';
//require('captcha.php');
?>
<html>
    <?php
    include './pages/Head.php';
    ?>

    <body>
        <div id="lienStyl">

            <h1>INSCRIT TOI </h1>
        </div>     
        <FORM id="formInsc" method="post" action="">
            <TABLE BORDER=1>

                
                <TR>
                    <TD><label for = "nom">Nom : </label></TD>
                    <TD><input type = "text" name = "nom" required</TD>
                </TR>
                <TR>
                    <TD><label for = "prenom">Prenom : </label></TD>
                    <TD><input type = "text" name = "prenom" required</TD>
                </TR>
                <TR>
                    <TD><label for = "Username">Username : </label></TD>
                    <TD><input type = "text" name = "Username" required</TD>
                </TR>

                <TR>
                    <TD><label for = "Password">Mot de passe : </label></TD>
                    <TD><input type = "password" name = "Password" required</TD>
                </TR>

                <TR>
                    <TD><label for = "Password">Retaper mot de passe : </label></TD>
                    <TD><input type = "password" name = "PasswordConfirm" required</TD>
                </TR>

                <TR>
                    <TD><label for = "Email">Email : </label></TD>
                    <TD><input type = "email" name = "Email" required /></TD>
                </TR>
                <TR>

                    <td>
                        <label for="captcha">Recopiez le mot : <img src="captcha.php" alt="Captcha" /></label>
                    </td>   

                    <TD><input type = "text" name = "CopieCaptcha" value="" /></TD>
                </TR>

                <TR>
                    <TD>
                        <a href="loginCRUD.php">Login</a>
                    </TD>
                    <TD>  

                        <input type = "submit" value = "Envoyer" name="Send" id = "valider" />
                    </TD>
                </TR>
            </TABLE>
        </FORM>  

    </body>
</html>

<?php

require './fonctions/fonctionsBDcrud.php';
require './fonctions/logged.php';
?>


<!DOCTYPE html>
<html>
    <?php
    include './pages/Head.php';
    ?>
    <body>
    <div id="lienStyl">
        <h1>LOGIN TOI </h1>
    </div>
    
        <form id="formInsc" method="POST" action="">
            <table>
                <tr>
                    <td>Pseudo : </td>
                    <td><input type="text" name="Username"/></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type="password" name="Password" value=""/></td>
                </tr>
                <TR>

                    <td>
                        <label for="captcha">Recopiez le mot : <img src="captcha.php" alt="Captcha" /></label>
                    </td>   

                    <TD><input type = "text" name = "CopieCaptcha" value="" /></TD>
                </TR>
                <tr>
                    <td><a href="index.php">Index</a></td>
                    <td><input name="Sent" type="submit" value="Envoie"></td>                   
                </tr>
            </table>
        </form>
    </body>
</html>

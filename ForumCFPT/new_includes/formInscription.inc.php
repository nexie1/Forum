<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */
?>
<form method="POST" action="#">
    <section>
        <article>
            <table>
                <tr>
                    <td>Pseudo</td>
                    <td><input name="pseudo" type="text" placeholder="Entrez un username" value="<?= $info["pseudo"]; ?>" required tabindex="1"></td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td><input name="nom" type="text" placeholder="Entrez votre nom" value="<?=$info["nom"]; ?>" required tabindex="2"></td>
                </tr>
                <tr>
                    <td>Prénom</td>
                    <td><input name="prenom" type="text" placeholder="Entrez votre prénom" value="<?= $info["prenom"]; ?>" required tabindex="3"></td>
                </tr>
                <tr>
                    <td>Courriel</td>
                    <td><input name="courriel" type="email" placeholder="Entrez votre email" value="<?= $info["courriel"]; ?>" required tabindex="4"></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input name="motDePasse" type="password" placeholder="Entrez un mot de passe" value="" required tabindex="5"></td>
                </tr>
                <tr>
                    <td>Repeter mot de passe</td>
                    <td><input name="motDePasseConfirm" type="password" placeholder="Retapez mot de passe" value="" required tabindex="6"></td>
                </tr>
                <TR>
                    <td>
                        <label for="captcha"><img src="captcha.php" alt="Captcha" /></label>
                    </td>   

                    <TD><input placeholder="Entrez le captcha" type = "text" name = "CopieCaptcha" value="" required tabindex="7" /></TD>
                </TR>
                <tr>
                    <td><input type="submit" name="Submit" value="Créer un compte" tabindex="8"></td>
                </tr>
            </table>
            <?php
            //Quand le formulaire d'inscription est pas rempli affiche Remplissez le formulaire
            if ($_SESSION["CreationInscr"] == "Pas Rempli") {
                echo '<p>Remplissez le formulaire</p>';
            }
            //Quand le formulaire d'inscription est correct affiche Création du compte réussi
            if ($_SESSION["CreationInscr"] == "Complet") {
                echo '<p style="color:green;">Création du compte réussi</p>';
            }
            //Quand le formulaire d'inscription est incomplet affiche Vos mots de passe ne correspondent pas!
            if ($_SESSION["CreationInscr"] == "Incomplet") {
                echo '<p style="color:red;">Le captcha ou vos mots de passe ne correspondent pas!</p>';
            }
            ?>
        </article>
    </section>
</form>

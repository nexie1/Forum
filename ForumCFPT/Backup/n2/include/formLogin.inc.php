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
                    <td><input name="pseudo" type="text" placeholder="Entrez un pseudo" value="<?php echo $info["pseudo"]; ?>" required></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input name="motDePasse" type="password" placeholder="Entrez un mot de passe" value="" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Login" value="Se connecter"></td>
                </tr>
            </table>
        </article>
    </section>
</form>
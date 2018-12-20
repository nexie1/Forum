<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */

/**
 * Affiche les articles selon les utilisateurs
 * @param type $pseudo
 */
function articleUser($pseudo) {
    $tableArticlesUser = getArticlesUser($_SESSION["idUtilisateur"]);
    foreach ($tableArticlesUser as $value) {
        //si le statut de l'article = 2 affiche privé sinon public
        if ($value["statutArticles"] == 2) {
            $stat = "Privé";
        } else {
            $stat = "Public";
        }
        ?>
        <article>
            <table>
                <tr>         
                    <td colspan="2" style="border-radius: 2px; padding: 5px; text-align: center; background-color: grey;"><strong><?php echo $pseudo ?></strong> a creer l article le <strong><?php echo $value["dateArticles"] ?></strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 10px; font-size: 20px; font-weight: bold;"> Titre : <?php echo $value["titre"] ?></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 10px;"><fieldset> <?php echo $value["contenu"] ?></fieldset></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;"><a href="index.php?page=ModifMesArticles&idModifMyArticle=<?php echo $value["idArticles"] ?>">
                            <input type="button" name="ModifMyArticles" value="Modifier votre article"></a>
                        <a href="index.php?page=CacheArticle&CacheArticleById=<?php echo $value["idArticles"] ?>"><input type="submit" name="DelMyArticles" value="Supprimer votre article"></a>
                      <!--  <a href="index.php?page=CacheArticle&CacheArticleById=<?php echo $value["idArticles"] ?>"><input type="submit" name="Commentaires" value="Commenter cette article"></a>-->


                    </td>           
                </tr>
            </table>
        </article>
        <?php
    }
}

/**
 * Affiche les article public
 */
function articlePublic() {
    $tableArticlesPublic = getArticlesPublic();
    foreach ($tableArticlesPublic as $value) {

        $slt = $value["pseudo"];
        $slt2 = $value["dateArticles"];
        ?>
        <article>
            <table>
                <tr>
                    <td style="border-radius: 2px; padding: 5px; text-align: center; background-color: grey;"><strong><?php echo $slt; ?></strong> a creer l article le <strong> <?php echo $slt2; ?></strong></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 10px; font-size: 20px; font-weight: bold;"> Titre : <?php echo $value["titre"] ?></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 10px"><fieldset> <?php echo $value["contenu"] ?></fieldset></td>
                </tr>
            </table>
        </article>
        <?php
    }
}

/**
 * Affiche les articles privé
 */
/* function articlePrive() {
  $tableArticlesPrive = getArticlesPrive();
  foreach ($tableArticlesPrive as $value) {
  //si le statut de l'article = 2 affiche privé sinon public
  if ($value["statutArticles"] == 2) {
  $stat = "Privé";
  } else {
  $stat = "Public";
  }
  echo '<article>';
  echo '<table>';
  echo '<tr>';
  echo '<th style="border-radius: 2px; padding: 5px; text-align: center; background-color: grey;">Privé</th>';
  echo '</tr>';
  echo '<tr>';
  echo '<td style="padding-top: 10px;">' . $value["pseudo"] . '</td>';
  echo '<td style="padding-top: 10px; font-size: 12px;">' . $value["dateArticles"] . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td colspan="2" style="padding-top: 10px; font-size: 20px; font-weight: bold;">' . $value["titre"] . '</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td colspan="2" style="padding-top: 10px">' . $value["contenu"] . '</td>';
  echo '</tr>';
  echo '</table>';
  echo '</article>';
  }
  } */




function ModifArticleUser($idArticles) {
    $tableArticlesUser = getModifArticlesUserById(/* $_SESSION["idUtilisateur"] */$idArticles);


    foreach ($tableArticlesUser as $value) {
        //si le statut de l'article = 2 affiche privé sinon public
        if ($value["statutArticles"] == 2) {
            $stat = "Privé";
        } else {
            $stat = "Public";
        }
        ?>
        <article>
            <form method="POST" action="#">
                <table>
                    <tr>
                        <td>Titre Article</td>                     
                        <td><input name="titreModifArticles" type="text" placeholder=" Titre de l'article" value="<?php echo $value["titre"] ?>"></td>
                    </tr>
                    <tr>
                        <td>Contenu</td>
                        <td><textarea style="width: 300px; height: 300px;" name="contenuModifArticles" placeholder="Contenu de l'article"><?php echo $value["contenu"] ?></textarea></td>
                    </tr>
                    <tr>
                        <td>idArt</td>
                        <td><input readonly="" name="idModifArticles" type="text" placeholder=" id de l'article" value="<?php echo $idArticles ?>"></td>
                    </tr>                    
                    <tr>
                        <td><input type="submit" name="ValidModifArticle" value="Valider"></td>
                    </tr>
                </table>
            </form>
        </article>


        <?php
    }
}

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
function articleUser($pseudo)
{
    $tableArticlesUser = getArticlesUser($_SESSION["idUtilisateur"]);

    foreach ($tableArticlesUser as $value) {
        //si le statut de l'article = 2 affiche privé sinon public
        if ($value["statutArticles"] == 2) {
            $stat = "Privé";
        }
        else
        {
            $stat = "Public";
        }
        echo '<article>';
            echo '<table>';
                echo '<tr>';   
                    echo '<td style="border-radius: 2px; padding: 5px; text-align: center; background-color: grey;"> Créateur de l article : <strong>'. $pseudo .' le '.$value["dateArticles"].' </strong></td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td colspan="2" style="padding-top: 10px; font-size: 20px; font-weight: bold;"> Titre : '.$value["titre"].'</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td colspan="2" style="padding-top: 10px">'.$value["contenu"].'</td>';
                echo '</tr>';
            echo '</table>';
        echo '</article>';
    }
}

/**
 * Affiche les article public
 */
function articlePublic()
{
    $tableArticlesPublic = getArticlesPublic();
    foreach ($tableArticlesPublic as $value) {
        echo '<article>';
            echo '<table>';
                echo '<tr>';
                    echo '<th style="border-radius: 2px; padding: 5px; text-align: center; background-color: grey;">Public</th>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td style="padding-top: 10px;">'. $value["pseudo"] .'</td>';
                    echo '<td style="padding-top: 10px; font-size: 12px;">'.$value["dateArticles"].'</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td colspan="2" style="padding-top: 10px; font-size: 20px; font-weight: bold;">'.$value["titre"].'</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td colspan="2" style="padding-top: 10px">'.$value["contenu"].'</td>';
                echo '</tr>';
            echo '</table>';
        echo '</article>';
    }
}

/**
 * Affiche les articles privé
 */
function articlePrive()
{
    $tableArticlesPrive = getArticlesPrive();
    foreach ($tableArticlesPrive as $value) {
        //si le statut de l'article = 2 affiche privé sinon public
        if ($value["statutArticles"] == 2) {
            $stat = "Privé";
        }
        else
        {
            $stat = "Public";
        }
        echo '<article>';
            echo '<table>';
                echo '<tr>';
                    echo '<th style="border-radius: 2px; padding: 5px; text-align: center; background-color: grey;">Privé</th>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td style="padding-top: 10px;">'. $value["pseudo"] .'</td>';
                    echo '<td style="padding-top: 10px; font-size: 12px;">'.$value["dateArticles"].'</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td colspan="2" style="padding-top: 10px; font-size: 20px; font-weight: bold;">'.$value["titre"].'</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td colspan="2" style="padding-top: 10px">'.$value["contenu"].'</td>';
                echo '</tr>';
            echo '</table>';
        echo '</article>';
    }
}
?>
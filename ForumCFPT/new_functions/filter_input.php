<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */

$PSEUDO = "pseudo";
$NOM = "last_name";
$PRENOM = "first_name";
$COURRIEL = "email";
$MOTDEPASSE = "password";

//Filtre les entrées des formulaires du site pour eviter l'injection
$info[$PSEUDO] = (isset($_POST[$PSEUDO]) ? filter_var($_POST[$PSEUDO], FILTER_SANITIZE_STRING) : "");
$info[$NOM] = (isset($_POST[$NOM]) ? filter_var($_POST[$NOM], FILTER_SANITIZE_STRING) : "");
$info[$PRENOM] = (isset($_POST[$PRENOM]) ? filter_var($_POST[$PRENOM], FILTER_SANITIZE_STRING) : "");
$info[$COURRIEL] = (isset($_POST[$COURRIEL]) ? filter_var($_POST[$COURRIEL], FILTER_SANITIZE_EMAIL) : "");
$info[$MOTDEPASSE] = (isset($_POST[$MOTDEPASSE]) ? hash("sha1", filter_var($_POST[$MOTDEPASSE], FILTER_SANITIZE_STRING)) : "");

$ID_MODIF = "idModif";
$PRENOM_MODIF = "prenomModif";
$NOM_MODIF = "nomModif";
$PASSWORD_MODIF = "passwordModif";
$EMAIL_MODIF = "emailModif";

$infoModif[$ID_MODIF] = (isset($_POST[$ID_MODIF]) ? filter_input(INPUT_POST, $ID_MODIF, FILTER_SANITIZE_STRING) : "");
$infoModif[$PRENOM_MODIF] = (isset($_POST[$PRENOM_MODIF]) ? filter_input(INPUT_POST, $PRENOM_MODIF, FILTER_SANITIZE_STRING) : "");
$infoModif[$NOM_MODIF] = (isset($_POST[$NOM_MODIF]) ? filter_input(INPUT_POST, $NOM_MODIF, FILTER_SANITIZE_STRING) : "");
$infoModif[$EMAIL_MODIF] = (isset($_POST[$EMAIL_MODIF]) ? filter_input(INPUT_POST, $EMAIL_MODIF, FILTER_SANITIZE_STRING) : "");

$id_ModifArticles = "idModifArticles";
$titre_ModifArticles = "titreModifArticles";
$contenu_ModifArticles = "contenuModifArticles";

$infoModifArticles[$id_ModifArticles] = (isset($_POST[$id_ModifArticles]) ? filter_input(INPUT_POST, $id_ModifArticles, FILTER_SANITIZE_STRING) : "");
$infoModifArticles[$titre_ModifArticles] = (isset($_POST[$titre_ModifArticles]) ? filter_input(INPUT_POST, $titre_ModifArticles, FILTER_SANITIZE_STRING) : "");
$infoModifArticles[$contenu_ModifArticles] = (isset($_POST[$contenu_ModifArticles]) ? filter_input(INPUT_POST, $contenu_ModifArticles, FILTER_SANITIZE_STRING) : "");

$TITRE_ART = "title";
$CONTENU_ART = "content";
$STATUT_ART = "is_active";
$DATE_ART = "creation_date";

$article[$TITRE_ART] = (isset($_POST[$TITRE_ART]) ? filter_var($_POST[$TITRE_ART], FILTER_SANITIZE_STRING) : "");
$article[$CONTENU_ART] = (isset($_POST[$CONTENU_ART]) ? filter_var($_POST[$CONTENU_ART], FILTER_SANITIZE_STRING) : "");
$article[$STATUT_ART] = (isset($_POST[$STATUT_ART]) ? filter_var($_POST[$STATUT_ART], FILTER_VALIDATE_INT) : "");
$article[$DATE_ART] = date('Y-m-d');


/*$CONTENU_COM = "content_com";
$DATE_COM = "creation_date_com";

$comments[$CONTENU_COM] = (isset($_POST[$CONTENU_COM]) ? filter_var($_POST[$CONTENU_COM], FILTER_SANITIZE_STRING) : "");
$comments[$DATE_COM] = date('Y-m-d');*/


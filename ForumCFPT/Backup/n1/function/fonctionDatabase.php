<?php

/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */

/**
 * Insert les utilisateurs dans la base de donnée
 * @param type $info tableau qui contient les données de l'utilisateur
 * @return type
 */
function addUser($info) {
    try {
        $sql = "INSERT INTO `utilisateur`(`pseudo`, `nom`, `prenom`, `courriel`, `motDePasse`, `statut`) VALUES (:pseudo, :nom, :prenom, :courriel, :motDePasse, 1)";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':pseudo', $info["pseudo"]);
        $dbQuery->bindParam(':nom', $info["nom"]);
        $dbQuery->bindParam(':prenom', $info["prenom"]);
        $dbQuery->bindParam(':courriel', $info["courriel"]);
        $dbQuery->bindParam(':motDePasse', $info["motDePasse"]);
        $dbQuery->execute();
        return EDatabase::getInstance()->lastInsertId();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Récupere les informations de l'utilisateur par son pseudo
 * @param type $info tableau qui contient les données de l'utilisateur
 * @return type
 */
function getUser($info) {
    try {
        $sql = "SELECT * FROM `utilisateur` WHERE pseudo = :pseudo";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':pseudo', $info["pseudo"]);
        $dbQuery->execute();
        return $dbQuery->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Insert les articles dans la base de donnée
 * @param type $article tableau qui contient les données de l'article
 * @return type
 */
function addArticle($article) {
    try {
        $sql = "INSERT INTO `articles`(`titre`, `contenu`, `dateArticles`, `statutArticles`, `idUtilisateur`) VALUES (:titre, :contenu, :dateArticles,1,:idUtilisateur)";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':titre', $article["titre"]);
        $dbQuery->bindParam(':contenu', $article["contenu"]);
        $dbQuery->bindParam(':dateArticles', $article["dateArticles"]);
        //$dbQuery->bindParam(':statutArticles', date_format($article["statutArticles"], "Y-d-m"));
        $dbQuery->bindParam(':idUtilisateur', $_SESSION["idUtilisateur"]);
        $dbQuery->execute();
        return EDatabase::getInstance()->lastInsertId();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Récupere les articles de l'utilisateur connecté
 * @param type $idUtilisateur id de l'utilisateur
 * @return type
 */
function getArticlesUser($idUtilisateur) {
    try {
        $sql = "SELECT * FROM `articles` WHERE idUtilisateur = :idUtilisateur";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':idUtilisateur', $idUtilisateur);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Récupere les articles public de tous les utilisateurs
 * @return type
 */
function getArticlesPublic() {
    try {
        $sql = "SELECT * FROM `articles` LEFT JOIN `utilisateur` ON `articles`.`idUtilisateur` = `utilisateur`.`idUtilisateur` WHERE `statutArticles` = 1";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Récupere tous les utilisateurs
 * @return type
 */
function selectAll() {
    try {
        $sql = "SELECT * FROM utilisateur";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Récupere les articles privé de tous les utilisateurs
 * @return type
 */
/*function getArticlesPrive() {
    try {
        $sql = "SELECT * FROM `articles` LEFT JOIN `utilisateur` ON `articles`.`idUtilisateur` = `utilisateur`.`idUtilisateur` WHERE `statutArticles` = 2";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}*/

function DelUser($id) {
    $sql = 'DELETE FROM utilisateur WHERE idPersonne = :idPersonne';
    $dbQuery = EDatabase::getInstance()->prepare($sql);
    $dbQuery->bindParam(':idPersonne', $id);
    $dbQuery->execute();
}

function UpdateUsers($infoModif) {
    $sql = 'UPDATE `utilisateur` SET `prenom`= :prenom ,`nom`= :nom,`email`= :email,`date_naissance`= :date_naissance,`adresse`= :adresse WHERE idPersonne = :idPersonne';
    $dbQuery = EDatabase::getInstance()->prepare($sql);
    $dbQuery->bindParam(':idPersonne', $infoModif["idModif"]);
    $dbQuery->bindParam(':prenom', $infoModif["prenomModif"]);
    $dbQuery->bindParam(':nom', $infoModif["nomModif"]);
    $dbQuery->bindParam(':email', $infoModif["emailModif"]);
    $dbQuery->bindParam(':date_naissance', $infoModif["date_naissanceModif"]);
    $dbQuery->bindParam(':adresse', $infoModif["adresseModif"]);
    $dbQuery->execute();
}
function selectUserById($slt) {
    $sql = "SELECT * FROM utilisateur WHERE idUtilisateur = :idModified";
    $dbQuery = EDatabase::getInstance()->prepare($sql);
    $dbQuery->bindParam(':idModified', $slt["id"]);
    $dbQuery->execute();
    return $dbQuery->fetchAll();
}
<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */

/**
 * Insert les utilisateurs dans la base de donnée
 * @param array $info tableau qui contient les données de l'utilisateur
 * @return int idUtilisateur
 */
function addUser($info) {
    try {
        $sql = "INSERT INTO `users`(`pseudo`, `last_name`, `first_name`, `email`, `password`, `is_admin`, `is_active`) VALUES (:pseudo, :last_name, :first_name, :email, :password,1,1)";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':pseudo', $info["pseudo"]);
        $dbQuery->bindParam(':last_name', $info["last_name"]);
        $dbQuery->bindParam(':first_name', $info["first_name"]);
        $dbQuery->bindParam(':email', $info["email"]);
        $dbQuery->bindParam(':password', $info["password"]);   
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
        $sql = "SELECT * FROM `users` WHERE pseudo = :pseudo";
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
function addArticle($article,$id_topic) {
    try {
        $sql = "INSERT INTO `articles`(`title`, `content`, `creation_date`,`id_topic`,`id_user`,`is_active`) VALUES (:title, :content, :creation_date,:id_topic,:id_user,1)";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':title', $article["title"]);
        $dbQuery->bindParam(':content', $article["content"]);
        $dbQuery->bindParam(':creation_date', $article["creation_date"]);
        $dbQuery->bindParam(':id_topic', $id_topic);
        $dbQuery->bindParam(':id_user', $_SESSION["id_user"]);
        $dbQuery->execute();
        return EDatabase::getInstance()->lastInsertId();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function addCom($info) {

    $sql = "INSERT INTO `comments`(`id_comment`,`content`,`creation_date`,`id_user`,`id_article`) VALUES ('',:content,:creation_date,:id_user,:id_article)";
    $dbQuery = EDatabase::getInstance()->prepare($sql);

    $dbQuery->bindParam(':content', $info["content"]);
    $dbQuery->bindParam(':creation_date', $info["creation_date"]);
    $dbQuery->bindParam(':id_user', $info["id_user"]);
    $dbQuery->bindParam(':id_article', $info["id_article"]);
    $dbQuery->bindParam(':id_user', $_SESSION["id_user"]);
    $dbQuery->execute();
    return EDatabase::getInstance()->lastInsertId();
}

/**
 * Récupere les articles de l'utilisateur connecté
 * @param type $idUtilisateur id de l'utilisateur
 * @return type
 */
function getArticlesUser($idUtilisateur) {
    try {
        $sql = "SELECT * FROM `articles` LEFT JOIN `users` ON `articles`.`id_user` = `users`.`id_user` WHERE `users`.id_user = :id_user AND `articles`.`is_active` = 1";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_user', $idUtilisateur);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function selectArticleById($idArt) {
    try {
        $sql = "SELECT * FROM `articles` LEFT JOIN `users` ON `articles`.`id_user` = `users`.`id_user` WHERE id_article = :id_article AND `articles`.`is_active` = 1";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_article', $idArt);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
/*function selectAllArticleByTopics($idTopic) {
    try {
        $sql = "SELECT * FROM `articles` LEFT JOIN `topics` ON `articles`.`idArticles` = `topics`.`idArticle` WHERE idTopic = 1";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':idArt', $idArt);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}*/

function selectAllComByArticle($idArt) {
    try {
        $sql = "SELECT * FROM `comments` LEFT JOIN `users` ON `comments`.`id_user` = `users`.`id_user` WHERE id_article = :id_article";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_article', $idArt);
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
        $sql = "SELECT * FROM `articles` LEFT JOIN `users` ON `articles`.`id_user` = `users`.`id_user` WHERE `articles`.`is_active` = 1";
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
        $sql = "SELECT * FROM users";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
function DelUser($id) {
    try {
        $sql = 'DELETE FROM users WHERE id_user = :id_user';
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_user', $id);
        $dbQuery->execute();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function UpdateUsers($infoModif) {
    try {
        $sql = 'UPDATE `users` SET `first_name`= :first_name ,`last_name`= :last_name,`email`= :email WHERE id_user = :id_user';
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_user', $infoModif["idModif"]);
        $dbQuery->bindParam(':first_name', $infoModif["prenomModif"]);
        $dbQuery->bindParam(':last_name', $infoModif["nomModif"]);
        $dbQuery->bindParam(':email', $infoModif["emailModif"]);
        $dbQuery->execute();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function selectUserById($slt) {
    try {
        $sql = "SELECT * FROM users WHERE id_user = :idModified";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':idModified', $slt["id"]);
        $dbQuery->execute();
        return $dbQuery->fetchAll();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getModifArticlesUserById($idArticles) {
    try {
        $sql = "SELECT * FROM `articles` WHERE id_article = :id_article";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_article', $idArticles);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function UpdateModifiedArticlesUserById($infoModifArticles) {

    try {
        $sql = 'UPDATE `articles` SET `title`= :title ,`content`= :content WHERE id_article = :id_article';
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_article', $infoModifArticles["idModifArticles"]);
        $dbQuery->bindParam(':title', $infoModifArticles["titreModifArticles"]);
        $dbQuery->bindParam(':content', $infoModifArticles["contenuModifArticles"]);
        $dbQuery->execute();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function CacheArticleById($idArt) {
    try {
        $sql = 'UPDATE `articles` SET`is_active`= "2" WHERE `id_article`= :id_article ';
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':id_article', $idArt);
        $dbQuery->execute();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function CacheAllArticles() {
    try {
        $sql = 'UPDATE `articles` SET`is_active`= "2" WHERE 1';
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->execute();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getTopics() {
    try {
        $sql = "SELECT * FROM `topics`";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->execute();
        return $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

<?php

class EDatabase {

    private static $pdoInstance;

    /**
     * @brief   Class Constructor - Create a new connection to the database if the connection does not exist
     *          It is put in private so that nobody can create a new instance by ' = new KDatabase();'
     */
    private function __construct() {
        
    }

    /**
     * @brief   Like the constructor, we make __clone private so that nobody can clone the instance
     */
    private function __clone() {
        
    }

    /**
     * @brief   Returns the instance of the Database or create an initial connection
     * @return $objInstance;
     */
    public static function getInstance() {
        if (self::$pdoInstance == null) {
            try {

                $dsn = EDB_DBTYPE . ':host=' . EDB_HOST . ';port=' . EDB_PORT . ';dbname=' . EDB_DBNAME;
                self::$pdoInstance = new PDO($dsn, EDB_USER, EDB_PASS, array('charset' => 'utf8'));
                self::$pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Database Error: " . $e->getMessage();
            }
        }
        return self::$pdoInstance;
    }

# end method
    /**
     * @brief   Passes on any static calls to this class onto the singleton PDO instance
     * @param   $chrMethod      The method to call
     * @param   $arrArguments   The method's parameters
     * @return  $mix            The method's return value
     */

    final public static function __callStatic($chrMethod, $arrArguments) {
        $pdo = self::getInstance();
        return call_user_func_array(array($pdo, $chrMethod), $arrArguments);
    }

# end method
}

// Type of database
define('EDB_DBTYPE', "mysql");
// Host address
define('EDB_HOST', "127.0.0.1");
// Port number
define('EDB_PORT', "3306");
// Name of database
define('EDB_DBNAME', "bd_myforum");
// Name of the admin account of the database
define('EDB_USER', "root");
// Admin account password
define('EDB_PASS', "");

function Login($users) {
    $sql = 'SELECT * FROM bd_myforum.users WHERE Username = :Username';
    $dbQuery = EDatabase::getInstance()->prepare($sql);
    $dbQuery->bindParam(':Username', $users);
    $dbQuery->execute();
    return $dbQuery->fetch(PDO::FETCH_ASSOC);
}

function addUser($user) {
    $sql = "INSERT INTO `users`(`nom`,`prenom` ,`Username`, `Password`, `Email`,`statutPrive`) VALUES (:nom,:prenom,:Username,:Password,:Email,1)";
    $dbQuery = EDatabase::getInstance()->prepare($sql);

    $dbQuery->bindParam(':nom', $user["nom"]);
    $dbQuery->bindParam(':prenom', $user["prenom"]);
    $dbQuery->bindParam(':Username', $user["Username"]);
    $dbQuery->bindParam(':Password', $user["Password"]);
    $dbQuery->bindParam(':Email', $user["Email"]);

    $dbQuery->execute();
    return EDatabase::getInstance()->lastInsertId();
}

function addComm($info) {
    $sql = "INSERT INTO `commentaires`(`idArticle`,`commentaire`,`date_commentaire`,`idUser`) VALUES (:idArticle,:commentaire,:date_commentaire,NULL)";
    $dbQuery = EDatabase::getInstance()->prepare($sql);


    $dbQuery->bindParam(':commentaire', $info["commentaire"]);
    $dbQuery->bindParam(':date_commentaire', $info["date_commentaire"]);
    $dbQuery->bindParam(':idArticle', $info["idArticle"]);
    //$dbQuery->bindParam(':statut', $info["statut"]);
    $dbQuery->execute();
    return EDatabase::getInstance()->lastInsertId();
}

function addArtPublique($info) {
    $sql = "INSERT INTO `articles`(`titre`, `contenu`, `date_creation`,`statutPrive`) VALUES (:titre,:contenu,:date_creation,0)";
    $dbQuery = EDatabase::getInstance()->prepare($sql);


    $dbQuery->bindParam(':titre', $info["titre"]);
    $dbQuery->bindParam(':contenu', $info["contenu"]);
    $dbQuery->bindParam(':date_creation', $info["date_creation"]);
    //$dbQuery->bindParam(':statut', $info["statutPrive]");
    $dbQuery->execute();
    return EDatabase::getInstance()->lastInsertId();
}

/*
  function ModifArt($info) {
  $sql = "";
  $dbQuery = EDatabase::getInstance()->prepare($sql);
  $dbQuery->bindParam(':titre', $info["titre"]);
  $dbQuery->bindParam(':contenu', $info["contenu"]);
  $dbQuery->bindParam(':date_creation', $info["date_creation"]);
  $dbQuery->execute();
  return $dbQuery->fetch(PDO::FETCH_ASSOC);
  } */

function SupprCommByArt($info) {
        $sql = "DELETE FROM `commentaires` WHERE `idArticle` = idArticle";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':idArticle', $info["idArticle"]);
        $dbQuery->execute();
        return $dbQuery->fetch(PDO::FETCH_ASSOC);
}

function SupprArt($infos) {
        
        $sql = "DELETE FROM `articles` WHERE `idArticle` = :idArticle";
        $dbQuery = EDatabase::getInstance()->prepare($sql);
        $dbQuery->bindParam(':idArticle', $infos    ["idArticle"]);
        $dbQuery->execute();
        return $dbQuery->fetch(PDO::FETCH_ASSOC);
}

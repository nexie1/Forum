<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 3.0.0
 * Date         : 10.10.2018
 * Copyright    : Fernandes Marco
 */
require_once 'constantConnexion.php';

class EDatabase {
    private static $pdoInstance;
    /**
     * @brief   Class Constructor - Create a new connection to the database if the connection does not exist
     *          It is put in private so that nobody can create a new instance by ' = new KDatabase();'
     */
    private function __construct() {}
    /**
     * @brief   Like the constructor, we make __clone private so that nobody can clone the instance
     */
    private function __clone() {}
    /**
     * @brief   Returns the instance of the Database or create an initial connection
     * @return $objInstance;
     */
    public static function getInstance() {
        if(self::$pdoInstance == null){
            try{
                     
                $dsn = EDB_DBTYPE.':host='.EDB_HOST.';port='.EDB_PORT.';dbname='.EDB_DBNAME.';charset=utf8';
                self::$pdoInstance = new PDO($dsn, EDB_USER, EDB_PASS);
                self::$pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException  $e ){
                echo "Database Error: ".$e->getMessage();
            }
        }
        return self::$pdoInstance;
    } # end method
    /**
     * @brief   Passes on any static calls to this class onto the singleton PDO instance
     * @param   $chrMethod      The method to call
     * @param   $arrArguments   The method's parameters
     * @return  $mix            The method's return value
     */
    final public static function __callStatic( $chrMethod, $arrArguments ) {
        $pdo = self::getInstance();
        return call_user_func_array(array($pdo, $chrMethod), $arrArguments);
    } # end method
}
<?php
//************************************************
//20SP-SWDV-210-001: Intro Server Side Programming 
//  Author: Kait Low
//  Date: ?
//
//  20SP-SWDV-210-001: Intro Server Side Programming 
//  LAST MODIFIED: 2/12/2020
//  
//  Filename: database.php
//  
//  Stores database information.
//************************************************
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=rstrans';
    private static $username = 'root';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
             //$error_message = "We are experiencing technical difficulties. </br>Please try again later.";
             include('./database_error.php');
             exit();
            }
        }
        return self::$db;
    }
}
?>


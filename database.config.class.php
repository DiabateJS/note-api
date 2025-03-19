<?php

class DatabaseConfig {
    public static $HOST = "localhost";
    //public static $HOST = "185.98.131.158";
    //public static $DB   = "nafresh";
    public static $DB   = "djste2298403";
    public static $USER = "root";
    //public static $USER = "djste2298403";
    public static $PASSWORD = "";
    //public static $PASSWORD = "9d5rufwh6q";
    public static $PORT = "3306";
    public static $CHARSET = 'utf8mb4';

    public static function getConStr(){
        return "mysql:host=".self::$HOST.";dbname=".self::$DB.";charset=".self::$CHARSET.";port=".self::$PORT;
    }

}
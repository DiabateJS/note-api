<?php

class DatabaseConfig {
    public static $HOST = "localhost";
    public static $DB   = "note_bd";
    public static $USER = "root";
    public static $PASSWORD = "";
    public static $PORT = "3306";
    public static $CHARSET = 'utf8mb4';

    public static function getConStr(){
        return "mysql:host=".self::$HOST.";dbname=".self::$DB.";charset=".self::$CHARSET.";port=".self::$PORT;
    }

}
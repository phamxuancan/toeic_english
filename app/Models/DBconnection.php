<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/16/2015
 * Time: 3:16 PM
 */
    class DBconnection {
        private static $db = null;
        public static function connection(){
            self::$db = DB::connection("mysql");
            return self::$db;
        }
    }
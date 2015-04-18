<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/16/2015
 * Time: 3:16 PM
 */
namespace App\libraries;
    use Illuminate\Support\Facades\DB;

    class DBconnect {
        private static $db = null;
        public static function connection(){
            self::$db = DB::connection("mysql");
            return self::$db;
        }
    }
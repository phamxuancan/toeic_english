<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/16/2015
 * Time: 3:18 PM
 */
namespace App\Models;
use App\libraries\DBconnect;
use App\Models\ModelBase;
    class User extends ModelBase{
        private static $instance = null;
        public function __construct(){
            parent::__construct('user');
        }
        public static function  getInstance() {
            if(self::$instance == null) {
                self::$instance = new User();
            }
            return self::$instance;
        }
        public function getTopPointUser(){
            $sql = "SELECT * FROM point INNER JOIN user ON point.user_id = user.id ORDER BY point DESC LIMIT 10";
            $data = DBconnect::connection()->select($sql);
            return $data;
        }
        public function getUserTestInday(){
            $date = date('Y-m-d');
            $sql = "SELECT * FROM point INNER JOIN user ON point.user_id = user.id WHERE point.updated_at LIKE '%$date%' ";
            $data = DBconnect::connection()->select($sql);
            return $data;
        }
        public function getUserFromPoint($to_point,$from_point){
            $sql = "SELECT * FROM point INNER JOIN user ON point.user_id = user.id WHERE point.point <= $to_point AND point.point >= $from_point ";
            $data = DBconnect::connection()->select($sql);
            return $data;
        }

    }
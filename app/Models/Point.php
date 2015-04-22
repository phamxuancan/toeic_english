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
    class Point extends ModelBase{
        private static $instance = null;
        public function __construct(){
            parent::__construct('point');
        }
        public static function  getInstance() {
            if(self::$instance == null) {
                self::$instance = new Point();
            }
            return self::$instance;
        }

        public function getMaxPoint(){
            $sql  = "SELECT * FROM $this->table_name ORDER BY id DESC";
            $data = DBconnect::connection()->select($sql);
            return $data;
        }
    }
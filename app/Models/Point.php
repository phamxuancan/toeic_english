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

            $sql  = "SELECT user_id FROM $this->table_name GROUP BY user_id";
            $user_point = DBconnect::connection()->select($sql);

            $result = array();
            foreach($user_point as $user_id){
                $sql  = "SELECT $this->table_name.*,max(point) as point FROM $this->table_name WHERE user_id = $user_id->user_id GROUP BY user_id DESC";
                $data = DBconnect::connection()->select($sql);
                array_push($result,$data[0]);
            }

            return $result;
        }
    }
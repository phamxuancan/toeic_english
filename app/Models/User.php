<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/16/2015
 * Time: 3:18 PM
 */
namespace App\Models;
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
    }
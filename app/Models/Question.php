<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/19/2015
 * Time: 9:55 PM
 */
namespace App\Models;
    use App\Models\ModelBase;
    class Question extends ModelBase{
        private static $instance = null;
        public function __construct(){
            parent::__construct('question');
        }
        public static function  getInstance() {
            if(self::$instance == null) {
                self::$instance = new Question();
            }
            return self::$instance;
        }
    }
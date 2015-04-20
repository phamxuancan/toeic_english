<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/19/2015
 * Time: 10:06 PM
 */
namespace App\Models;
use App\Models\ModelBase;
class File extends ModelBase{
    private static $instance = null;
    public function __construct(){
        parent::__construct('file');
    }
    public static function  getInstance() {
        if(self::$instance == null) {
            self::$instance = new File();
        }
        return self::$instance;
    }
    public static function uploadFile($file,$folder){
        $extension  = $file->getClientOriginalExtension();
        $filename   = time() . "_" . rand(0,10000000). "." . $extension;
        $file->move($folder,$filename);
        return $filename;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/16/2015
 * Time: 3:19 PM
 */
    namespace App\Models;
    use App\libraries\DBconnect;
    use Illuminate\Support\Facades\DB;

    class ModelBase{
        protected $table_name;
        public function __construct($table){
            $this->table_name = $table;
        }
        public function insert($input){
            foreach($input as $key =>$value){
                $fieldDB  []= $key;
                $valueData[]= $value;
            }
            $infields   = implode(",",$fieldDB);
            $inValues   = implode("','",$valueData);
            $sql        = "INSERT INTO $this->table_name ($infields) VALUES ('".$inValues."')";
            DBconnect::connection()->insert($sql);
            return DB::getPdo()->lastInsertId();
        }
        public function getObjectsInArrayIds($field,$inArrayIds){
            $sql    = "SELECT * FROM $this->table_name WHERE $field IN ('".$inArrayIds."') ";
            $data   = DBconnect::connection()->select($sql);
            return $data;
        }
        public function getAllObjectInTable(){
            $sql  = "SELECT * FROM $this->table_name ORDER BY ID ASC";
            $data = DBconnect::connection()->select($sql);
            return $data;
        }
        public function getObjectsWheres($values){
            if(count($values) > 0){
                foreach($values as $key => $value){
                    $array[] = $key.'='."'$value'";
                }
                $condition = implode(' AND ',$array);
                $sql = "SELECT * FROM $this->table_name WHERE $condition ORDER BY id DESC";
                $data = DBconnect::connection()->select($sql);
                return $data;
            }
        }
        public function update($values,$wheres){
            foreach($values as $key => $value){
                $array[] = $key.'='."'$value'";
            }
            $datavalue = implode(',',$array);
            foreach($wheres as $keyw => $where){
                $pos[] = $keyw.'='."'$where'";
            }
            $datawheres = implode(' AND ', $pos);
            $sql = "UPDATE $this->table_name SET $datavalue WHERE $datawheres";
            $data = DBconnect::connection()->select($sql);
            return $data;
        }
        public function delete($values=array()){
            foreach($values as $key => $value){
                $array[] = $key.'='."'$value'";
            }
            $datavalue = implode(' AND ',$array);
            $sql = "DELETE FROM $this->table_name WHERE $datavalue";
            return DBconnect::connection()->delete($sql);
        }
    }
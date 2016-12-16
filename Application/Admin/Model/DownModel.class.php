<?php
namespace Admin\Model;
use Think\Model;
class DownModel extends Model {
    function __construct($name, $tablePrefix, $connection)
    {
        parent::__construct($name, $tablePrefix, $connection);
    }

    /**
     * 添加化合物
     */
    function addCompand($data,$type = 1){
        if(empty($data)){return false;}
        if($type == 1){
            $table  = 'compound';
        }else if($type == 2){
            $table  = 'compound_reaction';
        }else if($type == 3){
            $table  = 'constant';
        }else{
            return falae;
        }
        $res = M($table)->addAll($data);
        //echo M($table)->getLastSql();die;
        return $res;
    }

    /**
     * 添加化合物
     */
    function deleteCompand($type = 1){
        if($type == 1){
            $table  = C('DB_PREFIX').'compound';
        }else if($type == 2){
            $table  = C('DB_PREFIX').'compound_reaction';
        }else if($type == 3){
            $table  = C('DB_PREFIX').'constant';
        }else{
            return falae;
        }
        $is = M()->table($table)->find();
        if(empty($is)){
            return true;
        }
        $res = M()->table($table)->where('1')->delete();
        return $res;
    }


}

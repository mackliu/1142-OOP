<?php

/***
 * 建立一個簡單的資料庫連接類別，使用 PDO 來進行資料庫操作
 * 包括連接資料庫、執行查詢、新增、更新、刪除等功能
 * @author Your Name
 * @version 1.0
 * @date 2025-12-12
 * 
 */

Class DB{
    private $dsn="mysql:host=localhost;dbname=db01;charset=utf8";
    private $table;
    private $pdo;
                                
    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    public function all(...$arg){

        $sql="select * from `$this->table` ";
        
            if(isset($arg[0])){
                if(is_array($arg[0])){
                    //多條件
                    $tmp=[];
                    foreach($arg[0] as $key => $value){
                        //$tmp[]=sprintf("`%s`='%s'",$key,$value);
                        $tmp[]="`$key`='$value'";
                    }
                    $sql .= " where " . implode(" && ",$tmp);
                }else{
                    //單條件
                    $sql .=$arg[0];
                }
            }

            if(isset($arg[1])){
                $sql .=$arg[1];
            }
        // echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($id){
        $sql="select * from `$this->table` ";
                if(is_array($id)){
                    //多條件
                    $tmp=[];
                    foreach($id as $key => $value){
                        //$tmp[]=sprintf("`%s`='%s'",$key,$value);
                        $tmp[]="`$key`='$value'";
                    }
                    $sql .= " where " . implode(" && ",$tmp);
                }else{
                    //單條件
                    $sql .= " where `id`='$id' ";
                }
          
        // echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function update($array){
        $sql="UPDATE $this->table ";
        $tmp=[];
        foreach($array as $key => $value){
            //$tmp[]=sprintf("`%s`='%s'",$key,$value);
            if($key!="id"){
                $tmp[]="`$key`='$value'";
            }
        }
        $sql .=" SET ".join(", ",$tmp);
        $sql .=" WHERE id='{$array['id']}'";
        //$sql .=" WHERE id='$id'";
        
        echo $sql;
        return $this->pdo->exec($sql);
    }

    function insert($array){

        $sql="INSERT INTO `{$this->table}` ";
        $keys=array_keys($array);
        $sql .="(`". join("`,`",$keys). "`)";
        $sql .=" VALUES ('". join("','",$array). "')";
        echo $sql;
        //echo "<hr>";
        return $this->pdo->exec($sql);

    }


}


$daily=new DB('daily_account');
$category=new DB('category');
//echo "<pre>";
//print_r($daily->all(['store'=>'7-11'], ' order by payment asc'));
//echo "</pre>";

//echo "<pre>";
//print_r($daily->find(3));
//echo "</pre>";
//echo "<pre>";
//print_r($category->find(3));
//echo "</pre>";
//$row=$category->find(8);
//echo "<pre>";
//print_r($row);
//echo "</pre>";
//$row['name']='大學';
//echo "<pre>";
//print_r($row);
//echo "</pre>";
//$category->update($row);

$category->insert(['name'=>'電影']);
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
        if(!empty($arg)){

        }

        echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    }

}


$category=new DB('category');

echo "<pre>";
print_r($category->all());
echo "</pre>";
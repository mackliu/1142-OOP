<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>物件導向</title>
</head>
<body>
<?php

Class Animal{
    protected $type='animal';
    protected $name='John';
    private $hair_color="brown";

    public function __construct(){
        //建構式內容
        /* $slogan="既然你誠心誠意的發問了，我就大發慈悲的回答你吧！";
        echo $slogan;
        echo "HI"; */
        
    }

    public function getName(){
        //受保護屬性內容
        return $this->name;
    }

    public function run(){
        //公開行為內容
        echo "I am running";
        $this->speed();
    }

    private function speed(){
        //私有行為內容
        echo "I am fast";
    }

}


Class Cat extends Animal{
    protected $type='貓';
    public function showType(){
        return $this->type;
    }

    public function sleep(){
        return "I am sleeping";
    }
}


//instance 實例化
$a=new Animal();
echo $a->run();
echo "<br>";
echo $a->getName();
/* echo $a->speed(); */
//$a->type='dog';
//echo $a->hair_color;

$cat=new Cat();
echo "<br>";
echo $cat->showType();
echo $cat->sleep();
?>
</body>
</html>
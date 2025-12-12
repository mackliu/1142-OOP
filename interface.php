<?php

/**
 * PHP Interface 概念說明 - 以動物為例
 * 
 * Interface 是一個契約，定義了類別必須實現哪些方法。
 * 就像所有動物都有共同的行為（叫聲、移動方式等）
 */

// 定義一個 Interface - 動物的行為契約
interface Animal {
    /**
     * 動物發出叫聲的方法
     */
    public function makeSound();
    
    /**
     * 動物移動的方法
     */
    public function move();
    
    /**
     * 動物進食的方法
     */
    public function eat($food);
}

// 定義另一個 Interface - 寵物的特殊行為
interface Pet {
    /**
     * 寵物被主人撫摸時的反應
     */
    public function pet();
    
    /**
     * 寵物的名字
     */
    public function getName();
}


// ===================== 實現 Interface 的類別 =====================

/**
 * 狗類別 - 實現 Animal 和 Pet 介面
 */
class Dog implements Animal, Pet {
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    // 實現 Animal 介面的方法
    public function makeSound() {
        return "汪汪汪！";
    }
    
    public function move() {
        return "用四隻腳跑步";
    }
    
    public function eat($food) {
        return $this->name . " 正在吃 " . $food;
    }
    
    // 實現 Pet 介面的方法
    public function pet() {
        return $this->name . " 搖著尾巴，發出滿足的聲音";
    }
    
    public function getName() {
        return $this->name;
    }
}


/**
 * 貓類別 - 實現 Animal 和 Pet 介面
 */
class Cat implements Animal, Pet {
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    // 實現 Animal 介面的方法
    public function makeSound() {
        return "喵喵喵～";
    }
    
    public function move() {
        return "優雅地走動，尾巴高高舉起";
    }
    
    public function eat($food) {
        return $this->name . " 正在吃 " . $food;
    }
    
    // 實現 Pet 介面的方法
    public function pet() {
        return $this->name . " 發出呼嚕呼嚕聲";
    }
    
    public function getName() {
        return $this->name;
    }
}


/**
 * 鳥類別 - 只實現 Animal 介面（不是寵物）
 */
class Bird implements Animal {
    private $species;
    
    public function __construct($species) {
        $this->species = $species;
    }
    
    // 實現 Animal 介面的方法
    public function makeSound() {
        return "嘰嘰喳喳...";
    }
    
    public function move() {
        return "在空中飛翔";
    }
    
    public function eat($food) {
        return $this->species . " 正在啄食 " . $food;
    }
}


// ===================== 使用示例 =====================

echo "======== PHP Interface 概念展示 ========\n\n";

// 建立不同的動物物件
$dog = new Dog("小黑");
$cat = new Cat("咪咪");
$bird = new Bird("麻雀");

echo "--- 狗的行為 ---<br>\n";
echo "名字: " . $dog->getName() . "<br>\n";
echo "叫聲: " . $dog->makeSound() . "<br>\n";
echo "移動: " . $dog->move() . "<br>\n";
echo "進食: " . $dog->eat("骨頭") . "<br>\n";
echo "被撫摸: " . $dog->pet() . "<br>\n<br>\n";

echo "--- 貓的行為 ---\n";
echo "名字: " . $cat->getName() . "<br>\n";
echo "叫聲: " . $cat->makeSound() . "<br>\n";
echo "移動: " . $cat->move() . "<br>\n";
echo "進食: " . $cat->eat("魚") . "<br>\n";
echo "被撫摸: " . $cat->pet() . "<br>\n<br>\n";

echo "--- 鳥的行為 ---<br>\n";
echo "叫聲: " . $bird->makeSound() . "<br>\n";
echo "移動: " . $bird->move() . "<br>\n";
echo "進食: " . $bird->eat("種子") . "<br>\n<br>\n";


// ===================== Interface 的好處演示 =====================

echo "--- 使用 Interface 型別提示的函數 ---<br>\n";

/**
 * 這個函數接受任何實現 Animal 介面的物件
 * 因此可以接受狗、貓、鳥，或任何其他實現 Animal 的類別
 */
function displayAnimalInfo(Animal $animal) {
    echo "動物叫聲: " . $animal->makeSound() . "<br>\n";
    echo "移動方式: " . $animal->move() . "<br>\n";
}

displayAnimalInfo($dog);
echo "<br>\n";
displayAnimalInfo($cat);
echo "<br>\n";
displayAnimalInfo($bird);
echo "<br>\n";


/**
 * 這個函數只接受實現 Pet 介面的物件
 * 所以只能接受狗和貓，不能接受鳥
 */
function petTheAnimal(Pet $pet) {
    echo "寵物名字: " . $pet->getName() . "<br>\n";
    echo "撫摸反應: " . $pet->pet() . "<br>\n";
}

echo "--- 撫摸寵物 ---<br>\n";
petTheAnimal($dog);
echo "<br>\n";
petTheAnimal($cat);
echo "<br>\n";

// 下面這行會出錯，因為 Bird 沒有實現 Pet 介面
// petTheAnimal($bird);  // Fatal error!


// ===================== 多型性展示 =====================

echo "--- 多型性展示 ---<br>\n";

$animals = [$dog, $cat, $bird];

echo "所有動物的聲音:<br>\n";
foreach ($animals as $animal) {
    echo "- " . $animal->makeSound() . "<br>\n";
}

?>

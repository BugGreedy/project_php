<?php
class Box {
  public $myItem;

  public function __construct(){
    $this -> myItem = "新しいアイテム";
  }

  public function open(){
    echo "宝箱を開いた。". $this -> myItem. "を手に入れた。\n";
  }
}

class JewelryBox extends Box{  //継承の記述は class 小クラス名 extends 親クラス名{}
  public function look(){
    echo "宝箱はキラキラと輝いている.\n";
  }
}

$chest = new Box();
$chest -> open();
echo "\n";
$jewelryChest = new JewelryBox();
$jewelryChest -> look();
$jewelryChest -> open();  //Boxクラスのメソッドやメンバ変数を引き継いで利用できる。
?>
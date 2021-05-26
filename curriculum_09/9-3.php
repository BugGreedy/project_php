<?php
class Box {
  public $myItem;

  public function __construct($item){
    $this -> myItem = $item;
  }

  public function open(){
    echo "宝箱を開いた。". $this -> myItem. "を手に入れた。\n";
  }
}

class MagicBox extends Box{
  public function look(){
  echo "宝箱は妖しく輝いている.\n";
  }

  public function open(){  //親クラスで定義したメソッドと同名のメソッドを編集することで再定義できる。
    echo "宝箱を開いた。". $this -> myItem."が襲ってきた!\n";
  }
}


$chest = new Box("太刀");
$chest -> open();
echo "\n";
$magicBox = new MagicBox("貪欲者");
$magicBox -> look();
$magicBox -> open();
?>
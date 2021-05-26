<?php
class Player {
  public $myName;

  public function __construct($name){
    $this -> myName = $name;
  }

  public function attack($enemy){
    echo $this ->myName."は".$enemy."を攻撃した。\n"; 
  }
}

class Wizard extends Player{
  public function __construct(){
    //このように記述する事で親のコンストラクトを呼び出す事ができる。
    //今回ではオブジェクトにもともとの引数を設定している。
    parent::__construct("魔法使い");
  }
  public function attack($enemy){
    $this -> spell();
    echo $this->myName."は".$enemy."に炎を放った。\n";
  }

  private function spell(){
    echo "dhinn!!\n";
  }

}

echo "=== パーティーでスライムと戦う ===\n";
$hero = new Player("勇者");
// $hero -> attack("スライム");
$warrior = new Player("戦士");
$wizard = new Wizard ();  //引数をここでは指定していない。
$party = [$hero,$warrior,$wizard];
foreach($party as $member){
  $member -> attack("スライム");
}
// $wizard -> spell();
?>
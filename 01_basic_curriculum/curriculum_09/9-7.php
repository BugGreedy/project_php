<?php
class Player {
  public $myName;
  private static $characterCount = 0; //追記箇所

  public function __construct($name){
    $this -> myName = $name;
    Player::$characterCount++;   //static変数を呼ぶときは::を記述する。ここは"Player"でなく"self"でも同様の出力が行われる。
    echo Player::$characterCount."番目のプレイヤー、".$this->myName."が登場した。\n";
  }

  public static function characterCount(){   //これをクラスメソッドという。
    return self::$characterCount;
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
echo Player::characterCount()."人でスライムを攻撃した。\n";  //クラスメソッドの呼び出しの記述
?>
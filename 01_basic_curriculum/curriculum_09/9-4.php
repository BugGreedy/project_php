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

echo "=== パーティーでスライムと戦う ===\n";
$hero = new Player("勇者");
// $hero -> attack("スライム");
$warrior = new Player("戦士");

$party = [$hero,$warrior];
foreach($party as $member){
  $member -> attack("スライム");
}
?>
<?php

class Enemy
{
  public $myName;
  public function __construct($name)
  {
    $this->myName = $name;
  }
  public function attack($player)
  {
    echo $this->myName . "は" . $player . "を攻撃した。\n";
  }
}

$enemies[] = new Enemy("ディアボロ");
$enemies[] = new Enemy("メデューサ");
$enemies[] = new Enemy("かまいたち");

echo "あなたのお名前は？\n";
$player = trim(fgets(STDIN));
foreach ($enemies as $enemy) {
  $enemy->attack($player);
}
?>

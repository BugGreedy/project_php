<?php

class Enemy{
  public $myName;
  public function __construct($name){
    $this -> myName = $name;
  }
  public function attack(){
    echo $this->myName. "は主人公を攻撃した。\n";
  }
}

$enemies[] = new Enemy("ディアボロ");
$enemies[] = new Enemy("メデューサ");
$enemies[] = new Enemy("かまいたち");

foreach($enemies as $enemy){
  $enemy -> attack();
}
?>
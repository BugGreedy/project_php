<?php
class Player{
  public $myName;
  public function __construct($name){
    $this->myName = $name;
  }
  public function walk(){
    echo $this->myName."は荒野を歩いていた。\n";
  }
}

$player = new Player("ハンター");
$player-> walk();
echo $player->myName;
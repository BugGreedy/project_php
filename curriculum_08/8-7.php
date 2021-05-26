<?php
class Player{
  public $myName;
  public function __construct($name){
    $this->myName = $name;
  }
  private function walk(){
    echo $this->myName."は荒野を歩いていた。\n";
  }
  public function output(){
    echo $this->walk();
  }
}

$player = new Player("ハンター");
$player-> output();
echo $player->myName;
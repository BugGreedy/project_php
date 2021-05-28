<?php
class PLayer{
  public $myName; //これがメンバ変数
  public function __construct($name){
    $this -> myName = $name;
  }
  public function walk(){
    echo $this -> myName."は荒野を歩いていた。"."\n";
  }
}

$player1 = new Player("戦士");  //※
$player1 -> walk();

$player2 = new Player("パイソン"); //※
$player2 -> walk();

$player1 -> walk();
?>
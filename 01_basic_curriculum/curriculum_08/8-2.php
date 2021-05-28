<?php
class PLayer{                   //PHPではクラス名を大文字にする。
  public function walk(){
    $message = "勇者は荒野を歩いていた。";
    echo $message;
  }
}

$player1 = new Player();  //オブジェクトを生成
$player1 -> walk();       //この矢印をアロー演算子という。
?>
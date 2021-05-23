<?php
$a = 10;                     //ブロックの外で定義した変数はプログラムのどこでも使用できる。(グローバル変数)
$b = 20;

function sum($x,$y) {
  $a = 3;                     //ブロックの中で定義した変数は{}(ブロック)の中でしか有効でない(ローカル変数)
  )
  echo "hello ".$a."\n";
  return $x + $y;
}
$num = sum($a,$b);
echo $num."\n";

echo "hello " . $a . "\n";
?>


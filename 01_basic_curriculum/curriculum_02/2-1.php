<?php
// if文による条件分岐
// $n = 1;
// if ($n == 1){
//   echo "好き";
// }
$n = rand(1,100);
  if($n % 2 == 0){ // ＄nが奇数のとき
  // 条件が成り立つとき
  echo $n.'は偶数';
  }else{
    echo $n.'は奇数';
  }
?>
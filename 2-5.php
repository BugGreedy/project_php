<?php
$hit = rand(1,10);
echo $hit;
if($hit < 6){
  echo 'スライムに'.$hit.'のダメージを与えた!';
}else{
  echo 'クリティカルヒット!スライムに100のダメージを与えた！';
}
?>
<?php
$enemies = ["アーマーガエル","スターマン","ゲップー"];
foreach($enemies as $enemy){
  // echo "主人公は".$enemy."にダメージを与えた!\n";
  attack($enemy);
}
function attack($target){
  echo "主人公は".$target."を攻撃した。\n";
  $damage = rand(1,20);
  if($damage < 15){
    echo $target."に".$damage."のダメージを与えた!\n";
  }else{
    $critical =$damage * 10;
    echo "クリティカルヒット! ".$target."に".$critical."のダメージを与えた!\n";
  }
  echo "\n";
}
?>


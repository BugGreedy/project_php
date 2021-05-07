<?php
$n = rand(1,3);
if($n == 1){
  echo $n.'好き';
}elseif($n == 2) {
  echo $n.'どちらとも言えない。';
}else {
  echo $n.'嫌い';
}
?>
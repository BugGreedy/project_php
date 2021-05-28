<?php
$hour = rand(0,24);
if($hour < 12){
  echo $hour."\n午前";
}elseif($hour == 12){
  echo $hour."\n正午";
}elseif($hour > 12) {
  echo $hour."\n午後";
}
?>
<?php
for($year = 1989; $year <= 2030; $year++){
  if($year <= 2018){
  $heisei = $year - 1988;
  echo '西暦'.$year.'年は平成'.$heisei."年です。\n";
  }else{
  $reiwa = $year - 2018;
  echo '西暦'.$year.'年は令和'.$reiwa."年です。\n";
  }
}
 ?>
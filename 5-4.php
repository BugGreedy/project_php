<?php
$item = array(
  "ツヴァイ" => 20,
  "蛇人の剣" => 30,
  "グレソ" => 50,
);
print_r($item);
asort($item);
print_r($item);
arsort($item);
print_r($item);
ksort($item);
print_r($item);
krsort($item);
print_r($item);
?>
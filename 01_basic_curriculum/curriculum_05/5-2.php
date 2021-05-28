<?php
$item = array(
  "ロングソード" => 2,
  "鉄の盾" => 1,
  
);
$item["クリスタル"] = 6;
print_r($item);
$item["クリスタル"] = 3;
print_r($item);
unset($item["鉄の盾"]);
print_r($item);
?>
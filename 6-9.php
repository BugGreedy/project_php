<?php
$map_row = array_fill(0, 20, "森");
$landMap = array_fill(0, 10, $map_row);
//個別に場所を指定する
$landMap[0][0] = "城";
$landMap[0][19] = "街";
$landMap[9][19] = "村";

foreach($landMap as $row){
  foreach($row as $column){
    echo $column;
  }
  echo "\n";
}
?>
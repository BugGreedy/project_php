<?php
$map_row = array_fill(0, 20, "森");
$landMap = array_fill(0, 10, $map_row);
//個別に場所を指定する
$landMap[0][0] = "城";
$landMap[0][19] = "街";
$landMap[9][19] = "村";

foreach ($landMap as $i => $row) {
  echo $i . ":";
  foreach ($row as $j => $column) {
    if (($i % 2 == 0 || $j % 3 == 0) && $column == "森") {  //横行(row)が2で割り切れるか縦列(column)が3で割り切れる時
      $landMap[$i][$j] = "＋";
    }
    echo $landMap[$i][$j];
  }
  echo "\n";
}

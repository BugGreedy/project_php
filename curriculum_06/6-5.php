<?php
$teams = [
  ["ヒトカゲ","リザード", "リザードン"],
  ["ゼニガメ","カメール","カメックス"],
  ["フシギダネ","フシギソウ","フシギバナ"],
];
foreach($teams as $team){
  foreach($team as $monster){
    echo $monster.' ';
  }
  echo "\n";
  echo "---\n";
}
?>
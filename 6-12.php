<?php
//画像URL用配列
$playerImages =
    array(
        "https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Empty.png",
        "https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Dragon.png",
        "https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Crystal.png",
        "https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Hero.png",
        "https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Heroine.png");

//画像配置用の記述
$playersPositions =
    array(
      array(1,1,1,1),
      array(0,0,0,0),
      array(1,2,3,4)
    );

echo "<table>\n"; 
foreach($playersPositions as $line){
  echo "<tr>\n";
  foreach($line as $player){
    echo "<td><img src=".$playerImages[$player]."></td>\n";
  }
  echo "</tr>\n";
}
echo "</table>";

?>
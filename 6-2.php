<?php
$teamB = ["ヒトカゲ","リザード","リザードン"];
$teamC = ["ゼニガメ","カメール","カメックス"];
$teamD = ["フシギダネ","フシギソウ","フシギバナ"];
$teams = [$teamB,$teamC,$teamD];
print_r($teams);    // 配列の中の配列を出力(この場合だと3つの配列が出力される)
echo $teams[0][0].",";  // 配列の中の配列を個別に出力
echo $teams[1][1].',';
echo $teams[2][2] . "\n";
?>

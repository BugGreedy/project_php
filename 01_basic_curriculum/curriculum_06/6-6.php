<?php
$teams = array(
  array("ヒトカゲ","リザード", "リザードン"),
  array("ゼニガメ","カメール","カメックス"),
  array("フシギダネ","フシギソウ","フシギバナ")
);

foreach($teams as $row){      //外側のforeachで各配列を取り出し
  foreach($row as $column){   //中側のforeachで各配列の値を取り出す
    echo $column.' ';         //取り出した値を間にスペースを入れて出力
}
echo "\n";                    //各配列ごとに改行
}
echo "---\n";                 //最後に----

?>
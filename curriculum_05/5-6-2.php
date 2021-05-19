<!--2000円以下のアイテムを高い順に表示-->
<!-- 
入力 
ショートソード,1200
ロングソード,2000
ブレードソード,2500
バスタードソード,3000
木の盾,700
銅の盾,1500
鉄の盾,2200
-->
<!-- 期待する値
Array
(
[ロングソード] => 2000
[銅の盾] => 1500
[ショートソード] => 1200
[木の盾] => 700
) -->
<?php
// 標準入力から値をループで取得
while ($input = trim(fgets(STDIN))) {
  // カンマで分割
  $key_value = explode(",", $input);
  $key = $key_value[0];
  $value = $key_value[1];
  // 連想配列として$itemに代入
  $item[$key] = $value;
}
// ここから下に記述
// 2000円以下の商品を価格が高い方から順に並べ替えて
// print_rで出力するプログラムを書いてみましょう。
foreach ($item as $name => $price) {
  if ($price <= 2000) {
    $hyouji[$name] = $price;  //連想配列においても通常の配列のようにkeyを代入する事ができる。
  }
}
arsort($hyouji);
print_r($hyouji);
?>
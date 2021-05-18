<!-- "職業/説明"みたいな入力を連想配列に代入する記述 -->
<?php
// 標準入力を３行取得
for ($i = 0; $i < 3; $i++) {
  $input = trim(fgets(STDIN));
  // 入力値を/で分割
  $key_value = explode("/", $input);   //$key_valueという通常の配列に代入している。
  // 手前の要素をkeyとして、後の要素をvalueとして連想配列に代入
  $key = $key_value[0];
  $value = $key_value[1];
  $team[$key] = $value;
}
print_r($team);
?>
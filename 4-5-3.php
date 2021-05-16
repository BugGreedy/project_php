<?php
// 標準入力から1行データを取得
$input = trim(fgets(STDIN));
// $inputの値が空で無ければループする
while ($input) {
  // 配列に$inputの値を追加
  if ($input == "勇者") {
    $array[] = $input;
  }
  // 標準入力から1行データを取得
  $input = trim(fgets(STDIN));
}
print_r($array);
echo count($array);

// 入力

// 勇者
//
// 戦士

// ポイント1
// ifの条件で等しいは"=="を使用

// ポイント2
// ifの閉じる位置
<?php
// 標準入力から1行取得し値があればループ
while ($input = fgets(STDIN)) {
    // 配列に$inputの値を追加
    $input = trim($input);
    if ($input == "勇者") {
        $array[] = $input;
    }
}
print_r($array);
echo count($array);
?>

// 入力

// 勇者
//
// 戦士

// ポイント
// if文の前にtrimを使用
PHPで下記の入力を受け取ると

戦士
勇者

受け取った入力は「"戦士\n"・ "勇者"」となってしまいます。

この \n（改行）の有無で別の文字列として認識されてしまいます。
たとえば「"戦士"」と「"戦士\n"」は別の文字列として認識されます。

この問題を解決するために、
\n（改行）を取り除くことができるtrim関数を使用します。
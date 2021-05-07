## PHP入門編1:PHPをはじめよう
### 目次
[1-1_phpの基本文法](#1-1phpの基本文法)</br>
[1-2_"echo"出力や表示をする](#1-2_"echo"出力や表示をする)</br>
[1-3_phpは行の終わりに;(セミコロン)を入れる](#1-3_phpは行の終わりに;(セミコロン)を入れる)</br>
[1-4_phpはHTMLと共存できる](#1-4_phpはHTMLと共存できる)</br>
[1-5_変数を使う](#1-5_変数を使う)</br>
[1-6_サイコロを作る](#1-6_サイコロを作る)</br>
[1-7_演算子で計算してみよう](#1-7_演算子で計算してみよう)</br>
[1-8_値段計算してみよう](#1-8_値段計算してみよう)</br>


### 1-1_phpの基本文法
```php
<?php
<?php ?>で囲んだところがphpプログラムの範囲となる。開始タグと終了タグという。
?>
```

### 1-2_"echo"出力や表示をする
```php
例：
<?php
echo "hello world";
?>
```

### 1-3_phpは行の終わりに;(セミコロン)を入れる

### 1-4_phpはHTMLと共存できる
```php
<b>
<?php
echo "ここをボールド体で出力"
?>
</b>
```

### 1-5_変数を使う
```php
<?php>
$output1 = "hello";
$output2 = "world";
echo $output1;
echo $output2;
?>
```
この出力結果は`helloworld`となる。</br>
同様の出力方法として</br>
`echo $output1.$output2;`</br>
また間にスペースがほしければ</br>
`echo $output1." ".$output2;`</br>
として出力する。

### 1-6_サイコロを作る
phpにはもともとランダムに数値を選択する関数がある。</br>
それが`rand(最小値,最大値)`である。
以下はその使用例。
```php
<?php
$rand_num = rand(1,6); // 1〜6までの整数をランダムで一つ返す。
echo "サイコロの目の値は{$rand_num}です。" ;
// 他の書き方として下記の記述方法がある。
echo 'サイコロの目の値は'.$rand_num.'です。';
// また、直接テキスト内にrand関数を置く事も可能。
echo 'サイコロの目の値は'.rand(1,6).'です。';
?>
```

### 1-7_演算子で計算してみよう
代入演算子とは"=(イコール)"の事。ここでは左右が同じという意味でなく、右のものを左に代入するという用途で用いる。</br>
代数演算子とは計算のためにもちいる記号。(+,-,*,/,%など)</br>
単項演算子は変数に"++"や"--"などをつける事で1ずつ足したり引いたりするもの。</br>
```php
<?php
// 代入演算子
$a = 'テキスト';  //文字列を代入する際は、シングルorダブルコーテーションで囲む。
$b = 4;         //数値を代入する際は、そのまま記述でOK。またこーテーションで囲むと文字列として扱われる。

// 代数演算子
echo (1+$b) * $b; //出力結果は20

// 単項演算子
$b++
echo $b; //出力結果は5。"$bｰｰ"なら3
?>
```

### 1-8_値段計算してみよう
りんごの価格と買う個数を代入して、合計金額を計算する。
```php
<?php
$apple = 350;
$apple_num = rand(1,10);
echo 'りんごの金額は'.$apple."です。\n";
echo 'りんごを買う数は'.$apple_num."です。\n";
$total = $apple * $apple_num;
echo '合計金額は'.$total.'です。';
?>
```
出力結果は下記のとおり。
```
りんごの金額は350です。
りんごを買う数は10です。
合計金額は3500です。
```
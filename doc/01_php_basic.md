## ①php基礎
### 1-1 phpの基本文法
```php
<?php
<?php ?>で囲んだところがphpプログラムの範囲となる。開始タグと終了タグという。
?>
```

### 1-2 echo:出力や表示をする</br>
```php
例：
<?php
echo "hello world";
?>
```

### 1-3 phpは行の終わりに;(セミコロン)を入れる。

### 1-4 phpはHTMLと共存できる。
```php
<b>
<?php
echo "ここをボールド体で出力"
?>
</b>
```

### 1-5 変数を使う。
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

### 1-6 サイコロを作る。
## PHP入門編4:配列の基礎、explodeを学ぶ
### 目次
[4-1_配列の概念](#4-1_配列の概念)</br>
[4-2_配列の基本操作１](#4-2_配列の基本操作１)</br>
[4-3_配列の基本操作２](#4-3_配列の基本操作２)</br>


### 4-1_配列の概念
これまで一つのものを入れられる箱のようなものとして**変数**を扱ってきた。
```php
//変数のイメージ
$year = 1999;
$name_1 = "勇者";
```
</br>

ここではエクセルの表形式のデータを管理する**配列**を扱う。</br>
配列内の順番を`key`、それに対応する内容を`value`という。</br>
※ `key`は0番から始まる。</br>
例：前から3番目"まつぼっくり"は`key = 2`</br>
| key        | value          |
| ---------- | -------------- |
| 0          | おにぎり       |
| 1          | みかん         |
| 2          | まつぼっくり   |
</br>


### 4-2_配列の基本操作１
下記の変数を配列に代入してみる。
```php
<?php
$name_1 = "勇者"
$name_2 = "魔法使い"
?>
```
↓配列にしてみる
```php
<?php
$team =  array('勇者';'魔法使い')
print_r($team);  //配列を出力する関数
?>
```
↓出力結果
</br>
```
Array
(
    [0] => 勇者
    [1] => 魔法使い
)
```
</br>

**配列に中身を代入する関数**</br>
`$配列名 = array(要素１, 要素２, 要素３…);`</br>
keyは0から勝手に割り振られる。</br>
</br>

出力する際はechoを用いるとエラーが生じるので下記の関数を用いる。</br>
**配列を出力する関数**</br>
`print_R(出力したい配列)`
[参考:print_r](https://www.php.net/manual/ja/function.print-r.php/)</br>
</br>

`array()`には変数を代入する事が可能。</br>
`print_R(出力したい配列)`は`echo`と同様に変数の値を出力する事も可能である。
```php
<?php
$name_1 = "勇者2";

$team =  array('勇者','魔法使い',$name_1);
print_r($team);
print_r($name_1);
?>
```
↓出力結果
```
Array
(
    [0] => 勇者
    [1] => 魔法使い
    [2] => 勇者2
)
勇者2
```
</br>

### 4-3_配列の基本操作２

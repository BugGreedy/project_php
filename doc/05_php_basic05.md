## PHP入門編5:連想配列、foreach、ソートを学ぶ
### 目次
[5-1_連想配列の概念](#5-1_連想配列の概念)</br>
[5-2_連想配列の基本操作](#5-2_連想配列の基本操作)</br>
[5-3_配列の整列](#5-3_配列の整列)</br>
[5-4_連想配列の整列](#5-4_連想配列の整列)</br>
[5-5_foreachで配列の値を取り出す１](#5-5_foreachで配列の値を取り出す１)</br>
[5-6_foreachで配列の値を取り出す２](#5-6_foreachで配列の値を取り出す２)</br>
[5-7_RPGのアイテムリストを再現１](#5-7_RPGのアイテムリストを再現１)</br>
[5-8_RPGのアイテムリストを再現2](#5-8_RPGのアイテムリストを再現2)</br>


***

### 5-1_連想配列の概念
前項では値に対して自動的にkeyが割り当てられる"配列"を扱ってきた。</br>
この章ではkeyに文字列を入れられる**連想配列**を扱う。</br>
下記はそのイメージ</br>
- 配列</br>
  | key        | value          |
  | ---------- | -------------- |
  | 0          | おにぎり       |
  | 1          | みかん         |
  | 2          | まつぼっくり   |
- 連想配列</br>
  | key        | value          |
  | ---------- | -------------- |
  | うに       | 1              |
  | たまご     | tamago         |
  | Long Sword | ロングソード   |

  `※keyが文字列`</br>
  `※valueには数字でも文字列でも代入可能`</br>
</br>

- 連想配列の用法</br>
  たとえばkey=アイテム名,value=そのアイテムの所持数など。</br>
  ただし、そのアイテム名(key)が重複した場合、上書きされてしまうので重複不可。</br>

***

### 5-2_連想配列の基本操作
5-1で紹介したような連想配列に値を入れたり消したりしてみる。</br>
```php
<?php
$item = array(              //通常の配列と同様にarray関数で代入できる。
  "ロングソード" => 2,        //ただし、keyもvalueも指定する必要がある。
  "鉄の盾" => 1,
  
);
$item["クリスタル"] = 6;      //あとから値を追加する記述
print_r($item);
$item["クリスタル"] = 3;      //あとからvalueを変更する記述
print_r($item);
unset($item["鉄の盾"]);      //unset関数で項目を削除できる。
print_r($item);
?>
```
↓出力結果
```php
Array
(
    [ロングソード] => 2
    [鉄の盾] => 1
    [クリスタル] => 6
)
Array
(
    [ロングソード] => 2
    [鉄の盾] => 1
    [クリスタル] => 3
)
Array
(
    [ロングソード] => 2
    [クリスタル] => 3
)
```

***
 
### 5-3_配列の整列
配列を並び替える。
- **sort関数**</br>
  配列の**value**の昇順:小さい順(1,2,3…a,b,c…あ,い,う…など)</br>
  用法は`sort(関数名);`でok。
  ```php
  <?php
  $item = array("ツヴァイ","蛇人の剣","グレソ");
  print_r($item);
  sort($item);
  print_r($item);
  ?>
  ```
  ↓出力結果
  ```php
  Array
  (
      [0] => ツヴァイ
      [1] => 蛇人の剣
      [2] => グレソ
  )
  Array
  (
      [0] => グレソ     //五十音順に入れ替わった。
      [1] => ツヴァイ
      [2] => 蛇人の剣
  )
  ```
</br>

- **rsort関数**</br>
  sort関数と逆。配列の中身を降順:大きい順(3,2,1 や う,い,あ 等)に並び替える。</br>
  rsortのrはreverseの"r"と覚えると良い。</br>
  ```php
  <?php
  $item = array("ツヴァイ","蛇人の剣","グレソ");
  print_r($item);
  rsort($item);
  print_r($item);
  ?>
  ```
  ↓出力結果
  ```php
  Array
  (
      [0] => ツヴァイ
      [1] => 蛇人の剣
      [2] => グレソ
  )
  Array
  (
      [0] => 蛇人の剣
      [1] => ツヴァイ
      [2] => グレソ
  )
  ```
  </br>

*** 

### 5-4_連想配列の整列
連想配列にsortをかけると通常の配列に変換されて出力されてしまう。
```php
<?php
$item = array(
  "ツヴァイ" => 20,
  "蛇人の剣" => 30,
  "グレソ" => 50,
);
print_r($item);
rsort($item);
print_r($item);
?>
```
↓出力結果
```php
Array
(
    [ツヴァイ] => 20
    [蛇人の剣] => 30
    [グレソ] => 50
)
Array
(
    [0] => 50
    [1] => 30
    [2] => 20
)
```
</br>

そこで連想配列をソートする際は下記の関数を用いる。</br>
</br>
- **asort関数/arsort関数**</br>
  asort関数は**value**を昇順に並べ替える。 </br>
  arsort関数は**value**を降順に並べ替える。 </br>
  </br>

- **ksort関数/ksort関数**</br>
  ksort関数は**key**を昇順に並べ替える。 </br>
  krsort関数は**key**を降順に並べ替える。 </br>

```php
<?php
$item = array(
  "蛇人の剣" => 30,
  "ツヴァイ" => 20,
  "グレソ" => 50,
);
print_r($item);

asort($item);
print_r($item);

arsort($item);
print_r($item);

ksort($item);
print_r($item);

krsort($item);
print_r($item);
?>
```
↓出力結果
```php
Array
(
    [蛇人の剣] => 30
    [ツヴァイ] => 20
    [グレソ] => 50
)
Array
(
    [ツヴァイ] => 20
    [蛇人の剣] => 30
    [グレソ] => 50
)
Array
(
    [グレソ] => 50
    [蛇人の剣] => 30
    [ツヴァイ] => 20
)
Array
(
    [グレソ] => 50
    [ツヴァイ] => 20
    [蛇人の剣] => 30
)
Array
(
    [蛇人の剣] => 30
    [ツヴァイ] => 20
    [グレソ] => 50
)

```

***

### 5-5_foreachで配列の値を取り出す１
**foreach文**</br>
配列に対して、値を取り出し、値ごとに処理を行う。</br>
使用例としては、配列に都道府県名などを入れておいてプルダウンメニューとして取り出すなど。
下記のような記述で使用する。</br>
`foreach(配列名 as バリューを代入する変数)`
```php
<?php
$array = array('騎士','呪術師','持たざるもの');
foreach($array as $value){
  echo $value."\n";
}
?>
```
↓出力結果
```php
騎士
呪術師
持たざるもの
```
</br>

上記は`print_r`とさほど変わらないが、例えばHTMLタグを挿入するなどの事に活用できる。</br>
```php
<?php
$array = array('騎士','呪術師','持たざるもの');
foreach($array as $value){
  echo "<strong>".$value."</strong><br>\n";
}
?>
```
↓出力結果</br>
```php
<strong>騎士</strong><br>
<strong>呪術師</strong><br>
<strong>持たざるもの</strong><br>
```
↓出力結果(HTML)</br>
<strong>騎士</strong><br>
<strong>呪術師</strong><br>
<strong>持たざるもの</strong><br>
</br>

***

### 5-6_foreachで配列の値を取り出す２
今回は配列のkeyも取得する。記述方法は下記。</br>
```php
foreach(配列 as キーを代入する変数 => バリューを代入する変数){
処理
}
```
実際にやってみる。</br>
```php
<?php
$array = array('騎士','呪術師','持たざるもの');
foreach($array as $key => $value){
  echo $key.":<strong>".$value."</strong><br>\n";
}
?>
```
↓出力結果
```php
0:<strong>騎士</strong><br>
1:<strong>呪術師</strong><br>
2:<strong>持たざるもの</strong><br>
```
↓出力結果(HTML)</br>
0:<strong>騎士</strong><br>
1:<strong>呪術師</strong><br>
2:<strong>持たざるもの</strong><br>
</br>

連想配列でも同様の事が可能。
```php
<?php
$array = array(
  '騎士' => 'ショートソード',
  '呪術師' => 'ハンドアックス',
  '持たざるもの' => 'なし'
);
foreach($array as $key => $value){
  echo $key."の初期装備は<strong>".$value."</strong>です。<br>\n";
}
?>
```
↓出力結果(HTML)</br>
騎士の初期装備は<strong>ブロードソード</strong>です。<br>
呪術師の初期装備は<strong>ハンドアックス</strong>です。<br>
持たざるものの初期装備は<strong>なし</strong>です。<br>
</br>

***

### 5-7_RPGのアイテムリストを再現１
仮に下記の内容にてリストを作成する場合</br>
1. アイテム画像とアイテム名を表示
2. 同じアイテムを複数表示できるようにしたい
3. 同じアイテムの画像指定は1箇所にしたい
4. アイテムの並び順を管理したい
   </br>
   </br>
このような時はアイテムと画像を結びつける連想配列(下記では`$item_img`)と並び順を管理する配列(下記では`item_order`)を用いる。</br>
リストの表示のさせ方としては、並び順配列をforeachでループさせながら一つ一つのvalue(アイテム名)をもとに画像配列から画像ファイルを取り出すといった具合。</br>

- $item_img(画像用配列)</br>
  | key        | value          |
  | ---------- | -------------- |
  | 剣         | sword.png      |
  | 盾         | shield.png     |
  | 回復薬     | potion.png    |
  | クリスタル | crystal.png   |

- $item_order(並び順配列)</br>
  | key        | value          |
  | ---------- | -------------- |
  | 0          | クリスタル     |
  | 1          | 剣             |
  | 3          | 盾             |
  | 4          | 回復薬         |

  ※なぜ並び順配列のvalueにアイテム名を入れるかというと、keyだと同じ値を1度しか使えないため、目的に沿った表現ができないから。</br>
  →今回でいうと"2. 同じアイテムを複数表示できるようにしたい"という目的のため。

***

### 5-8_RPGのアイテムリストを再現2
5-7を具体的に記述する。
```php
<?php
$item_img = array(
    "剣" => "http://paiza.jp/learning/images/sword.png",
    "盾" => "http://paiza.jp/learning/images/shield.png",
    "回復薬" => "http://paiza.jp/learning/images/potion.png",
    "クリスタル" => "http://paiza.jp/learning/images/crystal.png"
);
$item_order = array("クリスタル", "盾", "剣", "回復薬");
// 並び順配列をループさせてアイテム名を表示
foreach($item_order as $item_name){
  // アイテム名を元に画像用配列から画像ファイル名を取得
  echo "<img src=".$item_img[$item_name].">";
  echo $item_name."<br>\n";
}
?>
```
↓出力結果
```html
<img src=http://paiza.jp/learning/images/crystal.png>クリスタル<br>
<img src=http://paiza.jp/learning/images/shield.png>盾<br>
<img src=http://paiza.jp/learning/images/sword.png>剣<br>
<img src=http://paiza.jp/learning/images/potion.png>回復薬<br>
```
↓出力結果</br>
<img src=http://paiza.jp/learning/images/crystal.png>クリスタル<br>
<img src=http://paiza.jp/learning/images/shield.png>盾<br>
<img src=http://paiza.jp/learning/images/sword.png>剣<br>
<img src=http://paiza.jp/learning/images/potion.png>回復薬<br>
</br>

また、配列内の代入部分を編集する事で、今回の目的であった**同じアイテムの複数回表示**と**並び順を管理したい**を達成する事ができる。
```php
<?php
$item_img = array(
    "剣" => "http://paiza.jp/learning/images/sword.png",
    "盾" => "http://paiza.jp/learning/images/shield.png",
    "回復薬" => "http://paiza.jp/learning/images/potion.png",
    "クリスタル" => "http://paiza.jp/learning/images/crystal.png"
);

//↓もとの配列から順番を変更し、回復薬の表示回数を追加
$item_order = array("盾", "剣","クリスタル","回復薬",  "回復薬",  "回復薬"); 
// 並び順配列をループさせてアイテム名を表示
foreach($item_order as $item_name){
  // アイテム名を元に画像用配列から画像ファイル名を取得
  echo "<img src=".$item_img[$item_name].">";
  echo $item_name."<br>\n";
}
?>
```
↓出力結果</br>
<img src=http://paiza.jp/learning/images/shield.png>盾<br>
<img src=http://paiza.jp/learning/images/sword.png>剣<br>
<img src=http://paiza.jp/learning/images/crystal.png>クリスタル<br>
<img src=http://paiza.jp/learning/images/potion.png>回復薬<br>
<img src=http://paiza.jp/learning/images/potion.png>回復薬<br>
<img src=http://paiza.jp/learning/images/potion.png>回復薬<br>
</br>
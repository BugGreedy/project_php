## PHP入門編6:多次元配列を理解しよう
### 目次
[6-1_多次元配列の概要](#6-1_多次元配列の概要)</br>
[6-2_2次元配列を作成する](#6-2_2次元配列を作成する)</br>
[6-3_2次元配列を操作する1](#6-3_2次元配列を操作する1)</br>
[6-4_2次元配列を操作する2](#6-4_2次元配列を操作する2)</br>
[6-5_2次元配列をループで処理する](#6-5_2次元配列をループで処理する)</br>
[6-6_2次元配列をarrayで作成する](#6-6_2次元配列をarrayで作成する)</br>
[6-7_ドット絵を表示する](#6-7_ドット絵を表示する)</br>
[6-8_3次元配列で複数のドット絵を表示する](#6-8_3次元配列で複数のドット絵を表示する)</br>
[6-9_2次元配列で地図を表示する1](#6-9_2次元配列で地図を表示する1)</br>
[6-10_2次元配列で地図を表示する2](#6-10_2次元配列で地図を表示する2)</br>
[6-11_標準入力から2次元配列](#6-11_標準入力から2次元配列)</br>
[6-12_2次元配列で画像を配置](#6-12_2次元配列で画像を配置)</br>

***

### 6-1_多次元配列の概要
2次元配列を理解しよう
- **データ構造とは**</br>
  データの集まりを格納するフォーマットの事。</br>
  </br>
  - 変数</br>
    $player = "勇者";</br>
    </br>
  - 配列</br>
    $player[] = "勇者”;</br>
    </br>
  - 連想配列</br>
    $hp["勇者"] = 120;</br>
    </br>
  - 2次元配列</br>
    $worldmap[1][2] = "城";</br>
    </br>

- 2次元配列の用途</br>
  - RPGのマップ
  - 写真・イラストなどのイメージ
  -  ゲームの盤面
  -  表形式のデータ
  -  3D-CGの空間座標 など
</br>

***

### 6-2_2次元配列を作成する
実はphpは**array関数を使わなくても配列ができる**。</br>
```php
<?php
//これまでは $teamA = array("ピカチュウ","カイリュー","ヤドラン");としていたが
$teamA = ["ピカチュウ","カイリュー","ヤドラン"];  //でもできる。
echo $teamA[0].',';
echo $teamA[1].',';
echo $teamA[2]."\n";
?>
```
↓出力結果
```
ピカチュウ,カイリュー,ヤドラン
```
</br>

また、phpにおいては**配列に配列を入れる事も可能**である。</br>
```php
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
```
↓出力結果
```
Array
(
    [0] => Array
        (
            [0] => ヒトカゲ
            [1] => リザード
            [2] => リザードン
        )

    [1] => Array
        (
            [0] => ゼニガメ
            [1] => カメール
            [2] => カメックス
        )

    [2] => Array
        (
            [0] => フシギダネ
            [1] => フシギソウ
            [2] => フシギバナ
        )

)
ヒトカゲ,カメール,フシギバナ
```
</br>

***

### 6-3_2次元配列を操作する1
2次元配列は事前に配列にまとめなくても直接定義して作成する事ができる。
```php
<?php
$teams = [
  ["ヒトカゲ","リザード","リザードン"],
  ["ゼニガメ","カメール","カメックス"],
  ["フシギダネ","フシギソウ","フシギバナ"]
];
print_r($teams);    // 配列の中の配列を出力(この場合だと3つの配列が出力される)
echo $teams[0][0].",";  // 配列の中の配列を個別に出力
echo $teams[1][1].',';
echo $teams[2][2] . "\n";
?>
```
↓出力結果
```
Array
(
    [0] => Array
        (
            [0] => ヒトカゲ
            [1] => リザード
            [2] => リザードン
        )

    [1] => Array
        (
            [0] => ゼニガメ
            [1] => カメール
            [2] => カメックス
        )

    [2] => Array
        (
            [0] => フシギダネ
            [1] => フシギソウ
            [2] => フシギバナ
        )

)
ヒトカゲ,カメール,フシギバナ
```
</br>

次に2次元配列の操作について行う。</br>
通常の配列と同様に値を更新する事が可能。</br>
```php
<?php
$teams = [
  ["ヒトカゲ","リザード",],
  ["ゼニガメ","カメール","カメックス"],
  ["フシギダネ","フシギソウ","フシギバナ"],
  ["リザードン"]
];
$teams[0][0] =  "アチャモ";  // 値を更新
print_r($teams); 
echo $teams[0][0]. "\n";  
echo $teams[1][1]. "\n";
echo $teams[2][2]. "\n";
echo count($teams)."\n";
echo count($teams[0])."\n";
?>
```
↓出力結果
```php
Array
(
    [0] => Array
        (
            [0] => アチャモ
            [1] => リザード
        )

    [1] => Array
        (
            [0] => ゼニガメ
            [1] => カメール
            [2] => カメックス
        )

    [2] => Array
        (
            [0] => フシギダネ
            [1] => フシギソウ
            [2] => フシギバナ
        )

    [3] => Array
        (
            [0] => リザードン
        )

)
アチャモ
カメール
フシギバナ
4
2
```

***

### 6-4_2次元配列を操作する2
2次元配列の削除を行う。削除にはこれまでの配列同様に**unset関数**を用いる。
```php
<?php
$teams = [
  ["ヒトカゲ","リザード",],
  ["ゼニガメ","カメール","カメックス"],
  ["フシギダネ","フシギソウ","フシギバナ"],
  ["リザードン"]
];
$teams[] = ["ポッポ","コラッタ","キャタピー"];
$teams[0][0] =  "アチャモ";
unset($teams[1]); // 2次元配列内の配列を削除
unset($teams[2][2]); // 2次元配列内の配列の中の値を削除

print_r($teams); 
?>
```
↓出力結果
```
Array
(
    [0] => Array
        (
            [0] => アチャモ
            [1] => リザード
        )

    [2] => Array
        (
            [0] => フシギダネ
            [1] => フシギソウ
        )

    [3] => Array
        (
            [0] => リザードン
        )

    [4] => Array
        (
            [0] => ポッポ
            [1] => コラッタ
            [2] => キャタピー
        )

)
```

***

### 6-5_2次元配列をループで処理する
2次元配列の中身をループで取得する。配列の中に配列があるのでループが2重になる。
```php
<?php
$teams = [
  ["ヒトカゲ","リザード", "リザードン"],
  ["ゼニガメ","カメール","カメックス"],
  ["フシギダネ","フシギソウ","フシギバナ"],
];
for($i = 0; $i < count($teams); $i ++){
  for($j = 0; $j < count($teams[$i]); $j ++){
    echo $i; // とりあえず配列の番号を出力してみる。
    echo $j;
    echo " ";
    }
  echo "\n";
  echo "---\n";
}
?>
```
↓出力結果
```
00 01 02 
---
10 11 12 
---
20 21 22 
---
```
</br>

これを各値を出力するように変更。
```php
<?php
$teams = [
  ["ヒトカゲ","リザード", "リザードン"],
  ["ゼニガメ","カメール","カメックス"],
  ["フシギダネ","フシギソウ","フシギバナ"],
];
for($i = 0; $i < count($teams); $i ++){
  for($j = 0; $j < count($teams[$i]); $j ++){
    // echo $i;
    // echo $j;
    // echo " ";
    echo $teams[$i][$j]." "; //このように記載
    }
  echo "\n";
  echo "---\n";
}
?>
```
↓出力結果
```
ヒトカゲ リザード リザードン 
---
ゼニガメ カメール カメックス 
---
フシギダネ フシギソウ フシギバナ 
---
```
</br>

この記述は**foreach文**を用いてより簡潔に記述することができる。
```php
<?php
$teams = [
  ["ヒトカゲ","リザード", "リザードン"],
  ["ゼニガメ","カメール","カメックス"],
  ["フシギダネ","フシギソウ","フシギバナ"],
];
foreach($teams as $team){
  foreach($team as $monster){
    echo $monster.' ';
  }
  echo "\n";
  echo "---\n";
}
?>
```
↓出力結果
```
ヒトカゲ リザード リザードン 
---
ゼニガメ カメール カメックス 
---
フシギダネ フシギソウ フシギバナ 
---
```
と、for文を用いた際と同様の出力ができる。
</br>

6-5_演習課題3
各要素を3倍にして新しい配列を作成する
```php
<?php
$numbers = [12, 34, 56, 78, 90];

// ここに、各要素を3倍にして新しい配列を作成するコードを記述する
foreach($numbers as $value){
  $numbers2[] = $value * 3;
}
print_r($numbers2);
?>
```
↓出力結果
```
Array
(
    [0] => 36
    [1] => 102
    [2] => 168
    [3] => 234
    [4] => 270
)
```

***

### 6-6_2次元配列をarrayで作成する
arrayでも2次元配列を作成する事が可能。
```php
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
echo "---\n";                 //出力の最後に---を出力
?>
```
↓出力結果
```
ヒトカゲ リザード リザードン 
ゼニガメ カメール カメックス 
フシギダネ フシギソウ フシギバナ 
---
```
</br>

***

### 6-7_ドット絵を表示する
二次元配列でドット絵を表示するコードを記述する。
```php
<?php
$enemyImage =
array(
array(0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
array(1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 1),
array(1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1),
array(0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
array(0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
array(0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1)
);

foreach($enemyImage as $line){
  foreach($line as $dot){
    if($dot == 1){
      echo "#";
    }
    else{
      echo " ";
    }
  }
  echo "\n";
}
?>
```
↓出力結果
```php
  ############  
##            ##
#  ###   ###   #
##    ##      ##
 ############## 
   ###     ###  
    ###      ###
```
</br>

***

### 6-8_3次元配列で複数のドット絵を表示する
複数のドット絵を表示するために、3次元配列を使う。</br>
要は前回の記述を配列にする。
```php
<?php
// 3次元配列で複数のドット絵を表示する
$enemyImages =
    array(
        array(
            array(0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
            array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
            array(1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 1),
            array(1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1),
            array(0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
            array(0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
            array(0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1),
        ),
        array(
            array(0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
            array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
            array(1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 0, 0, 1),
            array(1, 1, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 1, 1),
            array(0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
            array(0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0),
            array(0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0),
        ),
        array(
            array(0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
            array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1),
            array(1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 1),
            array(1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1),
            array(0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
            array(0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
            array(1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0),
        ),
    );
  foreach($enemyImages as $enemyImage){
    foreach($enemyImage as $line){
      foreach($line as $dot){
      if($dot == 1){
        echo "@";
      }else{
        echo " ";
      }
    }
    echo "\n";
  }
  echo "\n";
  }
?>
```
↓出力結果
```
  @@@@@@@@@@@@  
@@            @@
@  @@@   @@@   @
@@    @@      @@
 @@@@@@@@@@@@@@ 
   @@@     @@@  
    @@@      @@@

  @@@@@@@@@@@@  
@@            @@
@  @@@    @@@  @
@@     @@     @@
 @@@@@@@@@@@@@@ 
   @@@    @@@   
   @@@    @@@   

  @@@@@@@@@@@@  
@@            @@
@   @@@   @@@  @
@@      @@    @@
 @@@@@@@@@@@@@@ 
  @@@      @@@  
@@@       @@@ 
```
</br>

***

### 6-9_2次元配列で地図を表示する1 
- [**array_fill関数**](https://www.php.net/manual/ja/function.array-fill.php/)</br>
  配列を指定した値で埋める関数</br>
  `array_fill(配列の開始するインデックスの値,配列の要素数,配列を埋める要素の値)</br>
  ```php
  例:
  <?php
  $map_row = array_fill(0, 20, "森");
  print_r($map_row);
  ?>
  ```
  ↓出力結果
  ```
  Array
  (
      [0] => 森
      [1] => 森
      [2] => 森
      [3] => 森
      [4] => 森
      [5] => 森
      [6] => 森
      [7] => 森
      [8] => 森
      [9] => 森
      [10] => 森
      [11] => 森
      [12] => 森
      [13] => 森
      [14] => 森
      [15] => 森
      [16] => 森
      [17] => 森
      [18] => 森
      [19] => 森
  )
  ```
</br>
これを2次元配列に置き換えてマップを表示する。

```php
<?php
$map_row = array_fill(0, 20, "森");
$landMap = array_fill(0, 10, $map_row);

//個別に場所を指定する
$landMap[0][0] = "城";
$landMap[0][19] = "街";
$landMap[9][19] = "村";

foreach($landMap as $row){
  foreach($row as $column){
    echo $column;
  }
  echo "\n";
}
?>
```

↓出力結果

```php
城森森森森森森森森森森森森森森森森森森街
森森森森森森森森森森森森森森森森森森森森
森森森森森森森森森森森森森森森森森森森森
森森森森森森森森森森森森森森森森森森森森
森森森森森森森森森森森森森森森森森森森森
森森森森森森森森森森森森森森森森森森森森
森森森森森森森森森森森森森森森森森森森森
森森森森森森森森森森森森森森森森森森森森
森森森森森森森森森森森森森森森森森森森森
森森森森森森森森森森森森森森森森森森森村
```
</br>

***



### 6-10_2次元配列で地図を表示する2 
前回に引き続き地図をマップを作る。今回はオブジェクトの間に道を引く。
```php
<?php
$map_row = array_fill(0, 20, "森");
$landMap = array_fill(0, 10, $map_row);
//個別に場所を指定する
$landMap[0][0] = "城";
$landMap[0][19] = "街";
$landMap[9][19] = "村";

foreach($landMap as $i => $row){
  echo $i.":"; 
  foreach($row as $j => $column){
    if(($i % 2 == 0 || $j % 3 == 0) && $column == "森"){  //横行(row)が2で割り切れるか縦列(column)が3で割り切れる時
    $landMap[$i][$j] = "＋";
    }
    echo $landMap[$i][$j];
  }
  echo "\n";
}
?>
```
↓出力結果
```
:城＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋街
1:＋森森＋森森＋森森＋森森＋森森＋森森＋森
2:＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋
3:＋森森＋森森＋森森＋森森＋森森＋森森＋森
4:＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋
5:＋森森＋森森＋森森＋森森＋森森＋森森＋森
6:＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋
7:＋森森＋森森＋森森＋森森＋森森＋森森＋森
8:＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋＋
9:＋森森＋森森＋森森＋森森＋森森＋森森＋村
```
</br>

 ***

### 6-11_標準入力から2次元配列  
今回は標準入力からドット絵を読み込み表示する。
```php
入力
7
0 0 0 0 1 1 1 0 0 0 0 0 0 1 1 1
0 0 0 1 1 1 0 0 0 0 0 1 1 1 0 0
0 0 1 1 1 1 1 1 1 1 1 1 1 1 0 0
1 1 0 0 0 0 0 0 0 0 0 0 0 0 1 1
1 0 0 1 1 1 0 0 0 1 1 1 0 0 0 1
1 1 0 0 0 0 1 1 0 0 0 0 0 0 1 1
0 0 1 1 1 1 1 1 1 1 1 1 1 1 0 0


<?php
$number = trim(fgets(STDIN));  //今回はあらかじめ入力の行数が指定されている.最初の7がその行数。

for($i = 0; $i < $number; $i++){
  $table[] = explode(" " , trim(fgets(STDIN))); //explodeで配列化
}

foreach($table as $line){
  foreach($line as $dot){
    if($dot==1){
      echo "#";
    }else{
      echo " ";
    }
    }    
  echo "\n";
}
?>
```
↓出力結果
```php
    ###      ###
   ###     ###  
  ############  
##            ##
#  ###   ###   #
##    ##      ##
  ############  
```
</br>

***

### 6-12_2次元配列で画像を配置  
将棋のマス目の中に画像を表示するような記述を行う。
```php
<?php
//画像URL用配列
$playerImages =
    array(
        "https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Empty.png",
        "https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Dragon.png",
        "https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Crystal.png",
        "https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Hero.png",
        "https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Heroine.png");

//画像配置用の記述
$playersPositions =
    array(
      array(1,1,1,1),
      array(0,0,0,0),
      array(1,2,3,4)
    );

echo "<table>\n"; 
foreach($playersPositions as $line){
  echo "<tr>\n";
  foreach($line as $player){
    echo "<td><img src=".$playerImages[$player]."></td>\n";
  }
  echo "</tr>\n";
}
echo "</table>";

?>
```
↓出力結果
```
<table>
<tr>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Dragon.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Dragon.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Dragon.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Dragon.png></td>
</tr>
<tr>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Empty.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Empty.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Empty.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Empty.png></td>
</tr>
<tr>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Dragon.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Crystal.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Hero.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Heroine.png></td>
</tr>
</table>

```
↓出力結果(HTML)
<table>
<tr>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Dragon.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Dragon.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Dragon.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Dragon.png></td>
</tr>
<tr>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Empty.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Empty.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Empty.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Empty.png></td>
</tr>
<tr>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Dragon.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Crystal.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Hero.png></td>
<td><img src=https://paiza-webapp.s3.amazonaws.com/files/learning/rpg/Heroine.png></td>
</tr>
</table>



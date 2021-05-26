## PHP入門編8:クラスを理解しよう


### 目次
[8-1_クラスについて学習しよう](#8-1_クラスについて学習しよう)</br>
[8-2_クラスを作成しよう](#8-2_クラスを作成しよう)</br>
[8-3_変数をクラスで管理しよう](#8-3_変数をクラスで管理しよう)</br>
[8-4_RPGの敵クラスを作ろう](#8-4_RPGの敵クラスを作ろう)</br>
[8-5_引数と戻り値のあるメソッドを作ろう](#8-5_引数と戻り値のあるメソッドを作ろう)</br>
[8-6_アクセス修飾子を理解しよう](#8-6_アクセス修飾子を理解しよう)</br>

***

### 8-1_クラスについて学習しよう
- **オブジェクト指向(OO:Object Oriented)とは**</br>
  そのモノに注目して考える概念。</br>
  そのモノが何で、どのようなはたらきをするか</br>
</br>

- **オブジェクトとは**
  - 変数(構成要素)とメソッド(はたらき)をセットにしたもの。
  - クラスからオブジェクト(インスタンス)を作って利用する。
  - クラスはオブジェクトの設計図。
  - クラスをインスタンス化したものがオブジェクト。
  - インスタンスとオブジェクトは同等の意味で用いられる。
</br>

***

### 8-2_クラスを作成しよう
playerクラスを作成して、メソッドを入れる。</br>
**クラスからオブジェクトを作成する記述方法**</br>
`$オブジェクト名 = new クラス名();`</br>
例；
```php
<?php
class PLayer{                   //PHPではクラス名を大文字にする。
  public function walk(){
    $message = "勇者は荒野を歩いていた。";
    echo $message;
  }
}

$player1 = new Player();  //オブジェクトを生成
$player1 -> walk();       //この矢印をアロー演算子という。
?>
```
↓出力結果
```
勇者は荒野を歩いていた。
```

***

### 8-3_変数をクラスで管理しよう
前回ではクラスがメソッドのみを保持していた。今回はクラスに変数をもたせる。</br>
前回作成したPlayerクラスにmyNameという変数を追加する。</br>
※PHPではクラス内の変数の事を**メンバ変数**という。</br>
また、今回のようなクラスで作成したのち、命令を受けるオブジェクトの事を**レシーバーオブジェクト**という。
```php
<?php
class PLayer{
  public $myName; //これがメンバ変数
  public function __construct($name){
    $this -> myName = $name;
  }
  public function walk(){
    echo $this -> myName."は荒野を歩いていた。"."\n";
  }
}

$player1 = new Player("戦士");  //※レシーバーオブジェクト
$player1 -> walk();

$player2 = new Player("パイソン"); //※レシーバーオブジェクト
$player2 -> walk();

$player1 -> walk(); //オブジェクトは一度生成してしまえばその後もその性質を持ち続ける。
?>
```
↓出力結果
```
戦士は荒野を歩いていた。
パイソンは荒野を歩いていた。
戦士は荒野を歩いていた。
```

***

### 8-4_RPGの敵クラスを作ろう
今回は敵のクラスを作り攻撃シーンを作成してみる。
```php
<?php
class Enemy{
  public $myName;
  public function __construct($name){
    $this -> myName = $name;
  }
  public function attack(){
    echo $this->myName. "は、主人公を攻撃した。\n";
  }
}
$slime = new Enemy("スライム");
$slime -> attack();
?>
```
↓出力結果
```
スライムは、主人公を攻撃した。
```
</br>

次に敵を複数にして、ループで取り出す。
```php
<?php
class Enemy{
  public $myName;
  public function __construct($name){
    $this -> myName = $name;
  }
  public function attack(){
    echo $this->myName. "は主人公を攻撃した。\n";
  }
}

$enemies[] = new Enemy("ディアボロ");
$enemies[] = new Enemy("メデューサ");
$enemies[] = new Enemy("かまいたち");

foreach($enemies as $enemy){
  $enemy -> attack();
}
?>
```
↓出力結果
```
ディアボロは主人公を攻撃した。
メデューサは主人公を攻撃した。
かまいたちは主人公を攻撃した。
```
</br>

メソッドに変数を渡すときの記述方法
```php
<?php

class Enemy{
  public $myName;
  public function __construct($name){
    $this -> myName = $name;
  }
  public function attack($player){
    echo $this->myName. "は".$player."を攻撃した。\n";
  }
}

$enemies[] = new Enemy("ディアボロ");
$enemies[] = new Enemy("メデューサ");
$enemies[] = new Enemy("かまいたち");

echo "あなたのお名前は？\n";
$player = trim(fgets(STDIN));
foreach($enemies as $enemy){
  $enemy -> attack($player);
}
?>
```
↓出力結果
```php
あなたのお名前は？
// 入力:モグラ
ディアボロはモグラを攻撃した。
メデューサはモグラを攻撃した。
かまいたちはモグラを攻撃した。
```

***

### 8-5_引数と戻り値のあるメソッドを作ろう
クラスのメソッドに引数と戻り値を追加する方法を記述する。
```php
<?php
class Item {
  public $price;
  Public $quantity; //「量・数量」の意味

  public function __construct($newPrice, $newQuantity){
    $this ->price = $newPrice;
    $this ->quantity = $newQuantity;
  }

  public function getTotalPrice(){
    return $this->price * $this ->quantity;
  }
}

$apple = new Item(150,10);
echo "合計金額は".$apple -> getTotalPrice()."円です。\n";

$orange = new Item(85,32);
echo "合計金額は" . $orange->getTotalPrice() . "円です。\n";

//メソッドの戻り値を変数に代入する事も可能。
$totalApple = $apple->getTotalPrice();
echo "合計金額は" . $totalApple . "円です。\n";
?>
```
↓出力結果
```
合計金額は1500円です。
合計金額は2720円です。
合計金額は1500円です。
```

***

### 8-6_アクセス修飾子を理解しよう
クラス定義内のメンバ変数やメソッドについている`public`はどこからでも呼び出せ誰でも使用できる。</br>
この`public`を`private`に設定するとそのクラス内でしか使えなくなる。</br>
この`public`を`private`のことを**アクセス修飾子**という。</br>
publicとprivateの例
```php
<?php
class Player{
  private $myName; //このメンバ変数をprivateにして実行
  public function __construct($name){
    $this->myName = $name;
  }
  public function walk(){
    echo $this->myName."は荒野を歩いていた。\n";
  }
}

$player = new Player("ハンター");
$player-> walk();
echo $player->myName;
```
↓出力結果
```
ハンターは荒野を歩いていた。
PHP Fatal error:  Uncaught Error: Cannot access private property Player::$myName in /Applications/MAMP/htdocs/project_php/curriculum_08/8-6.php:14
Stack trace:
#0 {main}
  thrown in /Applications/MAMP/htdocs/project_php/curriculum_08/8-6.php on line 14

Fatal error: Uncaught Error: Cannot access private property Player::$myName in /Applications/MAMP/htdocs/project_php/curriculum_08/8-6.php on line 14

Error: Cannot access private property Player::$myName in /Applications/MAMP/htdocs/project_php/curriculum_08/8-6.php on line 14

Call Stack:
    0.0004     397904   1. {main}() /Applications/MAMP/htdocs/project_php/curriculum_08/8-6.php:0
```
※`walk();`のようにclass内のメソッドでは使用できるが、`echo $player->myName;`のようにクラス外からの呼び出しでは使用できない。</br>
</br>


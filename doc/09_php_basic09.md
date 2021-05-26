## PHP入門編9:さらにクラスを理解しよう

### 目次
[9-1_さらにクラスについて学習しよう](#9-1_さらにクラスについて学習しよう)</br>
[9-2_クラスを継承する](#9-2_クラスを継承する)</br>
[9-3_メソッドのオーバーライド](#9-3_メソッドのオーバーライド)</br>
[9-4_RPGのPlayerクラスを継承で記述1](#9-4_RPGのPlayerクラスを継承で記述1)</br>
[9-5_RPGのPlayerクラスを継承で記述2](#9-5_RPGのPlayerクラスを継承で記述2)</br>
[9-6_クラスからメソッドを呼び出してみよう](#9-6_クラスからメソッドを呼び出してみよう)</br>
[9-7_クラス変数とクラスメソッドを使おう](#9-7_クラス変数とクラスメソッドを使おう)</br>

***

### 9-1_さらにクラスについて学習しよう
クラスについて復習
- 変数とメソッドがセット
- クラス(設計図)からオブジェクトを生成する。
- クラスを引き継いで、新しいクラスを定義できる。
  - これを**継承**という。
</br>

このレッスンの内容
- クラスを継承する。
- メソッドのオーバーライド
- 具体例：RPGのPlayerクラスを継承
- クラスからメソッドを呼び出す。
- クラス変数とクラスメソッド

</br>

***

### 9-2_クラスを継承する
クラス継承を学習するため、宝箱クラスからクラス継承して宝石箱クラスを作成する。</br>
この時の宝箱クラスのように継承元になるクラス**親クラス/スーパークラス**、宝石箱のような継承先になるクラスを**小クラス/サブクラス**という。</br>
継承の記述は`class 小クラス名 extends 親クラス名{}`
```php
<?php
class Box {
  public $myItem;

  public function __construct(){
    $this -> myItem = "新しいアイテム";
  }

  public function open(){
    echo "宝箱を開いた。". $this -> myItem. "を手に入れた。\n";
  }
}

class JewelryBox extends Box{  //継承の記述は class 小クラス名 extends 親クラス名{}
  public function look(){
    echo "宝箱はキラキラと輝いている.\n";
  }
}

$chest = new Box();
$chest -> open();
echo "\n";
$jewelryChest = new JewelryBox();
$jewelryChest -> look();
$jewelryChest -> open();  //Boxクラスのメソッドやメンバ変数を引き継いで利用できる。
?>
```
↓出力結果
```
宝箱を開いた。新しいアイテムを手に入れた。

宝箱はキラキラと輝いている.
宝箱を開いた。新しいアイテムを手に入れた。
```

***

### 9-3_メソッドのオーバーライド 
**メソッドのオーバーライド**とは、親クラスで定義したメソッドを子クラスで再定義する事。</br>
```php
<?php
class Box {
  public $myItem;

  public function __construct($item){
    $this -> myItem = $item;
  }

  public function open(){
    echo "宝箱を開いた。". $this -> myItem. "を手に入れた。\n";
  }
}

class MagicBox extends Box{
  public function look(){
  echo "宝箱は妖しく輝いている.\n";
  }

  public function open(){  //親クラスで定義したメソッドと同名のメソッドを編集することで再定義できる。
    echo "宝箱を開いた。". $this -> myItem."が襲ってきた!\n";
  }
}


$chest = new Box("太刀");
$chest -> open();
echo "\n";
$magicBox = new MagicBox("貪欲者");
$magicBox -> look();
$magicBox -> open();
?>
```
↓出力結果
```
宝箱を開いた。太刀を手に入れた。

宝箱は妖しく輝いている.
宝箱を開いた。貪欲者が襲ってきた!
```

***

### 9-4_RPGのPlayerクラスを継承で記述1
クラスを継承する具体例として、RPGのPlayerクラスを継承で記述する。</br>
今回はクラスを作ってメソッドを取り出すところまで
```php
<?php
class Player {
  public $myName;

  public function __construct($name){
    $this -> myName = $name;
  }

  public function attack($enemy){
    echo $this ->myName."は".$enemy."を攻撃した。\n";
  }
}

echo "=== パーティーでスライムと戦う ===\n";
$hero = new Player("勇者");
// $hero -> attack("スライム");
$warrior = new Player("戦士");

$party = [$hero,$warrior];
foreach($party as $member){
  $member -> attack("スライム");
}
?>
```
↓出力結果
```
=== パーティーでスライムと戦う ===
勇者はスライムを攻撃した。
戦士はスライムを攻撃した。
```

***

### 9-5_RPGのPlayerクラスを継承で記述2
前回に引き続き、クラスを継承して子クラスを作る。
```php
<?php
class Player {
  public $myName;

  public function __construct($name){
    $this -> myName = $name;
  }

  public function attack($enemy){
    echo $this ->myName."は".$enemy."を攻撃した。\n";
  }
}

class Wizard extends Player{
  public function attack($enemy){
    echo "dhinn!!\n";
    echo $this->myName."は".$enemy."に炎を放った。\n";
  }

}

echo "=== パーティーでスライムと戦う ===\n";
$hero = new Player("勇者");
// $hero -> attack("スライム");
$warrior = new Player("戦士");
$wizard = new Wizard ("魔法使い");
$party = [$hero,$warrior,$wizard];
foreach($party as $member){
  $member -> attack("スライム");
}
?>
```
↓出力結果
```
=== パーティーでスライムと戦う ===
勇者はスライムを攻撃した。
戦士はスライムを攻撃した。
dhinn!!
魔法使いはスライムに炎を放った。
```

***

### 9-6_クラスからメソッドを呼び出してみよう
親クラスからメソッドを呼び出す記述
```php
<?php
class Player {
  public $myName;

  public function __construct($name){
    $this -> myName = $name;
  }

  public function attack($enemy){
    echo $this ->myName."は".$enemy."を攻撃した。\n";
  }
}

class Wizard extends Player{
  public function __construct(){
    //このように記述する事で親のコンストラクトを呼び出す事ができる。
    //今回ではオブジェクトにもともとの引数を設定している。
    parent::__construct("魔法使い");
  }
  public function attack($enemy){
    echo "dhinn!!\n";
    echo $this->myName."は".$enemy."に炎を放った。\n";
  }

  private function spell(){
    echo "dhinn!!\n";
  }

}

echo "=== パーティーでスライムと戦う ===\n";
$hero = new Player("勇者");
// $hero -> attack("スライム");
$warrior = new Player("戦士");
$wizard = new Wizard ();  //引数をここでは指定していない。
$party = [$hero,$warrior,$wizard];
foreach($party as $member){
  $member -> attack("スライム");
}
// $wizard -> spell();
?>
```
↓出力結果
```
=== パーティーでスライムと戦う ===
勇者はスライムを攻撃した。
戦士はスライムを攻撃した。
dhinn!!
魔法使いはスライムに炎を放った。
```

***

### 9-7_クラス変数とクラスメソッドを使おう
Playerクラス共通の値を持つメソッドを追加する。</br>
今回は例としてパーティー人数をカウントするメソッドを追加する。
```php
